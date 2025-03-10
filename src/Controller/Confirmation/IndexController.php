<?php

declare(strict_types=1);

namespace App\Controller\Confirmation;

use App\Entity\Confirmation;
use App\Form\ConfirmationType;
use App\Service\GoogleSheetsService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/confirmation', name: 'confirmation')]
class IndexController extends AbstractController
{
    public function __construct(
        private MailerInterface $mailer,
        private EntityManagerInterface $entityManager,
        private GoogleSheetsService $googleSheetsService,
        private string $email,
    ) {
    }

    public function __invoke(Request $request)
    {
        $confirmation = new Confirmation();

        $confirmationForm = $this->createForm(ConfirmationType::class, $confirmation, ['action' => $this->generateUrl('confirmation')]);
        $confirmationForm->handleRequest($request);

        if ($confirmationForm->isSubmitted() && $confirmationForm->isValid()) {
            $rowData = [
                $confirmation->getFirstName(),
                $confirmation->getName(),
                $confirmation->getEmail(),
                $confirmation->getAdultsCount(),
                $confirmation->getChildrenCount(),
                $confirmation->getAdditionalInfo(),
                $confirmation->isSleepOnSite() ? 'Oui' : 'Non',
                $confirmation->getAccommodationType(),
                $confirmation->isBrunchOnSunday() ? 'Oui' : 'Non',
                date('Y-m-d H:i:s'),
            ];

            $this->googleSheetsService->appendRow($rowData);

            $this->addFlash('success', 'Données envoyées avec succès !');

            $this->sendConfirmationEmail($rowData);

            $this->addFlash('success', 'Votre confirmation a bien été envoyée');

            return $this->redirectToRoute('confirmation_thanks');
        }

        return $this->render('confirmation/index.html.twig', [
            'confirmationForm' => $confirmationForm->createView(),
        ]);
    }

    public function sendConfirmationEmail(array $data)
    {
        $email = (new Email())
        ->from(new Address('contact@mariage-audrey-et-robin.online', 'Audrey et Robin'))
        ->to($this->email)
        ->subject('Confirmation de présence')
        ->html(implode('<br />', $data));

        $this->mailer->send($email);
    }
}

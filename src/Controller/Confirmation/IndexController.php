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
        private GoogleSheetsService $googleSheetsService)
    {
    }

    public function __invoke(Request $request)
    {
        $confirmation = new Confirmation();

        $confirmationForm = $this->createForm(ConfirmationType::class, $confirmation, ['action' => $this->generateUrl('confirmation')]);
        $emptyForm = clone $confirmationForm;
        $confirmationForm->handleRequest($request);

        if ($confirmationForm->isSubmitted() && $confirmationForm->isValid()) {
            // $this->entityManager->persist($confirmation);
            // $this->entityManager->flush();

            /* @var Confirmation $confirmaiton */
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

            $this->sendConfirmationEmail($confirmation);

            $this->addFlash('success', 'Votre confirmation a bien été envoyée');

            return $this->render('confirmation/index.html.twig', [
                'confirmationForm' => $emptyForm->createView(),
            ]);
        }

        return $this->render('confirmation/index.html.twig', [
            'confirmationForm' => $confirmationForm->createView(),
        ]);
    }

    public function sendConfirmationEmail()
    {
        $email = (new Email())
        ->from(new Address('contact@mariage-audrey-et-robin.online', 'Audrey et Robin'))
        ->to('robinos333@hotmail.fr')
        ->subject('Confirmation de présence')
        ->html("c'est bon");

        $this->mailer->send($email);
    }
}

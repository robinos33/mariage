<?php

declare(strict_types=1);

namespace App\Controller\Confirmation;

use App\Entity\Confirmation;
use App\Form\ConfirmationType;
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
    public function __construct(private MailerInterface $mailer, private EntityManagerInterface $entityManager)
    {
    }

    public function __invoke(Request $request)
    {
        $confirmation = new Confirmation();

        $confirmationForm = $this->createForm(ConfirmationType::class, $confirmation, ['action' => $this->generateUrl('confirmation')]);
        $emptyForm = clone $confirmationForm;
        $confirmationForm->handleRequest($request);

        if ($confirmationForm->isSubmitted() && $confirmationForm->isValid()) {
            $this->entityManager->persist($confirmation);
            $this->entityManager->flush();

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

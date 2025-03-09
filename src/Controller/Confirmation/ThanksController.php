<?php

namespace App\Controller\Confirmation;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ThanksController extends AbstractController
{
    #[Route('/confirmation/thanks', name: 'confirmation_thanks')]
    public function __invoke()
    {
        return $this->render('confirmation/thanks.html.twig');
    }
}

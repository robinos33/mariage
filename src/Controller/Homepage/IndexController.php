<?php

declare(strict_types=1);

namespace App\Controller\Homepage;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Countdown;


class IndexController extends AbstractController
{
    public function __construct(private Countdown $countdown)
    {
        
    }

    #[Route('/', name: 'homepage')]
    public function __invoke()
    {
        $countdown = $this->countdown->calculateCountdown();
        return $this->render('homepage/index.html.twig', [
            'countdown' => $countdown
        ]);
    }
}
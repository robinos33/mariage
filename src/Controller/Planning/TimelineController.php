<?php
declare(strict_types=1);

namespace App\Controller\Planning;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

#[Route('/timeline/{dayNumber}', name: 'app_timeline_day', requirements: ['dayNumber' => '\d+'], methods: ['GET'])]

class TimelineController extends AbstractController
{
    public function __construct(private RouterInterface $router){

    }

    public function __invoke(int $dayNumber): Response
    {
        $links = [
            ['title' => 'Cérémonie', 'timelineItem' => "ceremonie", 'time' => "15h"],
            ['title' => 'Arrivée sur le lieu des festivités', 'timelineItem' => "accueil", 'time' => "17h30"],
            ['title' => 'Cocktail', 'timelineItem' => "cocktail", 'time' => "18h"],
            ['title' => 'Repas', 'timelineItem' => "repas", 'time' => "20h30"],
            ['title' => 'Soirée dansante', 'timelineItem' => "soiree-dansante", 'time' => "22h30"],
        ];

        if($dayNumber === 2) {
            $links = [
                ['title' => 'Brunch', 'timelineItem' => "brunch", 'time' => "11h"],
                ['title' => 'Activités', 'timelineItem' => "activites", 'time' => "14h"],
            ];
        }

        return $this->render('planning/timeline.html.twig', [
            'links' => $links,
        ]);
    }
}

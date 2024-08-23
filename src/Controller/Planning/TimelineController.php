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
            ['url' => $this->router->generate('app_timeline_item', ['timelineItem' => "ceremonie", 'dayNumber' => $dayNumber]), 'text' => 'Cérémonie à la mairie de Bègles'],
            ['url' => $this->router->generate('app_timeline_item', ['timelineItem' => "accueil", 'dayNumber' => $dayNumber]), 'text' => 'Arrivée sur le lieu des festivités'],
            ['url' => $this->router->generate('app_timeline_item', ['timelineItem' => "cocktail", 'dayNumber' => $dayNumber]), 'text' => 'Cocktail'],
            ['url' => $this->router->generate('app_timeline_item', ['timelineItem' => "repas", 'dayNumber' => $dayNumber]), 'text' => 'Repas'],
            ['url' => $this->router->generate('app_timeline_item', ['timelineItem' => "soiree-dansante", 'dayNumber' => $dayNumber]), 'text' => 'Soirée dansante'],
        ];
dump($dayNumber);
        if($dayNumber === 2) {
            $links = [
                ['url' => $this->router->generate('app_timeline_item', ['timelineItem' => "brunch", 'dayNumber' => $dayNumber]), 'text' => 'Brunch'],
                ['url' => $this->router->generate('app_timeline_item', ['timelineItem' => "activites", 'dayNumber' => $dayNumber]), 'text' => 'Activités'],
            ];
        }

        return $this->render('planning/timeline.html.twig', [
            'dayNumber' => $dayNumber,
            'links' => $links,
        ]);
    }
}

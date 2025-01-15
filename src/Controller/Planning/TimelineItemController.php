<?php
declare(strict_types=1);

namespace App\Controller\Planning;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/timeline-item/{timelineItem}', name: 'app_timeline_item', methods: ['GET'])]

class TimelineItemController extends AbstractController
{
    
    public function __invoke(string $timelineItem): Response
    {
        return $this->render("planning/items/$timelineItem.html.twig");
    }
}

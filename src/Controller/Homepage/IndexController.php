<?php

declare(strict_types=1);

namespace App\Controller\Homepage;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'homepage')]
class IndexController extends AbstractController
{
    public function __invoke()
    {
        return $this->render('homepage/index.html.twig');
    }
}
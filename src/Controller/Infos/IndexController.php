<?php

declare(strict_types=1);

namespace App\Controller\Infos;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/Infos', name: 'infos')]
class IndexController extends AbstractController
{
    public function __invoke()
    {
        return $this->render('infos/index.html.twig');
    }
}

<?php 
 declare(strict_types=1);

namespace App\Controller\Planning;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/planning', name: 'planning')]
class IndexController extends AbstractController
{
    public function __invoke()
    {
        return $this->render('planning/index.html.twig');
    }
}
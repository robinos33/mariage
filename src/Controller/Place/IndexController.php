<?php 
 declare(strict_types=1);

namespace App\Controller\Place;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lieu-des-festivites', name: 'place')]
class IndexController extends AbstractController
{
    public function __invoke()
    {
        return $this->render('place/index.html.twig');
    }
}
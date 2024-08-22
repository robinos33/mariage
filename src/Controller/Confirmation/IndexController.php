<?php 
 declare(strict_types=1);

namespace App\Controller\Confirmation;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/confirmation', name: 'confirmation')]
class IndexController extends AbstractController
{
    public function __invoke()
    {
        return $this->render('confirmation/index.html.twig');
    }
}
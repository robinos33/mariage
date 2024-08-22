<?php 

declare(strict_types=1);

namespace App\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'nav', template: 'components/nav.html.twig')]
final class Nav
{
    public array $navItems;
    public string $currentRoute;
}

<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('toast')]
final class Toast
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public ?string $message = null;

    #[LiveProp(writable: true)]
    public string $type = 'success';

    #[LiveAction]
    public function clear(): void
    {
        $this->message = null;
    }
}

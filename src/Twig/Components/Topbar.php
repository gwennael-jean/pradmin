<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent(template: '.components/topbar.html.twig')]
final class Topbar
{
    use DefaultActionTrait;
}

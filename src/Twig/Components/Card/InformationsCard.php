<?php

namespace App\Twig\Components\Card;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent(template: '.components/cards/card-informations.html.twig')]
final class InformationsCard
{
    use DefaultActionTrait;
}

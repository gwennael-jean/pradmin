<?php

namespace App\Twig\Components\Card;

use App\Service\Redis\RedisProvider;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\ComponentToolsTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use function Symfony\Component\String\u;

#[AsLiveComponent(template: '.components/cards/card-connections.html.twig')]
final class ConnectionsCard
{
    use DefaultActionTrait, ComponentToolsTrait;

    public array $databases = [];

    public function __construct(
        private RedisProvider $redisProvider,
    )
    {
        $this->databases = $this->redisProvider->database->findAll();
    }

    #[LiveAction]
    public function select(#[LiveArg] string $database)
    {
        $key = (string)u($database)->trimPrefix('db');

        $this->redisProvider->database->setSelectedDatabase((int)$key);

        $this->emit('databaseSelected');
    }
}

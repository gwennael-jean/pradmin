<?php

namespace App\Twig\Components\Card;

use App\Service\Redis\RedisProvider;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveListener;
use Symfony\UX\LiveComponent\ComponentToolsTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Redis;

#[AsLiveComponent(template: '.components/cards/card-database.html.twig')]
final class DatabaseCard
{
    use DefaultActionTrait, ComponentToolsTrait;

    public array $keys = [];

    public function __construct(
        private RedisProvider $redisProvider,
    )
    {
        $this->keys = $this->redisProvider->key->all();
    }

    #[LiveListener('databaseSelected')]
    public function show()
    {
        $this->keys = $this->redisProvider->key->get('*');
    }

    #[LiveAction]
    public function openModal()
    {
        $this->emit('openModal');
    }

    #[LiveAction]
    public function add()
    {
        dump('ADD NEW KEY');
    }
}

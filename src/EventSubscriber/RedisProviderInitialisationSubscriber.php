<?php

namespace App\EventSubscriber;

use App\Service\Redis\RedisProvider;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class RedisProviderInitialisationSubscriber implements EventSubscriberInterface
{
    public function __construct(private RedisProvider $redisProvider)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        $this->redisProvider->init();
    }
}

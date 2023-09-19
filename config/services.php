<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Redis;
use Symfony\Component\Cache\Adapter\RedisAdapter;

return function (ContainerConfigurator $container): void {
    $services = $container->services()
        ->defaults()
        ->autowire()
        ->autoconfigure();

    $services
        ->load('App\\', '../src/')
        ->exclude('../src/{DependencyInjection,Entity,Kernel.php}');

    $services->set(Redis::class, Redis::class)
        ->factory([RedisAdapter::class, 'createConnection'])
        ->arg('$dsn', 'redis://redis:6379');
};
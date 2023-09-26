<?php

namespace App\Service\Redis\Provider;

use Redis;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class RedisKeyProvider
{
    private SessionInterface $session;

    public function __construct(
        private Redis        $redis,
        private RequestStack $requestStack
    )
    {
        $this->session = $this->requestStack->getSession();
    }

    public function all()
    {
        return $this->get('*');
    }

    public function get(string $pattern)
    {
        return $this->redis->keys($pattern);
    }
}
<?php

namespace App\Service\Redis\Provider;

use Redis;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class RedisDatabaseProvider
{
    private SessionInterface $session;

    public function __construct(
        private Redis        $redis,
        private RequestStack $requestStack
    )
    {
        $this->session = $this->requestStack->getSession();
    }

    public function findAll()
    {
        return array_keys($this->redis->info('keyspace'));
    }

    public function getSelectedDatabase(): int
    {
        return $this->session->get('selected_database', 0);
    }

    public function setSelectedDatabase(int $database): void
    {
        $this->session->set('selected_database', $database);
    }
}
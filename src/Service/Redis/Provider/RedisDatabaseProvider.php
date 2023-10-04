<?php

namespace App\Service\Redis\Provider;

use App\Service\Redis\ModelTransformer\DatabaseTransformer;
use Redis;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class RedisDatabaseProvider
{
    private SessionInterface $session;

    private ?array $databases = null;

    public function __construct(
        private Redis               $redis,
        private RequestStack        $requestStack,
        private DatabaseTransformer $databaseTransformer,
    )
    {
        $this->session = $this->requestStack->getSession();
    }

    public function findAll()
    {
        if (null === $this->databases) {
            $this->databases = [];

            foreach ($this->redis->info('keyspace') as $key => $value) {
                if (str_starts_with($key, 'db')) {
                    $this->databases[] = $this->databaseTransformer->toModel([$key, $value]);
                }
            }
        }

        return $this->databases;
    }

    public function getSelectedDatabaseId(): int
    {
        return $this->session->get('selected_database', 0);
    }

    public function setSelectedDatabaseId(int $database): void
    {
        $this->session->set('selected_database', $database);
    }
}
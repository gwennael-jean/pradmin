<?php

namespace App\Service\Redis;

use App\Service\Redis\Provider\RedisDatabaseProvider;
use App\Service\Redis\Provider\RedisKeyProvider;
use Redis;

class RedisProvider
{
    public function __construct(
        private Redis                $redis,
        public RedisKeyProvider      $key,
        public RedisDatabaseProvider $database,
    )
    {
    }

    public function init(): void
    {
        $this->redis->select($this->database->getSelectedDatabase());
    }
}
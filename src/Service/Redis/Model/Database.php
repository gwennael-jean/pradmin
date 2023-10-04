<?php

namespace App\Service\Redis\Model;

class Database
{
    public int $id;

    public string $name;

    public int $keys;

    public int $expires;

    public int $avg_ttl;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Database
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Database
    {
        $this->name = $name;

        return $this;
    }

    public function getKeys(): int
    {
        return $this->keys;
    }

    public function setKeys(int $keys): Database
    {
        $this->keys = $keys;

        return $this;
    }

    public function getExpires(): int
    {
        return $this->expires;
    }

    public function setExpires(int $expires): Database
    {
        $this->expires = $expires;

        return $this;
    }

    public function getAvgTtl(): int
    {
        return $this->avg_ttl;
    }

    public function setAvgTtl(int $avg_ttl): Database
    {
        $this->avg_ttl = $avg_ttl;

        return $this;
    }
}
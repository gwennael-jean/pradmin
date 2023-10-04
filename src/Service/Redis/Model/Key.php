<?php

namespace App\Service\Redis\Model;

class Key
{
    public int $id;

    public string $name;

    public int $value;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Key
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Key
    {
        $this->name = $name;

        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): Key
    {
        $this->value = $value;

        return $this;
    }
}
<?php

namespace App\Service\Redis\ModelTransformer;

use App\Service\Redis\Model\Database;
use App\Service\Redis\Model\Key;
use function Symfony\Component\String\u;

class KeyTransformer
{
    public function toModel(array $data): Key
    {
        $model = new Key();

        return $model;
    }
}
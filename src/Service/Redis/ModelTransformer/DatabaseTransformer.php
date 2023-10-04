<?php

namespace App\Service\Redis\ModelTransformer;

use App\Service\Redis\Model\Database;
use function Symfony\Component\String\u;

class DatabaseTransformer
{
    public function toModel(array $data): Database
    {
        $model = (new Database())
            ->setId((string)u($data[0])->trimPrefix('db'))
            ->setName($data[0]);

        foreach (explode(',', $data[1]) as $item) {
            list($key, $value) = explode('=', $item);

            switch ($key) {
                case 'keys':
                    $model->setKeys($value);
                    break;
                case 'expires':
                    $model->setExpires($value);
                    break;
                case 'avg_ttl':
                    $model->setAvgTtl($value);
                    break;
            }
        }

        return $model;
    }
}
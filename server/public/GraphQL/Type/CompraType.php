<?php

namespace Estudo\GraphQL\Type;

use Estudo\Data\Model\Compra;
use Estudo\Data\Repository\CompraRepository;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class CompraType extends ObjectType
{
    private $repository;

    public function __construct(array $config)
    {
        $this->repository = new CompraRepository();
        parent::__construct([
            'name' => 'Compra',
            'fields' => [
                'id' => Type::id(),
                'valor' => Type::float(),
                'data' => Type::string()
            ]
        ]);
    }
}
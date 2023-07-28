<?php

use Estudo\Data\Model\Cliente;
use Estudo\Data\Repository\ClienteRepository;
use Estudo\GraphQL\Type\ClienteType;
use Estudo\GraphQL\Type\CompraType;
use GraphQL\Type\Definition\ListOfType;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class ComprasType extends ObjectType {

    private ClienteRepository $repository;

    public function __construct(array $config)
    {
        $this->repository = new ClienteRepository();

        parent::__construct([
            'name' => 'Compras',
            'description' => 'Compras de um usuário específico',
            'args' => [
                'user_id' => Type::id()
            ],
            'resolve' => static fn ($rootValue, $args): Cliente => $this->repository->get($args['user_id']),
            'fields' => [
                'cliente' => [
                    'type' => new ClienteType(),
                ],
                'compras' => [
                    'type' => new ListOfType(new CompraType()),
                    'resolve' => static fn ($cliente, $args): array => $this->repository->getByCliente($cliente),
                ]
            ]
        ]);
    }

}
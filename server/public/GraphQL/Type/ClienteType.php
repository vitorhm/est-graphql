<?php

namespace Estudo\GraphQL\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class ClienteType extends ObjectType
{

    public function __construct(array $config)
    {
        parent::__construct([
            'name' => 'Cliente',
            'fields' => [
                'id' => Type::id(),
                'name' => Type::string(),
                'email' => Type::string()
            ]
        ]);
    }

}
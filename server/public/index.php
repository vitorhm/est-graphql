<?php declare(strict_types=1);

namespace Estudo;

require_once '../vendor/autoload.php';

use Estudo\Data\DataInit;

DataInit::init();

    // use GraphQL\GraphQL;
    // use GraphQL\Type\Definition\ObjectType;
    // use GraphQL\Type\Definition\Type;
    // use GraphQL\Type\Schema;
    // use GraphQL\Type\SchemaConfig;

    // try {
    //     $query_type = new ObjectType([
    //         'name' => 'Type',
    //         'fields' => [
    //             'echo' => [
    //                 'type' => Type::string(),
    //                 'args' => [
    //                     'message' => ['type' => Type::string()],
    //                 ],
    //                 'resolve' => static fn ($rootValue, array $args): string => $rootValue['prefix'] . $args['message'],
    //             ],
    //         ],
    //     ]);

    //     $schema = new Schema(
    //         (new SchemaConfig())
    //         ->setQuery($query_type)
    //     );

    //     $raw_input = file_get_contents('php://input');

    //     if ($raw_input == false) {
    //         throw new RuntimeException('Failed to get php://input');
    //     }

    //     $input = json_decode($raw_input, true);
    //     $query = $input['query'];
    //     $variableValues = $input['variables'] ?? null;

    //     $rootValue = ['prefix' => 'You said: '];
    //     $result = GraphQL::executeQuery($schema, $query, $rootValue, null, $variableValues);
    //     $output = $result->toArray();
        
    // } catch (Throwable $e) {
    //     $output = [
    //         'error' => [
    //             'message' => $e->getMessage(),
    //         ],
    //     ];
    // }

    // header('Content-Type: application/json; charset=UTF-8');
    // echo json_encode($output, JSON_THROW_ON_ERROR);
?>
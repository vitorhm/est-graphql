<?php declare(strict_types=1);

namespace Estudo\Data\Repository;

use Estudo\Data\Connection\ConnectionFactory;
use Estudo\Data\Model\Cliente;

class ClienteRepository {

    public function add(Cliente $cliente) {

        $connection = ConnectionFactory::createTesteConnection();
        $connection->open();

        try {
            $stmt = $connection->prepare("INSERT INTO clientes (nome, email) VALUES (?, ?)");
            $stmt->bind_param("ss", [$cliente->nome, $cliente->email]);
            $stmt->execute();
            $stmt->close();

            $cliente->id = $connection->insert_id();
        } finally {
            $connection->close();
        }
        
    }

    public function get(int $id): Cliente {

        $connection = ConnectionFactory::createTesteConnection();
        $connection->open();

        try {
            $result = $connection->query("SELECT * FROM clientes WHERE id = $id");
            $cl = $result->fetch_array();

            return new Cliente($cl['id'], $cl['nome'], $cl['email']);
        } finally {
            $connection->close();
        }
    }

}

?>
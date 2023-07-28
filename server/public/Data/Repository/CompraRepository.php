<?php declare(strict_types=1);

namespace Estudo\Data\Repository;

use Estudo\Data\Connection\ConnectionFactory;
use Estudo\Data\Model\Cliente;
use Estudo\Data\Model\Compra;

class CompraRepository {

    public function add(Compra $compra) {

        $connection = ConnectionFactory::createTesteConnection();
        $connection->open();

        try {
            $stmt = $connection->prepare("INSERT INTO compra (valor, data, id_cliente) VALUES (?, ?, ?)");
            $stmt->bind_param("dsi", [$compra->valor, $compra->data, $compra->cliente->id]);
            $stmt->execute();
            $stmt->close();

            $compra->id = $connection->insert_id();
        } finally {
            $connection->close();
        }
        
    }

    public function getByCliente(Cliente $cliente): array {

        $connection = ConnectionFactory::createTesteConnection();
        $connection->open();

        try {
            $result = $connection->query("SELECT * FROM compra WHERE id_cliente = $cliente->id");
            $ar = array();
            while ($row = $result->fetch_array()) {
                $compra = new Compra(null, $row['valor'], $row['data'], $cliente);
                $ar[$row['id']] = $compra;
            }

            return $ar;
        } finally {
            $connection->close();
        }
    }

}
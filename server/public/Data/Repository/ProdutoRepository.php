<?php declare(strict_types=1);

namespace Estudo\Data\Repository;

use Estudo\Data\Connection\ConnectionFactory;
use Estudo\Data\Model\Compra;
use Estudo\Data\Model\Produto;

class ProdutoRepository {

    public function add(Produto $produto) {

        $connection = ConnectionFactory::createTesteConnection();
        $connection->open();

        try {
            $stmt = $connection->prepare("INSERT INTO produto (nome, id_compra) VALUES (?, ?)");
            $stmt->bind_param("ss", [$produto->nome, $produto->compra->id]);
            $stmt->execute();
            $stmt->close();

            $produto->id = $connection->insert_id();
        } finally {
            $connection->close();
        }
        
    }

}

?>
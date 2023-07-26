<?php declare(strict_types=1);

namespace Estudo\Data;

use Estudo\Data\Connection\ConnectionFactory;
use Estudo\Data\Repository\ClienteRepository;
use Estudo\Data\Repository\CompraRepository;
use Estudo\Data\Repository\ProdutoRepository;
use Estudo\Data\Model\Cliente;
use Estudo\Data\Model\Compra;
use Estudo\Data\Model\Produto;

class DataInit {

    public static function init() {

        $connection = ConnectionFactory::createTesteConnection();

        try {
            $connection->open();
            $connection->query("CREATE TABLE clientes (id int NOT NULL AUTO_INCREMENT, nome varchar(200), email varchar(100), PRIMARY KEY (id))");
            $connection->query("CREATE TABLE produto (id int NOT NULL AUTO_INCREMENT, nome varchar(200), id_compra int, PRIMARY KEY (id))");
            $connection->query("CREATE TABLE compra (id int NOT NULL AUTO_INCREMENT, valor numeric(14,2), id_cliente int, data date, PRIMARY KEY (id))");
        } finally {
            $connection->close();
        }

        $cliente_repository = new ClienteRepository();
        $compra_repository = new CompraRepository();
        $produto_repository = new ProdutoRepository();

        $cliente = new Cliente("Lorrant", "lorrantavante@gmail.com");
        $compra = new Compra(20000, '2023-07-23', $cliente);
        $prod1 = new Produto("Pandeiro", $compra);
        $prod2 = new Produto("Monitor Curvo", $compra);
        $prod3 = new Produto("Xbox", $compra);
        $prod4 = new Produto("Calça Jeans", $compra);

        $cliente_repository->add($cliente);
        $compra_repository->add($compra);
        $produto_repository->add($prod1);
        $produto_repository->add($prod2);
        $produto_repository->add($prod3);
        $produto_repository->add($prod4);
    }

}

?>
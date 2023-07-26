<?php declare(strict_types=1);

namespace Estudo\Data\Model;

class Produto {

    public int $id;

    public string $nome;

    public Compra $compra;

    public function __construct(string $nome, Compra $compra)
    {
        $this->nome = $nome;
        $this->compra = $compra;
    }
}

?>
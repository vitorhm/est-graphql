<?php declare(strict_types=1);

namespace Estudo\Data\Model;

class Produto {

    public int $id;

    public string $nome;

    public Compra $compra;

    public function __construct(?int $id, string $nome, Compra $compra)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->compra = $compra;
    }
}

?>
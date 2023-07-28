<?php declare(strict_types=1);

namespace Estudo\Data\Model;

class Compra {

    public int $id;

    public float $valor;

    public string $data;

    public Cliente $cliente;

    public function __construct(?int $id, float $valor, string $data, Cliente $cliente)
    {
        $this->id = $id;
        $this->valor = $valor;
        $this->data = $data;
        $this->cliente = $cliente;
    }


}

?>
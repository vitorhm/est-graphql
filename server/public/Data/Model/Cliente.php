<?php declare(strict_types=1);

    namespace Estudo\Data\Model;

    class Cliente {

        public int $id;

        public string $nome;

        public string $email;

        public function __construct(?int $id, string $nome, string $email)
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->email = $email;
        }
    }

?>
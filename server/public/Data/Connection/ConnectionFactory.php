<?php declare(strict_types=1);

namespace Estudo\Data\Connection;

class ConnectionFactory {

    public static function createTesteConnection(): Connection {
        return new Connection($_ENV["MYSQL_HOST"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASS"], $_ENV["MYSQL_DATABASE"]);
    }

}

?>
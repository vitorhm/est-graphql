<?php declare(strict_types=1);

namespace Estudo\Data\Connection;

use mysqli;

class Connection {

    private string $host;
    private string $user;
    private string $password;
    private string $database;

    private mysqli $con;

    public function __construct(string $host, string $user, string $password, string $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    public function open(): void {
        $this->con = new mysqli($this->host, $this->user, $this->password, $this->database);
    }

    public function close(): void {
        $this->con->close();
    }

    public function insert_id(): int|string {
        return $this->con->insert_id;
    }

    public function prepare(string $query): Statement {
        $stmt = $this->con->prepare($query);
        return new Statement($stmt);
    }

    public function query(string $query): Result {
        $result = $this->con->query($query);
        return new Result($result);
    }

}
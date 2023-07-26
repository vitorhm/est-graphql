<?php declare(strict_types=1);

namespace Estudo\Data\Connection;

use mysqli_stmt;

class Statement {

    private mysqli_stmt $stmt;   

    public function __construct(mysqli_stmt $stmt) {
        $this->stmt = $stmt;
    }

    public function bind_param(string $types, $params): bool {
        return $this->stmt->bind_param($types, ...$params);
    }

    public function execute() {
        $this->stmt->execute();
    }

    public function close() {
        return $this->stmt->close();
    }

}

?>
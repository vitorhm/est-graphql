<?php

namespace Estudo\Data\Connection;

use mysqli_result;

class Result
{
    private mysqli_result $result;

    public function __construct(mysqli_result $result)
    {
        $this->result = $result;
    }

    public function fetch_row(): array|false|null {
        return $this->result->fetch_row();
    }

    public function fetch_array(): array|false|null {
        return $this->result->fetch_array();
    }
}
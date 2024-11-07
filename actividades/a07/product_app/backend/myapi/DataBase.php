<?php
namespace backend\myapi;

abstract class DataBase {
    protected $conexion;

    public function __construct($host = 'localhost', $user = 'root', $pass = 'DaPaRuniel25!', $db = 'marketzone') {
        $this->conexion = new \mysqli($host, $user, $pass, $db);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    abstract protected function query(string $sql);
}

/*
namespace backend\myapi;

abstract class DataBase {
    protected $conexion;

    public function __construct() {
        $host = 'localhost';
        $user = 'root';
        $pass = '12345678a';
        $db = 'marketzone';

        $this->conexion = new \mysqli($host, $user, $pass, $db);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    abstract protected function query(string $sql);
}
    */
?>
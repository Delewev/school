<?php

namespace oop;

use PDO;

class Database
{
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;
    private $pdo;

    public function __construct($host, $db, $user, $pass, $charset = 'utf8mb4') {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;
        $this->charset = $charset;
        $this->connect();
    }

    private function connect() {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}

<?php

class Database
{
    private $host       = "localhost";
    private $db_name    = "user_app";
    private $username   = "root";
    private $password   = "";
    private ?PDO $conn  = null;

    public function connect(): PDO {
        if ($this->conn === null) {
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->db_name};sharset=utf8mb4";
                $this->conn = new PDO ($dsn, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection error: " . $e->getMessage());
            }
        }
        return $this->conn;
    }
}
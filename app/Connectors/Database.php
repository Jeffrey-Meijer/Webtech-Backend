<?php

namespace Webtech\Connectors;

use PDO;
use PDOException;

class Database implements ConnectorInterface
{
    // Constants are "Undefined" because of them being dynamically created
    protected string $host = DB_HOST ?? "";
    protected string $dbname = DB_NAME ?? "";
    protected string $username = DB_USER ?? "";
    protected string $password = DB_PASS ?? "";
    private PDO $pdo;

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}

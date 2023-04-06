<?php

namespace Webtech\Connectors;

class Database implements ConnectorInterface
{
    protected string $host;
    protected string $dbname;
    protected string $username;
    protected string $password;
//    private static ?ConnectorInterface $instance = null;
    private \PDO $pdo;

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

//    public static function getInstance($host = null, $dbname = null, $username = null, $password = null): ConnectorInterface
//    {
//        if (Database::$instance == null) {
//            Database::$instance = new Database($host, $dbname, $username, $password);
//        }
//        return Database::$instance;
//    }

    public function getConnection(): \PDO
    {
        return $this->pdo;
    }
}

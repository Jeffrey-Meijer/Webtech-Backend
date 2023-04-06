<?php

namespace Webtech\Models;

use Webtech\Connectors\Database;

class IndexModel extends GenericModel
{
    public function __construct()
    {
        $this->name = "IndexModel";
        $this->connector = new Database();
    }

    public function getTestData()
    {
        $pdo = $this->connector->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM film LIMIT 100");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

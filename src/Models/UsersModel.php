<?php

namespace Webtech\Models;

use Webtech\Connectors\Database;

class UsersModel extends GenericModel
{
    public function __construct()
    {
        $this->name = "UsersModel";
        $this->connector = new Database();
    }

    public function getAllUsers() {
        $pdo = $this->connector->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getUser($uuid) {
        $pdo = $this->connector->getConnection();
        $stmt = $pdo->prepare(sprintf("SELECT * FROM users where uuid = %s", $uuid));
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

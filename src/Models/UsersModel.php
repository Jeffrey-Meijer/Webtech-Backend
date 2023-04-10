<?php

namespace Webtech\Models;

use Webtech\Connectors\Database;
use Webtech\Connectors\Models\User;
use Webtech\Connectors\ORM;

class UsersModel extends GenericModel
{
    public function __construct()
    {
        $this->name = "UsersModel";
        $this->connector = new Database();
        $this->orm = new ORM($this->connector->getConnection(), User::class);
    }

    public function getAllUsers() {
        $users = $this->orm->all('users');
        return $users;
    }
    public function getUser($uuid) {
        $pdo = $this->connector->getConnection();
        $stmt = $pdo->prepare(sprintf("SELECT * FROM users where uuid = %s", $uuid));
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

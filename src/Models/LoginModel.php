<?php

namespace Webtech\Models;

use Webtech\Connectors\Database;
use Webtech\Connectors\Models\User;
use Webtech\Connectors\ORM;

class LoginModel extends GenericModel
{
    public function __construct()
    {
        $this->name = "LoginModel";
        $this->connector = new Database();
        $this->orm = new ORM($this->connector->getConnection(), new User());
    }

    public function getUserByEmail($email)
    {
        $users = $this->orm->select("users", "email", $email);
        return $users;
    }
}

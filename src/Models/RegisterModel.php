<?php

namespace Webtech\Models;

use Webtech\Connectors\Database;
use Webtech\Connectors\Models\User;
use Webtech\Connectors\ORM;

class RegisterModel extends GenericModel
{
    public function __construct()
    {
        $this->name = "RegisterModel";
        $this->connector = new Database();
        $this->orm = new ORM($this->connector->getConnection(), new User());
    }


    public function createUser($uuid, $first_name, $last_name, $email, $hashed_password, $occupation)
    {
        $data = array(
            "uuid" => $uuid,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $email,
            "password" => $hashed_password,
            "occupation" => $occupation
        );
        return $this->orm->insert("users", $data);
    }
}

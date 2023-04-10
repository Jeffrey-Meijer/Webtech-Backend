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
        $this->orm = new ORM($this->connector->getConnection(), [new User()]);
    }

//    public function () {
//        $exams = $this->orm->all('users');
//        return $exams;
//    }
}

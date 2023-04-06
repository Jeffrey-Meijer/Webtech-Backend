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
}

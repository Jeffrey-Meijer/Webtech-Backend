<?php

namespace Webtech\Models;

class UsersModel extends GenericModel {
    public function __construct() {
        $this->name = "UsersModel";
        $this->connector = "MYSQL CONNECTION";
    }
}

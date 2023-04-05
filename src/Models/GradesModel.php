<?php

namespace Webtech\Models;

class GradesModel extends GenericModel {
    public function __construct() {
        $this->name = "GradesModel";
        $this->connector = "MYSQL CONNECTION";
    }
}

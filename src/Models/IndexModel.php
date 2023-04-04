<?php

namespace Webtech\Models;

class IndexModel extends GenericModel {
    public function __construct() {
        $this->name = "IndexModel";
        $this->connector = "MYSQL CONNECTION";
    }
}

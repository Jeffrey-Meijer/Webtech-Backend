<?php

namespace Webtech\Models;

use Webtech\Connectors\Database;

class GradesModel extends GenericModel
{
    public function __construct()
    {
        $this->name = "GradesModel";
        $this->connector = new Database();
    }
}

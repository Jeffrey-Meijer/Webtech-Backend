<?php

namespace Webtech\Models;

use Webtech\Connectors\Database;

class IndexModel extends GenericModel
{
    public function __construct()
    {
        $this->name = "IndexModel";
        $this->connector = new Database();
    }
}

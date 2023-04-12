<?php

namespace Webtech\Models;

use Webtech\Connectors\Database;
use Webtech\Connectors\ORM;
use Webtech\Http\ModelInterface;

class GenericModel implements ModelInterface
{
    protected Database $connector;
    protected ORM $orm;
    protected string $name;
}

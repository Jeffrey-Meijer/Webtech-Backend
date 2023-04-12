<?php

namespace Webtech\Connectors;

use PDO;

interface ConnectorInterface
{
//    public static function getInstance($host = null, $dbname = null, $username = null, $password = null): self;

    public function getConnection(): PDO;
}

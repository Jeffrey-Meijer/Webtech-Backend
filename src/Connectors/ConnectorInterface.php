<?php

namespace Webtech\Connectors;

use PDO;

interface ConnectorInterface
{
    /**
     * @return PDO
     */
    public function getConnection(): PDO;
}

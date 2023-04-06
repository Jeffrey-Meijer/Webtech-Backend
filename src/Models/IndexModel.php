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

    public function getTestData()
    {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM films WHERE rating IN ('NC-17', 'R') AND (title LIKE '%FREAKY%' OR title LIKE '%TERMINATOR%') AND category IN ('Horror', 'Sci-Fi') AND EXISTS (SELECT * FROM actresses WHERE actresses.film_id = films.film_id AND actresses.first_name = 'UMA')");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

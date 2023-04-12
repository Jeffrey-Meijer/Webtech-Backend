<?php

namespace Webtech\Models;

use Webtech\Connectors\Database;
use Webtech\Connectors\Models\User_exams;
use Webtech\Connectors\ORM;

class GradesModel extends GenericModel
{
    public function __construct()
    {
        $this->name = "GradesModel";
        $this->connector = new Database();
        $this->orm = new ORM($this->connector->getConnection(), new User_exams());
    }

    public function getAllGrades($uuid)
    {
        $results = $this->orm->selectAll("user_exams", "user_id", $uuid);
//        var_dump($results);
        return $results;
    }
}

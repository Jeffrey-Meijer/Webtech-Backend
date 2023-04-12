<?php

namespace Webtech\Models;

use Webtech\Connectors\Database;
use Webtech\Connectors\Models\Exams;
use Webtech\Connectors\Models\User_exams;
use Webtech\Connectors\ORM;

class ExamsModel extends GenericModel
{
    public function __construct()
    {
        $this->name = "ExamsModel";
        $this->connector = new Database();
        $this->orm = new ORM($this->connector->getConnection(), new Exams());
    }

    public function getAvailableExams($uuid): array
    {
        $this->orm->setModel(new User_exams());
        $results = $this->orm->join("exams", "user_exams", "exams.id = user_exams.exam_id");
        $objects = [];
        foreach ($results[0] as $result) {
            if ($result->user_id == $uuid) {
                $objects[] = $result;
            }
        }
        return $objects;
    }

    public function applyForExam($uuid, $id): bool|string
    {
        $this->orm->setModel(new User_exams());
        $data = array(
            "user_id" => $uuid,
            "exam_id" => $id
        );
        return $this->orm->insert("user_exams", $data);
    }

    public function getExams($uuid): array
    {
        $this->orm->setModel(new Exams());
        $subQuery = "SELECT * FROM user_exams WHERE user_exams.exam_id = exams.id AND user_exams.user_id = $uuid";
        return $this->orm->selectNotExists("exams", [], $subQuery);
    }
}

<?php

namespace Webtech\Models;

use Webtech\Connectors\Database;
use Webtech\Connectors\Models\Exams;
use Webtech\Connectors\Models\User_exams;
use Webtech\Connectors\Models\User;
use Webtech\Connectors\ORM;

class ExamsModel extends GenericModel
{
    public function __construct()
    {
        $this->name = "ExamsModel";
        $this->connector = new Database();
        $this->orm = new ORM($this->connector->getConnection(), new Exams());
    }

    public function getAvailableExams($uuid) {
        $this->orm->setModels([new User(), new User_exams()]);
        $results = $this->orm->join("exams","user_exams", "exams.id = user_exams.exam_id");
        $objects = [];
        foreach ($results[0] as $result) {
            if ($result->user_id == $uuid) {
                $objects[] = $result;
            }
        }
        return $objects;
    }
    public function getExams($uuid) {
        $this->orm->setModels([new User_exams()]);
//        return $this->orm->select("user_exams", "user_id", $uuid);
    }

    public function getAssociatedUser($exam_id) {
        $this->orm->setModel(new User_exams());
        return $this->orm->select("user_exams", "exam_id", $exam_id);
    }
}

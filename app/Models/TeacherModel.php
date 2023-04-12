<?php

namespace Webtech\Models;

use Webtech\Connectors\Database;
use Webtech\Connectors\Models\Exams;
use Webtech\Connectors\Models\User_exams;
use Webtech\Connectors\ORM;

class TeacherModel extends GenericModel
{
    public function __construct()
    {
        $this->name = "TeacherModel";
        $this->connector = new Database();
        $this->orm = new ORM($this->connector->getConnection(), new Exams());
    }

    public function getExams($uuid)
    {
        $this->orm->setModel(new Exams());

        $exams = $this->orm->selectAll("exams", "teacher_id", $uuid);

        return $exams;
    }

    public function getExamResults($exam_id)
    {
        $this->orm->setModel(new User_exams());

        $results = $this->orm->selectAll("user_exams", "exam_id", $exam_id);

        return $results;
    }

    public function getResult($result_id)
    {
        $this->orm->setModel(new User_exams());

        $result = $this->orm->select("user_exams", "id", $result_id);
        return $result;
    }

    public function updateResult($id, $grade)
    {
        $this->orm->setModel(new User_exams());
        $data = array(
            "grade" => $grade,
        );
        $where = array(
            "id" => $id
        );

        $updated = $this->orm->update("user_exams", $data, $where);
        if ($updated) {
            return true;
        }
        return false;
    }
}

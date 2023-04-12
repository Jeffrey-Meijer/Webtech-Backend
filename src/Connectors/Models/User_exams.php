<?php

namespace Webtech\Connectors\Models;

use PDO;
use stdClass;

class User_exams extends Generic
{
    public string $table = "user_exams";
    public int $id;
    public int $user_id;
    public int $exam_id;
    public ?float $grade;
    public stdClass $getUser;
    public stdClass $getExam;
    public int $teacher_id;
    public string $name;

    public function getUser($db)
    {
        $query = "SELECT * FROM users WHERE uuid = $this->user_id";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    public function getExam($db)
    {
        $query = "SELECT * FROM exams WHERE id = $this->exam_id";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $exam = $stmt->fetch(PDO::FETCH_OBJ);
        return $exam;
    }
}

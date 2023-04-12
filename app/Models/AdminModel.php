<?php

namespace Webtech\Models;

use Webtech\Connectors\Database;
use Webtech\Connectors\Models\Exams;
use Webtech\Connectors\Models\Generic;
use Webtech\Connectors\Models\User;
use Webtech\Connectors\ORM;

class AdminModel extends GenericModel
{
    public function __construct()
    {
        $this->name = "Adminmodel";
        $this->connector = new Database();
        $this->orm = new ORM($this->connector->getConnection(), new User());
    }

    public function getExams(): array
    {
        $this->orm->setModel(new Exams());
        $exams = $this->orm->all("exams");
        return $exams;
    }

    public function getExam($id): ?Generic
    {
        $this->orm->setModel(new Exams());
        $exam = $this->orm->select("exams", "id", $id);
        return $exam;
    }

    public function createExam($name, $teacher_id)
    {
        $this->orm->setModel(new Exams());
        $data = array(
            "name" => $name,
            "teacher_id" => $teacher_id
        );
        $this->orm->insert("exams", $data);
    }

    public function updateExam($id, $name, $teacher_id): bool
    {
        $this->orm->setModel(new Exams());
        $data = array(
            "name" => $name,
            "teacher_id" => $teacher_id
        );

        $where = array(
            "id" => $id
        );

        $update = $this->orm->update("exams", $data, $where);
        if ($update) {
            return true;
        }
        return false;
    }

    public function deleteExam($id): int
    {
        $this->orm->setModel(new Exams());
        $where = array(
            "id" => $id
        );
        return $this->orm->delete("exams", $where);
    }

    public function getTeachers(): array
    {
        $this->orm->setModel(new User());

        $teachers = $this->orm->selectAll("users", "occupation", "Teacher");
        return $teachers;
    }

    public function getUsers(): array
    {
        $this->orm->setModel(new User());
        $users = $this->orm->all("users");
        return $users;
    }

    public function getUser($uuid): ?Generic
    {
        $this->orm->setModel(new User());
        $user = $this->orm->select("users", "uuid", $uuid);
        return $user;
    }

    public function updateUser($uuid, $newuuid, $first_name, $last_name, $email, $occupation, $password = null): bool
    {
        $this->orm->setModel(new User());
        $data = array(
            "uuid" => $newuuid,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $email,
            "occupation" => $occupation
        );
        if ($password != null) {
            $data["password"] = password_hash($password, PASSWORD_DEFAULT);
        }
        $where = array(
            "uuid" => $uuid
        );
        $update = $this->orm->update("users", $data, $where);
        if ($update) {
            return true;
        }
        return false;
    }

    public function createUser($uuid, $first_name, $last_name, $email, $hashed_password, $occupation): bool|string
    {
        $this->orm->setModel(new User());
        $data = array(
            "uuid" => $uuid,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $email,
            "password" => $hashed_password,
            "occupation" => $occupation
        );
        return $this->orm->insert("users", $data);
    }

    public function deleteUser($uuid): int
    {
        $this->orm->setModel(new User());
        $where = array(
            "uuid" => $uuid
        );
        return $this->orm->delete("users", $where);
    }
}

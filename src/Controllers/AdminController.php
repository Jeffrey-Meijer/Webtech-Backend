<?php

namespace Webtech\Controllers;

use Exception;

class AdminController extends GenericController
{
    /**
     * @throws Exception
     */
    public function view()
    {
        $uuid = $this->request->getRequest()->getSession("uuid");
        echo $this->templateLoader->load("admins/home", []);
    }

    /**
     * @throws Exception
     */
    public function viewExamCreate()
    {
        $teachers = $this->getModel()->getTeachers();
        $data = ["teachers" => $teachers];
        echo $this->templateLoader->load("admins/exams/create", $data);
    }

    /**
     * @throws Exception
     */
    public function viewExamEdit()
    {
        $body = $this->request->getRequest()->getBody();
        $id = $body["id"];
        $exam = $this->getModel()->getExam($id);
        $teachers = $this->getModel()->getTeachers();
        $data = ["exam" => $exam, "teachers" => $teachers];

        echo $this->templateLoader->load("admins/exams/edit", $data);
    }

    /**
     * @throws Exception
     */
    public function viewUserEdit()
    {
        $body = $this->request->getRequest()->getBody();
        $uuid = $body["uuid"];
        $user = $this->getModel()->getUser($uuid);
        $data = ["user" => $user];
        echo $this->templateLoader->load("admins/users/edit", $data);
    }

    public function examInsert()
    {
        $body = $this->request->getRequest()->getBody();
        $name = $body["name"];
        $teacher_id = $body["teacher_id"];

        $this->getModel()->createExam($name, $teacher_id);
        $this->viewExams();
    }

    /**
     * @throws Exception
     */
    public function viewExams()
    {
        $exams = $this->getModel()->getExams();
        $data = ["exams" => $exams];
        echo $this->templateLoader->load("admins/exams", $data);
    }

    public function examUpdate()
    {
        $body = $this->request->getRequest()->getBody();
//        var_dump($body);
        $id = $body["id"];
        $name = $body["name"];
        $teacher_id = $body["teacher_id"];

        $this->getModel()->updateExam($id, $name, $teacher_id);
        $this->viewExams();
    }

    public function examDelete()
    {
        $body = $this->request->getRequest()->getBody();
        $id = $body["id"];

        $this->getModel()->deleteExam($id);
        $this->viewExams();
    }

    public function userUpdate()
    {
        $body = $this->request->getRequest()->getBody();
        $updatedUser = $this->getModel()->updateUser(
            $body["olduuid"],
            $body["uuid"],
            $body["first_name"],
            $body["last_name"],
            $body["email"],
            $body["occupation"],
            $body["password"] ?? null
        );
        $this->viewUsers();
    }

    /**
     * @throws Exception
     */
    public function viewUsers()
    {
        $users = $this->model->getUsers();
        $data = ["users" => $users];
        echo $this->templateLoader->load("admins/users", $data);
    }

    public function userInsert()
    {
        $requestBody = $this->request->getRequest()->getBody();
        $uuid = $requestBody["uuid"];
        $first_name = $requestBody["first_name"];
        $last_name = $requestBody["last_name"];
        $email = $requestBody["email"];
        $pass = $requestBody["password"];
        $occupation = $requestBody["occupation"];


        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

        $id = $this->getModel()->createUser($uuid, $first_name, $last_name, $email, $hashed_pass, $occupation);
        if ($id) {
            return $this->viewUsers();
        }
        return $this->viewUserCreate();
    }

    /**
     * @throws Exception
     */
    public function viewUserCreate()
    {
        echo $this->templateLoader->load("admins/users/create", []);
    }

    public function userDelete()
    {
        $requestBody = $this->request->getRequest()->getBody();
        $uuid = $requestBody["uuid"];

        $rows = $this->getModel()->deleteUser($uuid);
        return $this->viewUsers();
    }
}

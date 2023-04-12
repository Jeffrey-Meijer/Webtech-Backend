<?php

namespace Webtech\Controllers;

use Exception;

class AdminController extends GenericController
{
    /**
     * @throws Exception
     */
    public function view(): void
    {
        $uuid = $this->request->getRequest()->getSession("uuid");
        $this->templateLoader->load("admins/home", []);
    }

    /**
     * @throws Exception
     */
    public function viewExamCreate(): void
    {
        $teachers = $this->getModel()->getTeachers();
        $data = ["teachers" => $teachers];
        $this->templateLoader->load("admins/exams/create", $data);
    }

    /**
     * @throws Exception
     */
    public function viewExamEdit(): void
    {
        $body = $this->request->getRequest()->getBody();
        if (isset($body["id"])) {
            $id = $body["id"];
            $exam = $this->getModel()->getExam($id);
            $teachers = $this->getModel()->getTeachers();
            $data = ["exam" => $exam, "teachers" => $teachers];

            $this->templateLoader->load("admins/exams/edit", $data);
        } else {
            $this->viewExams();
        }
    }

    /**
     * @throws Exception
     */
    public function viewUserEdit(): void
    {
        $body = $this->request->getRequest()->getBody();
        if (isset($body["uuid"])) {
            $uuid = $body["uuid"];
            $user = $this->getModel()->getUser($uuid);
            $data = ["user" => $user];
            $this->templateLoader->load("admins/users/edit", $data);
        } else {
            $this->viewUsers();
        }
    }

    /**
     * @throws Exception
     */
    public function examInsert(): void
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
    public function viewExams(): void
    {
        $exams = $this->getModel()->getExams();
        $data = ["exams" => $exams];
        echo $this->templateLoader->load("admins/exams", $data);
    }

    /**
     * @throws Exception
     */
    public function examUpdate(): void
    {
        $body = $this->request->getRequest()->getBody();
        $id = $body["id"];
        $name = $body["name"];
        $teacher_id = $body["teacher_id"];

        $this->getModel()->updateExam($id, $name, $teacher_id);
        $this->viewExams();
    }

    /**
     * @throws Exception
     */
    public function examDelete(): void
    {
        $body = $this->request->getRequest()->getBody();
        $id = $body["id"];

        $this->getModel()->deleteExam($id);
        $this->viewExams();
    }

    /**
     * @throws Exception
     */
    public function userUpdate(): void
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

    /**
     * @throws Exception
     */
    public function userInsert(): void
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
            $this->viewUsers();
        } else {
            $this->viewUserCreate();
        }
    }

    /**
     * @throws Exception
     */
    public function viewUserCreate(): void
    {
        $this->templateLoader->load("admins/users/create", []);
    }

    /**
     * @throws Exception
     */
    public function userDelete(): void
    {
        $requestBody = $this->request->getRequest()->getBody();
        $uuid = $requestBody["uuid"];

        $rows = $this->getModel()->deleteUser($uuid);
        $this->viewUsers();
    }
}

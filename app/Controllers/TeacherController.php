<?php

namespace Webtech\Controllers;

use Exception;

class TeacherController extends GenericController
{
    /**
     * @throws Exception
     */
    public function view(): void
    {
        $this->templateLoader->load("teacher/home");
    }

    /**
     * @throws Exception
     */
    public function viewExams(): void
    {
        $uuid = $this->request->getRequest()->getSession("uuid");
        $exams = $this->getModel()->getExams($uuid);
        $data = ["exams" => $exams];
        $this->templateLoader->load("teacher/exams", $data);
    }

    /**
     * @throws Exception
     */
    public function viewExamResultEdit(): void
    {
        $body = $this->request->getRequest()->getBody();
        $id = $body["result"];
        $result = $this->getModel()->getResult($id);
        //Check if currently logged in user is the actual teacher_id that has access
        $user_uuid = $this->request->getRequest()->getSession("uuid");
        $result_check = $result->getExam->teacher_id == $user_uuid;
        if ($result_check) {
            $data = ["result" => $result];
            $this->templateLoader->load("teacher/exams/edit", $data);
        } else {
            $this->viewExams();
        }
    }

    /**
     * @throws Exception
     */
    public function examResultUpdate(): void
    {
        $body = $this->request->getRequest()->getBody();
        $id = $body["id"];
        $grade = $body["grade"];
        $exam_id = $body["exam"];
        $updatedRow = $this->getModel()->updateResult($id, $grade);
        $this->viewExamResults($exam_id);
    }

    /**
     * @throws Exception
     */
    public function viewExamResults($exam_id = null): void
    {
        $body = $this->request->getRequest()->getBody();
        $exam_id = $exam_id == null ? $body["exam"] : $exam_id;
        $results = $this->getModel()->getExamResults($exam_id);
        //Check if currently logged in user is the actual teacher_id that has access
        $user_uuid = $this->request->getRequest()->getSession("uuid");
        if (empty($results)) {
            $this->viewExams();
        } else {
            $result_check = $results[0]->getExam->teacher_id == $user_uuid;
            if ($result_check) {
                $data = ["results" => $results];
                $this->templateLoader->load("teacher/exams/results", $data);
            } else {
                $this->viewExams();
            }
        }
    }
}

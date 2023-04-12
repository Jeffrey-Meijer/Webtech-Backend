<?php

namespace Webtech\Controllers;

use Exception;

class TeacherController extends GenericController
{
    /**
     * @throws Exception
     */
    public function view()
    {
        echo $this->templateLoader->load("teacher/home");
    }

    /**
     * @throws Exception
     */
    public function viewExams()
    {
        $uuid = $this->request->getRequest()->getSession("uuid");
        $exams = $this->getModel()->getExams($uuid);
        $data = ["exams" => $exams];
        echo $this->templateLoader->load("teacher/exams", $data);
    }

    /**
     * @throws Exception
     */
    public function viewExamResultEdit()
    {
        $body = $this->request->getRequest()->getBody();
        $id = $body["result"];
        $result = $this->getModel()->getResult($id);
        $data = ["result" => $result];
        echo $this->templateLoader->load("teacher/exams/edit", $data);
    }

    public function examResultUpdate()
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
    public function viewExamResults($exam_id = null)
    {
        $body = $this->request->getRequest()->getBody();
        $exam_id = $exam_id == null ? $body["exam"] : $exam_id;
//        $exam_id = $body["exam"];
        $results = $this->getModel()->getExamResults($exam_id);
        $data = ["results" => $results];
        echo $this->templateLoader->load("teacher/exams/results", $data);
    }
}

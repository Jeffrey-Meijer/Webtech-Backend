<?php

namespace Webtech\Controllers;

class TeacherController extends GenericController
{
    public function view()
    {
        echo $this->templateLoader->load("teacher/home");
    }

    public function viewExams()
    {
        $uuid = $this->request->getRequest()->getSession("uuid");
        $exams = $this->getModel()->getExams($uuid);
        $data = ["exams" => $exams];
        echo $this->templateLoader->load("teacher/exams", $data);
    }

    public function viewExamResults($exam_id = null)
    {
        $body = $this->request->getRequest()->getBody();
        $exam_id = $exam_id == null ? $body["exam"] : $exam_id;
//        $exam_id = $body["exam"];
        $results = $this->getModel()->getExamResults($exam_id);
        $data = ["results" => $results];
        echo $this->templateLoader->load("teacher/exams/results", $data);
    }

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
}

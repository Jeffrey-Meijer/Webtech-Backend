<?php

namespace Webtech\Controllers;

use Exception;

class ExamsController extends GenericController
{
    /**
     * @throws Exception
     */
    public function available()
    {
        $uuid = $this->request->getRequest()->getSession("uuid");
        $availableExams = $this->getModel()->getAvailableExams($uuid);
        $templates = ["header" => "header", "footer" => "footer"];
        $data = ["availableExams" => $availableExams];
        echo $this->templateLoader->load("exams", $data, $templates);
    }

    public function handle()
    {
        $body = $this->request->getRequest()->getBody();
        $uuid = $this->request->getRequest()->getSession("uuid");
        $id = $body["id"];
        $inserted = $this->getModel()->applyForExam($uuid, $id);
        if ($inserted) {
            return $this->view();
        }
    }

    /**
     * @throws Exception
     */
    public function view()
    {
        $uuid = $this->request->getRequest()->getSession("uuid");
        $exams = isset($uuid) ? $this->model->getExams($uuid) : [];
//        var_dump($exams);
        $templates = ["header" => "header", "footer" => "footer"];
        $data = ["availableExams" => $exams];
        echo $this->templateLoader->load("exams", $data, $templates);
    }
}

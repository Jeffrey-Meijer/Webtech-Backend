<?php

namespace Webtech\Controllers;

use Exception;

class ExamsController extends GenericController
{
    /**
     * @throws Exception
     */
    public function available(): void
    {
        $uuid = $this->request->getRequest()->getSession("uuid");
        $availableExams = $this->getModel()->getAvailableExams($uuid);
        $templates = ["header" => "header", "footer" => "footer"];
        $data = ["availableExams" => $availableExams];
        $this->templateLoader->load("exams", $data, $templates);
    }

    /**
     * @throws Exception
     */
    public function handle()
    {
        $body = $this->request->getRequest()->getBody();
        $uuid = $this->request->getRequest()->getSession("uuid");
        $id = $body["id"];
        $inserted = $this->getModel()->applyForExam($uuid, $id);
        if ($inserted) {
            $this->view();
        }
    }

    /**
     * @throws Exception
     */
    public function view(): void
    {
        $uuid = $this->request->getRequest()->getSession("uuid");
        $exams = isset($uuid) ? $this->model->getExams($uuid) : [];
        $templates = ["header" => "header", "footer" => "footer"];
        $data = ["availableExams" => $exams];
        $this->templateLoader->load("exams", $data, $templates);
    }
}

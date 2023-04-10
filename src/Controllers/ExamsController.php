<?php

namespace Webtech\Controllers;

use Webtech\Helpers\ExtractQuery;
use Webtech\Http\Response;
use Webtech\Http\ResponseFactory;
use Webtech\Http\Stream;

class ExamsController extends GenericController
{
    public function view()
    {
        $uuid = $this->request->getRequest()->getSession("uuid");
        $exams = isset($uuid) ? $this->model->getExams($uuid) : [];
        $data = ["availableExams" => $exams, "header" => "header", "footer" => "footer"];
        echo $this->templateLoader->load("exams", $data);
    }
    public function available() {
        $uuid = $this->request->getRequest()->getSession("uuid");
//        $query = $this->request->getRequest()->getUri()->getQuery();
//        var_dump($query);
//        if ($query != "") {
//            $extractedParameters = ExtractQuery::extractQuery($query);

//        }
        $data = ["availableExams" => $this->model->getAvailableExams($uuid), "header" => "header", "footer" => "footer"];
        echo $this->templateLoader->load("exams", $data);
    }

    public function handle() {
//        echo "test";
        error_log("getting to handle");
        return new Response("test", 200, ["content-type" => "application/json"]);
    }
}

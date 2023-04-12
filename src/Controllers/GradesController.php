<?php

namespace Webtech\Controllers;

class GradesController extends GenericController
{
    public function view()
    {
        $uuid = $this->request->getRequest()->getSession("uuid");
        $grades = $this->model->getAllGrades($uuid);
        $templates = ["header" => "header", "footer" => "footer"];
        $data = ["grades" => $grades];
        echo $this->templateLoader->load("grades", $data, $templates);
    }
}

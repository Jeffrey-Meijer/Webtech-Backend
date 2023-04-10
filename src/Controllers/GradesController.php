<?php

namespace Webtech\Controllers;

class GradesController extends GenericController
{
    public function view()
    {
        $uuid = $this->request->getRequest()->getSession("uuid");
        $grades = $this->model->getAllGrades($uuid);
        $data = ["grades" => $grades, "header" => "header", "footer" => "footer"];
        echo $this->templateLoader->load("grades", $data);
    }
}

<?php

namespace Webtech\Controllers;

use Exception;

class GradesController extends GenericController
{
    /**
     * @throws Exception
     */
    public function view()
    {
        $uuid = $this->request->getRequest()->getSession("uuid");
        $grades = $this->model->getAllGrades($uuid);
        $templates = ["header" => "header", "footer" => "footer"];
        $data = ["grades" => $grades];
        echo $this->templateLoader->load("grades", $data, $templates);
    }
}

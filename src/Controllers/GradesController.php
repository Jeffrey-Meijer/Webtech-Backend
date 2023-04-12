<?php

namespace Webtech\Controllers;

use Exception;

class GradesController extends GenericController
{
    /**
     * @throws Exception
     */
    public function view(): void
    {
        $uuid = $this->request->getRequest()->getSession("uuid");
        $grades = $this->model->getAllGrades($uuid);
        $templates = ["header" => "header", "footer" => "footer"];
        $data = ["grades" => $grades];
        $this->templateLoader->load("grades", $data, $templates);
    }
}

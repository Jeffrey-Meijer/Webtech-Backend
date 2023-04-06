<?php

namespace Webtech\Controllers;

class GradesController extends GenericController
{
    public function view()
    {
        $this->model->get();
        echo $this->templateLoader->load("grades");
    }
}

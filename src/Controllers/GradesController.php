<?php

namespace Webtech\Controllers;

class GradesController extends GenericController
{
    public function view()
    {
        echo $this->templateLoader->load("grades");
    }
}

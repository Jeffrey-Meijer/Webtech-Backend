<?php

namespace Webtech\Controllers;

class IndexController extends GenericController
{
    public function view()
    {
        $data = ["header" => "header", "footer" => "footer"];
        echo $this->templateLoader->load("home", $data);
    }
}

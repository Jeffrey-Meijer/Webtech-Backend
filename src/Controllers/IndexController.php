<?php

namespace Webtech\Controllers;

class IndexController extends GenericController
{
    public function view()
    {
        $templates = ["header" => "header", "footer" => "footer"];
        echo $this->templateLoader->load("home", [], $templates);
    }
}

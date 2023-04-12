<?php

namespace Webtech\Controllers;

use Exception;

class IndexController extends GenericController
{
    /**
     * @throws Exception
     */
    public function view()
    {
        $templates = ["header" => "header", "footer" => "footer"];
        echo $this->templateLoader->load("home", [], $templates);
    }
}

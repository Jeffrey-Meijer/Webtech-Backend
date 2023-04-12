<?php

namespace Webtech\Controllers;

use Exception;

class IndexController extends GenericController
{
    /**
     * @throws Exception
     */
    public function view(): void
    {
        $templates = ["header" => "header", "footer" => "footer"];
        $this->templateLoader->load("home", [], $templates);
    }
}

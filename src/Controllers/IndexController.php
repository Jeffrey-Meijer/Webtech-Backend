<?php

namespace Webtech\Controllers;

class IndexController extends GenericController
{
    public function view()
    {
//        $data = ["name" => "test", "films" => $this->getModel()->getTestData()];
        $data = ["name" => "test", "films" => null];
        echo $this->templateLoader->load("home", $data);
    }

    private function IndexID()
    {
        $data = ["ID" => "SECRET ID :)"];

        echo $this->templateLoader->load("home", $data);
    }
}

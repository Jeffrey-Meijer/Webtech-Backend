<?php
namespace Webtech\Controllers;

class IndexController extends GenericController {
    public function view() {
        $data = ["name" => "DIT IS NICE!!"];

        require_once $this->templateDIR . "/home.php";
    }
}

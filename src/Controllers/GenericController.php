<?php

namespace Webtech\Controllers;

use Webtech\Http\ControllerInterface;
use Webtech\Http\ModelInterface;


abstract class GenericController implements ControllerInterface {
    protected $model;
    protected $request;
    protected $templateDIR = "./src/Views";

    public function __construct($model, $request) {
        $this->model = $model;
        $this->request = $request;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel(ModelInterface $model)
    {
        $this->model = $model;
    }
}

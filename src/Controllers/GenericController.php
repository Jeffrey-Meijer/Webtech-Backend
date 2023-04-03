<?php

namespace Webtech\Controllers;

use Webtech\Http\ControllerInterface;
use Webtech\Http\Model;


abstract class GenericController implements ControllerInterface {
    protected $model;

    public function getModel()
    {
        return $this->model;
    }

    public function setModel(Model $model)
    {
        $this->model = $model;
    }
}

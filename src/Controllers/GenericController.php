<?php

namespace Webtech\Controllers;

use Webtech\Http\ControllerInterface;
use Webtech\Http\ModelInterface;
use Webtech\Http\TemplateLoader;


abstract class GenericController implements ControllerInterface
{
    protected ModelInterface $model;
    protected $request;
    protected string $templateDIR = "./src/Views";
    protected TemplateLoader $templateLoader;

    public function __construct($model, $templateLoader, $request)
    {
        $this->model = $model;
        $this->templateLoader = $templateLoader;
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

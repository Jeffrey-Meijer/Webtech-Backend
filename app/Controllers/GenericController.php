<?php

namespace Webtech\Controllers;

use Webtech\EventDispatcher\Interfaces\EventInterface;
use Webtech\Http\ControllerInterface;
use Webtech\Http\ModelInterface;
use Webtech\Http\TemplateLoader;


abstract class GenericController implements ControllerInterface
{
    protected ModelInterface $model;
    protected string $function;
    protected EventInterface $request;
    protected string $templateDIR = "./app/Views";
    protected TemplateLoader $templateLoader;

    public function __construct(
        string $function,
        ModelInterface $model,
        TemplateLoader $templateLoader,
        EventInterface $request
    ) {
        $this->function = $function;
        $this->model = $model;
        $this->templateLoader = $templateLoader;
        $this->request = $request;
    }

    public function getFunction(): string
    {
        return $this->function;
    }

    public function setFunction($function): void
    {
        $this->function = $function;
    }

    public function getModel(): ModelInterface
    {
        return $this->model;
    }

    public function setModel(ModelInterface $model): void
    {
        $this->model = $model;
    }

    public function invoke(): void
    {
        call_user_func(array($this, $this->function));
    }
}

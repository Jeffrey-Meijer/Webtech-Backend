<?php

namespace Webtech\Http;

class TemplateLoader
{
    private string $templateDir;

    /**
     * @param $templateDir
     */
    public function __construct($templateDir)
    {
        $this->templateDir = $templateDir;
    }

    /**
     * @param $templateName
     * @param $data is used when the file gets included
     * @return void
     * @throws \Exception
     */
    public function load($templateName, $data = array())
    {
        $templatePath = $this->templateDir . '/' . $templateName . '.php';
        if (!file_exists($templatePath)) {
            throw new \Exception('Template not found!');
        }
        include_once $templatePath;
    }
}

<?php

namespace Webtech\Http;

class TemplateLoader
{
    private string $templateDir;

    public function __construct($templateDir)
    {
        $this->templateDir = $templateDir;
    }

    public function load($templateName, $data = array())
    {
        $templatePath = $this->templateDir . '/' . $templateName . '.php';
        if (!file_exists($templatePath)) {
            throw new \Exception('Template not found!');
        }
        $templateContent = file_get_contents($templatePath);
        foreach ($data as $key => $value) {
            $templateContent = str_replace('{{' . $key . '}}', $value, $templateContent);
        }
        return $templateContent;
    }
}

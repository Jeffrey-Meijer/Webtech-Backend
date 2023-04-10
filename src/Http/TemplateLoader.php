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
        // template loading
        ob_start();
        include $templatePath;
        $output = ob_get_contents();
        foreach ($data as $key => $value) {
            ob_start();
            include $this->templateDir . "/Templates/" . $value . ".php";
            $content = ob_get_contents();
            $output = str_replace("{{" . $key . "}}", $content, $output);
            ob_end_clean();
        }
        ob_end_clean();
        echo $output;
    }
}

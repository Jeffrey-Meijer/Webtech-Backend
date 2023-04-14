<?php

namespace Webtech\Http;

use Exception;

class TemplateLoader
{
    private string $templateDir;
    private string $cssDir;

    /**
     * @param $templateDir
     */
    public function __construct($templateDir, $cssDir)
    {
        $this->templateDir = $templateDir;
        $this->cssDir = $cssDir;
    }

    /**
     * @param $templateName
     * @param array $data is used when the file gets included
     * @param string[] $templates
     * @return void
     * @throws Exception
     */
    public function load(
        $templateName,
        array $data = array(),
        array $templates = array("header" => "header", "footer" => "footer"),
        array $css = array("css" => "bootstrap")
    ): void {
        $templatePath = $this->templateDir . '/' . $templateName . '.php';
        if (!file_exists($templatePath)) {
            throw new Exception('Template not found!');
        }
        // template loading
        ob_start();
        include $templatePath;
        $output = ob_get_contents();
        foreach ($templates as $key => $value) {
            ob_start();
            include $this->templateDir . "/Templates/" . $value . ".php";
            $content = ob_get_contents();
            $output = str_replace("{{" . $key . "}}", $content, $output);
            ob_end_clean();
        }
        foreach ($css as $key => $value) {
            $output = str_replace(
                "{{" . $key . "}}",
                "<link rel='stylesheet' href='$this->cssDir/$value.css'/>",
                $output
            );
        }
        ob_end_clean();
        echo $output;
    }
}

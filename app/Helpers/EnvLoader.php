<?php

namespace Webtech\Helpers;

class EnvLoader
{
    public function __construct($env_file)
    {
        if (file_exists($env_file)) {
            $vars = parse_ini_file($env_file);
            foreach ($vars as $key => $value) {
                define($key, $value);
            }
        }
    }
}

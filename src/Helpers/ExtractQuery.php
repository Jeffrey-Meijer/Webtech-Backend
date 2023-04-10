<?php
namespace Webtech\Helpers;

class ExtractQuery {
    public static function extractQuery($query) {
        $parameters = explode("&", $query);
        $extractedParameters = array();
        foreach ($parameters as $parameter) {
            $split = explode("=", $parameter);
            $extractedParameters[] = array($split[0] => $split[1]);
        }
        return $extractedParameters;
    }
}

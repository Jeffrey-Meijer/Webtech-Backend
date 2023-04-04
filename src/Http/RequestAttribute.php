<?php

namespace Webtech\Http;


class RequestAttribute {
    private array $attributes;
    public function add($parameters) {
        foreach ($parameters as $parameter) {
            $this->attributes[] = $parameter;
        }
    }
    public function set($attribute, $data) {
        $this->attributes[$attribute] = $data;
    }
    public function get($attribute) {
        return $this->attributes[$attribute];
    }
}

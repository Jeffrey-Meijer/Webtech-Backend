<?php

namespace Webtech\Request;


class RequestAttribute
{
    private array $attributes;

    public function add($parameters): void
    {
        foreach ($parameters as $parameter) {
            $this->attributes[] = $parameter;
        }
    }

    public function set($attribute, $data): void
    {
        $this->attributes[$attribute] = $data;
    }

    public function get($attribute): mixed
    {
        return $this->attributes[$attribute];
    }
}

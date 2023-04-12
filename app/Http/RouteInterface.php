<?php

namespace Webtech\Http;

interface RouteInterface
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getMethod(): string;

    public function setMethod(string $method): void;

    public function getPath(): string;

    public function setPath(string $path): void;

    public function getController(): ControllerInterface;

    public function setController(ControllerInterface $controller): void;
}

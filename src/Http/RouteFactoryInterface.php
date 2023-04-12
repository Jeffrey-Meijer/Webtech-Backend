<?php

namespace Webtech\Http;

interface  RouteFactoryInterface
{
    public function createRoute(string $name, string $method, string $path, ControllerInterface $controller): array;
}

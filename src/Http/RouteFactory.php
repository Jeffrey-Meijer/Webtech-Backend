<?php

namespace Webtech\Http;


class RouteFactory implements RouteFactoryInterface
{
    private array $routes = array();

    public function createRoute(string $name, string $method, string $path, ControllerInterface $controller): array
    {
        $this->routes[] = new Route($name, $method, $path, $controller);

        return $this->routes;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}

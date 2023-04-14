<?php

require './vendor/autoload.php';

use Webtech\Helpers\EnvLoader;
use Webtech\Http\TemplateLoader;
use Webtech\Middleware\AuthMiddleware;
use Webtech\Request\Request;
use Webtech\Request\RequestHandler;
use Webtech\Route\RouteFactory;

/**
 * @throws Exception
 */
function onRequest($event): void
{
    $found = false;
    $path = $event->getRequest()->getUri()->getPath();
    $method = $event->getRequest()->getMethod();
    $routeFactory = new RouteFactory();
    $templateLoader = new TemplateLoader("./app/Views", "/app/Assets/css");

    $routeFactory->createAllRoutes($templateLoader, $event);
    $routes = $routeFactory->getRoutes();
    $event->getRequest()->attributes->set('routes', $routes);
    foreach ($routes as $route) {
        if ($route->getPath() == $path && $route->getMethod() == $method) {
            $found = true;
            $route->getController()->invoke();
            break;
        }
    }
    if (!$found) {
        $templateLoader->load("404");
    }
}

$env = new EnvLoader(__DIR__ . "/.env");
$request = Request::fromGlobals();
$requestHandler = new RequestHandler();
$middleware = new AuthMiddleware();

$middleware->process($request, $requestHandler);




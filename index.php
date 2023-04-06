<?php

require './vendor/autoload.php';

use Webtech\Controllers\GradesController;
use Webtech\Controllers\IndexController;
use Webtech\Controllers\UsersController;
use Webtech\EventDispatcher\EventDispatcher;
use Webtech\EventDispatcher\Events\RequestEvent;
use Webtech\EventDispatcher\ListenerProvider;
use Webtech\Http\Request;
use Webtech\Http\RequestHandler;
use Webtech\Http\RouteFactory;
use Webtech\Http\TemplateLoader;
use Webtech\Models\GradesModel;
use Webtech\Models\IndexModel;
use Webtech\Models\UsersModel;

function onRequest($event)
{
    $found = false;
    $path = $event->getRequest()->getUri()->getPath();
    $method = $event->getRequest()->getMethod();
    $routeFactory = new RouteFactory();
    $templateLoader = new TemplateLoader("./src/Views");
    $routeFactory->createRoute("home", "GET", "/", new IndexController(new IndexModel(), $templateLoader, $event));
    $routeFactory->createRoute("users", "GET", "/users", new UsersController(new UsersModel(), $templateLoader, $event));
    $routeFactory->createRoute("grades", "GET", "/grades", new GradesController(new GradesModel(), $templateLoader, $event));

    $routes = $routeFactory->getRoutes();
    $event->getRequest()->attributes->set('routes', $routes);
    foreach ($routes as $route) {
        if ($route->getPath() == $path && $route->getMethod() == $method) {
            $found = true;
            $route->getController()->view();
            break;
        }
    }
    if (!$found) {
        echo "404!";
    }
}

$request = Request::fromGlobals();
$requestHandler = new RequestHandler();

$listenerProvider = new ListenerProvider();
$listenerProvider->addListener("on.request", 'onRequest');

$eventDispatcher = new EventDispatcher($listenerProvider);
$requestEvent = new RequestEvent();
$requestEvent->setRequest($request);

$eventDispatcher->dispatch($requestEvent);

$response = $requestHandler->handle($request);

$response->send();




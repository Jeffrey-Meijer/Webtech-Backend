<?php

require './vendor/autoload.php';

use Webtech\Controllers\AuthController;
use Webtech\Controllers\GradesController;
use Webtech\Controllers\IndexController;
use Webtech\Controllers\UsersController;
use Webtech\Controllers\ExamsController;
use Webtech\Http\Request;
use Webtech\Http\RequestHandler;
use Webtech\Http\RouteFactory;
use Webtech\Http\TemplateLoader;
use Webtech\Middleware\AuthMiddleware;
use Webtech\Models\GradesModel;
use Webtech\Models\IndexModel;
use Webtech\Models\UsersModel;
use Webtech\Models\ExamsModel;
use Webtech\Models\LoginModel;
use Webtech\Models\RegisterModel;

function onRequest($event)
{
    $found = false;
    $path = $event->getRequest()->getUri()->getPath();
    $routeFactory = new RouteFactory();
    $templateLoader = new TemplateLoader("./src/Views");
    $routeFactory->createRoute("home", "GET", "/", new IndexController("view", new IndexModel(), $templateLoader, $event));
    $routeFactory->createRoute("users", "GET", "/users", new UsersController("view", new UsersModel(), $templateLoader, $event));
    $routeFactory->createRoute("grades", "GET", "/grades", new GradesController("view", new GradesModel(), $templateLoader, $event));
    $routeFactory->createRoute("exams", "GET", "/exams", new ExamsController("view", new ExamsModel(), $templateLoader, $event));
    $routeFactory->createRoute("availableExams", "GET", "/exams/available", new ExamsController("available", new ExamsModel(), $templateLoader, $event));
    $routeFactory->createRoute("handleExam", "POST", "/exams/available", new ExamsController("handle", new ExamsModel(), $templateLoader, $event));
    $routeFactory->createRoute("login", "GET", "/login", new AuthController("view", new LoginModel(), $templateLoader, $event));
    $routeFactory->createRoute("logout", "GET", "/logout", new AuthController("logout", new LoginModel(), $templateLoader, $event));
    $routeFactory->createRoute("register", "GET", "/register", new AuthController("registerView", new RegisterModel(), $templateLoader, $event));

    $routes = $routeFactory->getRoutes();
    $event->getRequest()->attributes->set('routes', $routes);
    foreach ($routes as $route) {
        if ($route->getPath() == $path) {
            $found = true;
            $route->getController()->invoke();
            break;
        }
    }
    if (!$found) {
        echo "404!";
    }
}

$request = Request::fromGlobals();
$requestHandler = new RequestHandler();
$middleware = new AuthMiddleware();

$response = $middleware->process($request, $requestHandler);

$response->send();




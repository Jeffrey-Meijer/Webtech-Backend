<?php

require './vendor/autoload.php';

use Webtech\EventDispatcher\EventDispatcher;
use Webtech\EventDispatcher\Events\RequestEvent;
use Webtech\EventDispatcher\ListenerProvider;
use Webtech\Http\Request;
use Webtech\Http\RequestHandler;

function onRequest($event) {
    $routes = [
        "/" => "controller1",
        "/key" => "controller2",
    ];
    $path = $event->getRequest()->getUri()->getPath();
    if (key_exists($path, $routes)) {
        echo $routes[$path]; // Gets the controller's view
    } else {
        echo "Route not found!"; // Needs to return a 404 view
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




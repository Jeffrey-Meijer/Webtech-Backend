<?php

require './vendor/autoload.php';

use Webtech\Http\Request;
use Webtech\Http\RequestHandler;

$request = Request::fromGlobals();
$requestHandler = new RequestHandler();

$response = $requestHandler->handle($request);

$response->send();




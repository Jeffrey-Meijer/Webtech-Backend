<?php

namespace Backend;

require "./Request.php";
require_once "./RequestHandler.php";
require_once "./ResponseFactory.php";
$request = Request::fromGlobals();
$requestHandler = new RequestHandler();

$response = $requestHandler->handle($request);

$response->send();

//$response->send();


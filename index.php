<?php

namespace Backend;

require "./Request.php";
require_once "./RequestHandler.php";
$request = Req::fromGlobals();

$requestHandler = new RequestHandler();

$requestHandler->handle($request);

$response->send();


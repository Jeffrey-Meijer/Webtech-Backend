<?php

namespace Backend;

require "./Request.php";
require "./Response.php";

$request = Request::fromGlobals();
var_dump($request);
$response = new Response(
    "This is a response for the request going to ". $request->getUri()->getPath(),
    200,
    ['content-type' => 'text/html']
);

$response->send();


<?php
namespace Backend;

use Backend\Http\Message\ResponseInterface;
use Backend\Http\Message\ServerRequestInterface;
use Backend\Http\Server\RequestHandlerInterface;

require_once "./Response.php";
require_once "./Http/Message/ResponseInterface.php";
require_once "./Http/Message/ServerRequestInterface.php";
require_once "./Http/Server/RequestHandlerInterface.php";
class RequestHandler implements RequestHandlerInterface {

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new Response(
            "This is a response for the request going to idk",
            200,
            $request->getHeaders()
        );

        // TODO: Implement handle() method.
    }
}
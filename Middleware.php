<?php
namespace Backend;

use Backend\Http\Message\ResponseInterface;
use Backend\Http\Message\ServerRequestInterface;
use Backend\Http\Server\MiddlewareInterface;
use Backend\Http\Server\RequestHandlerInterface;

class Middleware implements MiddlewareInterface {

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $handler->handle($request);
        // TODO: Implement process() method.
    }
}

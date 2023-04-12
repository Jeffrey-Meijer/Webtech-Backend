<?php

namespace Webtech\Middleware;

use Webtech\Http\Message\ResponseInterface;
use Webtech\Http\Message\ServerRequestInterface;
use Webtech\Http\Server\MiddlewareInterface;
use Webtech\Http\Server\RequestHandlerInterface;

class Middleware implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $handler->handle($request);
    }
}

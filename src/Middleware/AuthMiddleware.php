<?php

namespace Webtech\Middleware;

use Webtech\Http\Session;
use Webtech\Http\Message\RequestInterface;
use Webtech\Http\Message\ResponseInterface;
use Webtech\Http\Message\ServerRequestInterface;
use Webtech\Http\Middleware;
use Webtech\Http\Server\MiddlewareInterface;
use Webtech\Http\Server\RequestHandlerInterface;
use Webtech\Http\Uri;

class AuthMiddleware extends Middleware
{

    public function process(RequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if (!isset($_SESSION["logged_in"]) && $request->getUri()->getPath() != "/login" && $request->getUri()->getPath() != "/register") {
            header("Location ". $request->getUri() . "/login");
            $uri = $request->getUri()->withPath("/login");
            $request = $request->withUri($uri);
        }
        $response = $handler->handle($request);

        return $response;
    }
}

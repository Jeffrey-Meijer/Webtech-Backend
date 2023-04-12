<?php

namespace Webtech\Middleware;

use Webtech\Http\Message\RequestInterface;
use Webtech\Http\Message\ResponseInterface;
use Webtech\Http\Middleware;
use Webtech\Http\Server\RequestHandlerInterface;

class AuthMiddleware extends Middleware
{

    public function process(RequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if (!isset($_SESSION["logged_in"]) && $request->getUri()->getPath() != "/login" && $request->getUri()->getPath() != "/register") {
            header("Location /login");
            $uri = $request->getUri()->withPath("/login");
            $request = $request->withUri($uri);
        }

        if (isset($_SESSION["role"])) {
            $role = $_SESSION["role"];
            if (preg_match("/^\/admin(?:\/.*)?$/", $request->getUri()->getPath())) {
                if ($role != "Administrator") {
                    header("Location /");
                    $uri = $request->getUri()->withPath("/");
                    $request = $request->withUri($uri);
                }
            }
        }
        $response = $handler->handle($request);

        return $response;
    }
}

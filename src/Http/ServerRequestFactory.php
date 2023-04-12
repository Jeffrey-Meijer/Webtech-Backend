<?php

namespace Webtech\Http;

use Webtech\Http\Message\ServerRequestFactoryInterface;
use Webtech\Http\Message\ServerRequestInterface;

class ServerRequestFactory implements ServerRequestFactoryInterface
{

    public function createServerRequest(string $method, $uri, array $serverParams = []): ServerRequestInterface
    {
        return new ServerRequest();
        // TODO: Implement createServerRequest() method.
    }
}

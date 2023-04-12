<?php

namespace Webtech\Http;

use Webtech\Http\Message\ServerRequestFactoryInterface;
use Webtech\Http\Message\ServerRequestInterface;
use Webtech\Http\Message\UriInterface;

class ServerRequestFactory implements ServerRequestFactoryInterface
{

    public function createServerRequest(
        string $method,
        string|UriInterface $uri,
        array $serverParams = []
    ): ServerRequestInterface {
        return new ServerRequest();
        // TODO: Implement createServerRequest() method.
    }
}

<?php
namespace Backend;

use Backend\Http\Message\ServerRequestFactoryInterface;
use Backend\Http\Message\ServerRequestInterface;

class ServerRequestFactory implements ServerRequestFactoryInterface {

    public function createServerRequest(string $method, $uri, array $serverParams = []): ServerRequestInterface
    {
        return new ServerRequest();
        // TODO: Implement createServerRequest() method.
    }
}

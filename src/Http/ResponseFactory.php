<?php

namespace Webtech\Http;

use Webtech\Http\Message\ResponseFactoryInterface;
use Webtech\Http\Message\ResponseInterface;

class ResponseFactory implements ResponseFactoryInterface {

    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        $headers = [];
        $body = '<h1>This is a test</h1>';
        return new Response($body, $code, $headers);
    }
}
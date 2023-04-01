<?php

namespace Backend;

use Backend\Http\Message\ResponseFactoryInterface;
use Backend\Http\Message\ResponseInterface;

require_once "./Http/Message/ResponseFactoryInterface.php";

class ResponseFactory implements ResponseFactoryInterface {

    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        $headers = [];
        $body = 'test';
        return new Response($body, $code, $headers);
    }
}
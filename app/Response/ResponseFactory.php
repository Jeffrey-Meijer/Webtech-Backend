<?php

namespace Webtech\Response;

use Webtech\Http\Message\ResponseFactoryInterface;
use Webtech\Http\Message\ResponseInterface;

class ResponseFactory implements ResponseFactoryInterface
{

    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        $headers = [];
        $body = '';
        return new Response($body, $code, $headers);
    }
}
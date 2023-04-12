<?php

namespace Webtech\Http\Message;

interface RequestFactoryInterface
{
    /**
     * Create a new request.
     *
     * @param string $method The HTTP method associated with the request.
     * @param string|UriInterface $uri The URI associated with the request.
     */
    public function createRequest(string $method, string|UriInterface $uri): RequestInterface;
}


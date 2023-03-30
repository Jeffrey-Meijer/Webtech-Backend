<?php

namespace Backend;

require_once "Http/Message/RequestInterface.php";
require_once "Http/Message/UriInterface.php";


use Backend\Http\Message\RequestInterface;
use Backend\Http\Message\UriInterface;


class Request implements RequestInterface
{
    private UriInterface $uri;
    private array $get;
    private array $post;
    private array $files;
    private array $server;

    public function __construct($get, $post, $files, $server) {
        $this->get = $get;
        $this->post = $post;
        $this->files = $files;
        $this->server = $server;
    }

    public static function fromGlobals() : self {
        return new Request($_GET, $_POST, $_FILES, $_SERVER);
    }
    public function getProtocolVersion() : string
    {
        return $this->server["SERVER_PROTOCOL"] || null;
    }

    public function withProtocolVersion($version)
    {
        // TODO: Implement withProtocolVersion() method.
    }

    public function getHeaders()
    {
        // TODO: Implement getHeaders() method.
    }

    public function hasHeader($name)
    {
        // TODO: Implement hasHeader() method.
    }

    public function getHeader($name)
    {
        // TODO: Implement getHeader() method.
    }

    public function getHeaderLine($name)
    {
        // TODO: Implement getHeaderLine() method.
    }

    public function withHeader($name, $value)
    {
        // TODO: Implement withHeader() method.
    }

    public function withAddedHeader($name, $value)
    {
        // TODO: Implement withAddedHeader() method.
    }

    public function withoutHeader($name)
    {
        // TODO: Implement withoutHeader() method.
    }

    public function getBody()
    {
        // TODO: Implement getBody() method.
    }

    public function withBody(\Backend\Http\Message\StreamInterface $body)
    {
        // TODO: Implement withBody() method.
    }

    public function getRequestTarget()
    {
        // TODO: Implement getRequestTarget() method.
    }

    public function withRequestTarget($requestTarget)
    {
        // TODO: Implement withRequestTarget() method.
    }

    public function getMethod() : string
    {
        return $this->server["REQUEST_METHOD"] ?? "GET";
    }

    public function withMethod($method)
    {
        // TODO: Implement withMethod() method.
    }

    public function getUri() : UriInterface
    {
        return $this->uri;
//        return $this->server["REQUEST_URI"] ?? "/";
    }

    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        $this->uri = $uri;
        // TODO: Implement withUri() method.
    }
}

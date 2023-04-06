<?php

namespace Webtech\Http;

use Webtech\Http\Message\RequestInterface;
use Webtech\Http\Message\StreamInterface;
use Webtech\Http\Message\UriInterface;

class Request implements RequestInterface
{
    private UriInterface $uri;
    private array $get;
    private array $post;
    private array $files;
    private array $server;
    public RequestAttribute $attributes;

    public function __construct($get, $post, $files, $server)
    {
        $this->get = $get;
        $this->post = $post;
        $this->files = $files;
        $this->server = $server;
        $this->attributes = new RequestAttribute();
        $this->uri = new Uri($this->server["HTTPS"] ?? "http", $this->server["SERVER_NAME"], $this->server["SERVER_PORT"] ?? 80, explode("?", $this->server["REQUEST_URI"])[0], $this->server["QUERY_STRING"] ?? '');
    }

    public static function fromGlobals(): self
    {
        return new Request($_GET, $_POST, $_FILES, $_SERVER);
    }

    public function getProtocolVersion(): string
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
        return $this->get;
        // TODO: Implement getBody() method.
    }

    public function withBody(StreamInterface $body)
    {
//         TODO: Implement withBody() method.
    }

    public function getRequestTarget()
    {
        // TODO: Implement getRequestTarget() method.
    }

    public function withRequestTarget($requestTarget)
    {
        // TODO: Implement withRequestTarget() method.
    }

    public function getMethod(): string
    {
        return $this->server["REQUEST_METHOD"] ?? "GET";
    }

    public function withMethod($method)
    {
        // TODO: Implement withMethod() method.
    }

    public function getUri(): ?UriInterface
    {
        return $this->uri ?? null;
    }

    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        $newRequest = clone $this;
        $newRequest->uri = $uri;
    }
}
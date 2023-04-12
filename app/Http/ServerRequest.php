<?php

namespace Webtech\Http;

use Webtech\Http\Message\ServerRequestInterface;
use Webtech\Http\Message\StreamInterface;
use Webtech\Http\Message\UriInterface;

class ServerRequest implements ServerRequestInterface
{

    private UriInterface $uri;
    private array $get;
    private array $post;
    private array $files;
    private array $server;

    public function __construct($get, $post, $files, $server)
    {
        $this->get = $get;
        $this->post = $post;
        $this->files = $files;
        $this->server = $server;
    }

    public static function fromGlobals(): self
    {
        return new ServerRequest($_GET, $_POST, $_FILES, $_SERVER);
    }

    public function getProtocolVersion(): string
    {
        return "";
        // TODO: Implement getProtocolVersion() method.
    }

    public function withProtocolVersion(string $version): static
    {
        return $this;
        // TODO: Implement withProtocolVersion() method.
    }

    public function getHeaders(): array
    {
        return [];
        // TODO: Implement getHeaders() method.
    }

    public function hasHeader(string $name): bool
    {
        return true;
        // TODO: Implement hasHeader() method.
    }

    public function getHeader(string $name): array
    {
        return [];
        // TODO: Implement getHeader() method.
    }

    public function getHeaderLine(string $name): string
    {
        return "";
        // TODO: Implement getHeaderLine() method.
    }

    public function withHeader(string $name, array|string $value): static
    {
        return $this;
        // TODO: Implement withHeader() method.
    }

    public function withAddedHeader(string $name, array|string $value): static
    {
        return $this;
        // TODO: Implement withAddedHeader() method.
    }

    public function withoutHeader(string $name): static
    {
        return $this;
        // TODO: Implement withoutHeader() method.
    }

    public function getBody(): array
    {
        return [];
        // TODO: Implement getBody() method.
    }

    public function withBody(StreamInterface $body): static
    {
        return $this;
        // TODO: Implement withBody() method.
    }

    public function getRequestTarget()
    {
        // TODO: Implement getRequestTarget() method.
    }

    public function withRequestTarget(mixed $requestTarget)
    {
        // TODO: Implement withRequestTarget() method.
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
    }

    public function withMethod(string $method)
    {
        // TODO: Implement withMethod() method.
    }

    public function getUri()
    {
        // TODO: Implement getUri() method.
    }

    public function withUri(UriInterface $uri, bool $preserveHost = false)
    {
        // TODO: Implement withUri() method.
    }

    public function getServerParams()
    {
        // TODO: Implement getServerParams() method.
    }

    public function getCookieParams()
    {
        // TODO: Implement getCookieParams() method.
    }

    public function withCookieParams(array $cookies)
    {
        // TODO: Implement withCookieParams() method.
    }

    public function getQueryParams()
    {
        // TODO: Implement getQueryParams() method.
    }

    public function withQueryParams(array $query)
    {
        // TODO: Implement withQueryParams() method.
    }

    public function getUploadedFiles()
    {
        // TODO: Implement getUploadedFiles() method.
    }

    public function withUploadedFiles(array $uploadedFiles)
    {
        // TODO: Implement withUploadedFiles() method.
    }

    public function getParsedBody()
    {
        // TODO: Implement getParsedBody() method.
    }

    public function withParsedBody(object|array|null $data)
    {
        // TODO: Implement withParsedBody() method.
    }

    public function getAttributes()
    {
        // TODO: Implement getAttributes() method.
    }

    public function getAttribute(string $name, mixed $default = null)
    {
        // TODO: Implement getAttribute() method.
    }

    public function withAttribute(string $name, mixed $value)
    {
        // TODO: Implement withAttribute() method.
    }

    public function withoutAttribute(string $name)
    {
        // TODO: Implement withoutAttribute() method.
    }
}

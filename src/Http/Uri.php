<?php

namespace Webtech\Http;

use Webtech\Http\Message\UriInterface;

class Uri implements UriInterface
{
    private string $scheme;
    private string $host;
    private ?int $port;
    private string $path;
    private string $query;
    private string $fragment;

    public function __construct(
        string $scheme,
        string $host,
        ?int $port,
        string $path = '/',
        string $query = '',
        string $fragment = ''
    ) {
        $this->scheme = $scheme;
        $this->host = $host;
        $this->port = $port;
        $this->path = $path;
        $this->query = $query;
        $this->fragment = $fragment;
    }

    public function getScheme(): string
    {
        return $this->scheme;
    }

    public function getAuthority(): string
    {
        $authority = $this->host;
        if ($this->port) {
            $authority .= ':' . $this->port;
        }
        return $authority;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getQuery(): string
    {
        return $this->query;
    }

    public function getFragment(): string
    {
        return $this->fragment;
    }

    public function getUserInfo()
    {
        // TODO: Implement getUserInfo() method.
    }

    public function withScheme(string $scheme)
    {
        // TODO: Implement withScheme() method.
    }

    public function withUserInfo(string $user, string $password = null)
    {
        // TODO: Implement withUserInfo() method.
    }

    public function withHost(string $host)
    {
        // TODO: Implement withHost() method.
    }

    public function withPort(?int $port)
    {
        // TODO: Implement withPort() method.
    }

    public function withPath(string $path)
    {
        $newUri = clone $this;
        $newUri->path = $path;
        return $newUri;
    }

    public function withQuery(string $query)
    {
        // TODO: Implement withQuery() method.
    }

    public function withFragment(string $fragment)
    {
        // TODO: Implement withFragment() method.
    }

    public function __toString(): string
    {
        return $this->scheme . "://" . $this->host . ":" . $this->port . $this->path;
    }
}
<?php

namespace Webtech\Response;

use Webtech\Http\Message\ResponseInterface;
use Webtech\Http\Message\StreamInterface;

class Response implements ResponseInterface
{

    private array $headers;
    private string $content;
    private int $status;
    private string $protocol;

    public function __construct(string $content = '', int $status = 200, array $headers = [])
    {
        $this->setHeaders($headers);
        $this->setContent($content);
        $this->setStatusCode($status);
        $this->setProtocolVersion('1.1');
    }

    public function setContent(string $content = '')
    {
        $this->content = $content;
    }

    public function setStatusCode(int $status)
    {
        $this->status = $status;
    }

    public function setProtocolVersion(string $protocol)
    {
        $this->protocol = $protocol;
    }

    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();

        return $this;
    }

    public function sendHeaders()
    {
        foreach ($this->headers as $key => $value) {
            header($key . ': ' . $value);
        }
        return $this;
    }

    public function sendContent()
    {
        echo $this->content;
        return $this;
    }

    public function getProtocolVersion(): string
    {
        return $this->protocol;
    }

    public function withProtocolVersion(string $version): static
    {
        $newResponse = clone $this;
        $newResponse->protocol = $version;
        return $newResponse;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers = [])
    {
        $this->headers = $headers;
    }

    public function hasHeader(string $name): bool
    {
        foreach ($this->headers as $key => $value) {
            if ($name === $key) {
                return true;
            }
        }
        return false;
    }

    public function getHeader(string $name): array
    {
        foreach ($this->headers as $key => $value) {
            if ($key === $name) {
                return $value;
            }
        }
        return [];
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

    public function getStatusCode()
    {
        return $this->status;
    }

    public function withStatus(int $code, string $reasonPhrase = '')
    {
        $newResponse = clone $this;
        $newResponse->status = $code;
        return $newResponse;
    }

    public function getReasonPhrase()
    {
        // TODO: Implement getReasonPhrase() method.
    }
}

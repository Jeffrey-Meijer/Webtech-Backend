<?php

namespace Webtech\Http;

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

    public function getProtocolVersion()
    {
        return $this->protocol;
    }

    public function withProtocolVersion($version)
    {
        $newResponse = clone $this;
        $newResponse->protocol = $version;
        return $newResponse;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function setHeaders(array $headers = [])
    {
        $this->headers = $headers;
    }

    public function hasHeader($name)
    {
        foreach ($this->headers as $key => $value) {
            if ($name === $key) {
                return true;
            }
        }
        return false;
    }

    public function getHeader($name)
    {
        foreach ($this->headers as $key => $value) {
            if ($key === $name) {
                return $value;
            }
        }
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

    public function withBody(StreamInterface $body)
    {
        // TODO: Implement withBody() method.
    }

    public function getStatusCode()
    {
        return $this->status;
    }

    public function withStatus($code, $reasonPhrase = '')
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

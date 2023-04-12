<?php

namespace Webtech\Http;

use Webtech\Http\Message\StreamInterface;

class Stream implements StreamInterface
{

    private string $stream;

    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

    public function close()
    {
        // TODO: Implement close() method.
    }

    public function detach()
    {
        // TODO: Implement detach() method.
    }

    public function getSize()
    {
        // TODO: Implement getSize() method.
    }

    public function tell()
    {
        // TODO: Implement tell() method.
    }

    public function eof()
    {
        // TODO: Implement eof() method.
    }

    public function isSeekable()
    {
        // TODO: Implement isSeekable() method.
    }

    public function seek(int $offset, int $whence = SEEK_SET)
    {
        // TODO: Implement seek() method.
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
    }

    public function isWritable()
    {
        // TODO: Implement isWritable() method.
    }

    public function write(string $string)
    {
        $this->stream = $string;
        // TODO: Implement write() method.
    }

    public function isReadable()
    {
        // TODO: Implement isReadable() method.
    }

    public function read(int $length): string
    {
        return $this->stream;
        // TODO: Implement read() method.
    }

    public function getContents()
    {
        // TODO: Implement getContents() method.
    }

    public function getMetadata(string $key = null)
    {
        // TODO: Implement getMetadata() method.
    }
}

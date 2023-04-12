<?php

namespace Webtech\Http\Message;

use Http\Message\StreamInterface;
use Http\Message\UploadedFileInterface;
use InvalidArgumentException;

use const UPLOAD_ERR_OK;

interface UploadedFileFactoryInterface
{
    /**
     * Create a new uploaded file.
     *
     * If a size is not provided it will be determined by checking the size of
     * the stream.
     *
     * @link http://php.net/manual/features.file-upload.post-method.php
     * @link http://php.net/manual/features.file-upload.errors.php
     *
     * @param StreamInterface $stream The underlying stream representing the
     *     uploaded file content.
     * @param int|null $size The size of the file in bytes.
     * @param int $error The PHP file upload error.
     * @param string|null $clientFilename The filename as provided by the client, if any.
     * @param string|null $clientMediaType The media type as provided by the client, if any.
     *
     * @return UploadedFileInterface
     * @throws InvalidArgumentException If the file resource is not readable.
     */
    public function createUploadedFile(
        StreamInterface $stream,
        int $size = null,
        int $error = UPLOAD_ERR_OK,
        string $clientFilename = null,
        string $clientMediaType = null
    ): UploadedFileInterface;
}
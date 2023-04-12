<?php

namespace Webtech\EventDispatcher\Interfaces;

use Webtech\Http\Message\RequestInterface;

interface EventInterface
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getData(): array;

    public function setData(array $data): void;

    public function getRequest(): RequestInterface;

    public function setRequest(RequestInterface $request): void;
}

<?php

namespace Webtech\EventDispatcher\Events;

use Webtech\EventDispatcher\Interfaces\EventInterface;
use Webtech\Http\Message\RequestInterface;

class GenericEvent implements EventInterface {

    protected string $name = "Generic Event";
    protected array $data = [];
    protected RequestInterface $request;
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    public function setRequest(RequestInterface $request): void
    {
        $this->request = $request;
    }
}

<?php

namespace Webtech\EventDispatcher;

use Webtech\EventDispatcher\Interfaces\ListenerProviderInterface;

class ListenerProvider implements ListenerProviderInterface
{
    private $listeners = [];

    public function addListener(string $eventName, callable $listener)
    {
        $this->listeners[$eventName][] = $listener;
    }

    public function getListenersForEvent(object $event): iterable
    {
        $eventName = $event->getName(); // Create interface for event

        if (!isset($this->listeners[$eventName])) {
            return [];
        }

        return $this->listeners[$eventName];
    }
}

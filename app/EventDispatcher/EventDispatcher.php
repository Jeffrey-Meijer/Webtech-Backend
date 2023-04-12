<?php

namespace Webtech\EventDispatcher;

use Webtech\EventDispatcher\Interfaces\EventDispatcherInterface;
use Webtech\EventDispatcher\Interfaces\ListenerProviderInterface;

class EventDispatcher implements EventDispatcherInterface
{
    private ListenerProviderInterface $listenerProvider;

    public function __construct(ListenerProviderInterface $listenerProvider)
    {
        $this->listenerProvider = $listenerProvider;
    }

    public function dispatch(object $event): object
    {
        foreach ($this->listenerProvider->getListenersForEvent($event) as $listener) {
            $listener($event);
        }

        return $event;
    }
}

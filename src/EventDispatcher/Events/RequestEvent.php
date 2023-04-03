<?php
namespace Webtech\EventDispatcher\Events;

class RequestEvent extends GenericEvent {
    public function __construct() {
        $this->name = "on.request";
    }
}

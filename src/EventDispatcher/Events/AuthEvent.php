<?php

namespace Webtech\EventDispatcher\Events;

class AuthEvent extends GenericEvent
{
    public function __construct()
    {
        $this->name = "on.auth_check";
    }
}

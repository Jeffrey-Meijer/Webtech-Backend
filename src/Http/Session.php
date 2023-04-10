<?php

namespace Webtech\Http;

class Session {
    private array $session = [];
    private static ?self $instance = null;

    private function __construct() {}

    public static function getInstance() : self {
        if (Session::$instance == null) {
            var_dump("new instance");
            Session::$instance = new Session();
        }
        return Session::$instance;
    }

    /**
     * @return array
     */
    public function getSessions(): array
    {
        return $this->session;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getSession($key) {
        if (isset($this->session[$key])) return $this->session[$key];
        return null;
    }

    /**
     * @param array $session
     */
    public function setSession(array $session): void
    {
        $this->session = $session;
    }
    public function addSession($key, $value) : void {
        $this->session[$key] = $value;
    }
}

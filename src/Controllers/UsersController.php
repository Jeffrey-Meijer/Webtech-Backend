<?php

namespace Webtech\Controllers;

class UsersController extends GenericController
{
    public function view()
    {
        echo $this->templateLoader->load("users");
    }
}

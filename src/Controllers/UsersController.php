<?php

namespace Webtech\Controllers;

class UsersController extends GenericController
{
    public function view()
    {
        $data = ["users" => $this->model->getAllUsers()];
        echo $this->templateLoader->load("users", $data);
    }
}

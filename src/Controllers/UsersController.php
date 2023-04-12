<?php

namespace Webtech\Controllers;

use Exception;

class UsersController extends GenericController
{
    /**
     * @throws Exception
     */
    public function view()
    {
        $data = ["users" => $this->model->getAllUsers()];
        echo $this->templateLoader->load("users", $data);
    }
}

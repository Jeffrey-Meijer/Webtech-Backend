<?php

namespace Webtech\Controllers;

use Exception;

class UsersController extends GenericController
{
    /**
     * @throws Exception
     */
    public function view(): void
    {
        $data = ["users" => $this->model->getAllUsers()];
        $this->templateLoader->load("users", $data);
    }
}

<?php

namespace Webtech\Controllers;

use Webtech\Helpers\ExtractQuery;
use Webtech\Http\Session;

class AuthController extends GenericController
{

    public function view()
    {
        $query = $this->request->getRequest()->getUri()->getQuery();
        if ($query != "") {
            $extractedParameters = ExtractQuery::extractQuery($query);
            $user = $this->getModel()->getUserByEmail(urldecode($extractedParameters[0]["email"]));
            if ($user->password === $extractedParameters[1]["password"]) {
                // log it to $session
                $_SESSION["uuid"] = $user->uuid;
                $_SESSION["logged_in"] = true;
                $_SESSION["role"] = $user->occupation;
            }
        }

        $data = ["header" => "header", "footer" => "footer"];

        echo $this->templateLoader->load("login", $data);
    }

    public function logout() {
        unset($_SESSION["uuid"]);
        unset($_SESSION["logged_in"]);
        unset($_SESSION["role"]);

        $data = ["header" => "header", "footer" => "footer"];
        echo $this->templateLoader->load("login", $data);
    }
    public function registerView()
    {
        $query = $this->request->getRequest()->getUri()->getQuery();
        if ($query != "") {
            $parameters = explode("&", $query);
            $extractedParameters = array();
            foreach ($parameters as $parameter) {
                $split = explode("=", $parameter);
                $extractedParameters[] = array($split[0] => $split[1]);
            }
            $user = $this->getModel()->getUserByEmail(urldecode($extractedParameters[0]["email"]));
            if ($user->password === $extractedParameters[1]["password"]) {
                // log it to $session
                $_SESSION["uuid"] = $user->uuid;
                $_SESSION["logged_in"] = true;
                $_SESSION["role"] = $user->occupation;
            }
        }
        $data = ["header" => "header", "footer" => "footer"];

        echo $this->templateLoader->load("register", $data);
    }
}

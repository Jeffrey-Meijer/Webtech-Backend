<?php

namespace Webtech\Controllers;

use Webtech\Helpers\ExtractQuery;

class AuthController extends GenericController
{

    public function view()
    {
        $templates = ["header" => "header", "footer" => "footer"];

        echo $this->templateLoader->load("login", [], $templates);
    }

    public function logout()
    {
        unset($_SESSION["uuid"]);
        unset($_SESSION["logged_in"]);
        unset($_SESSION["role"]);

        echo $this->templateLoader->load("login");
    }

    public function handleLogin()
    {
        $requestBody = $this->request->getRequest()->getBody();
        $email = $requestBody["email"];
        $pass = $requestBody["password"];

        $user = $this->getModel()->getUserByEmail($email);
        $templates = ["header" => "header", "footer" => "footer"];
        if (password_verify($pass, $user->password)) {
            // log it to $session
            $_SESSION["uuid"] = $user->uuid;
            $_SESSION["logged_in"] = true;
            $_SESSION["role"] = $user->occupation;
            echo $this->templateLoader->load("home", [], $templates);
        } else {
            echo $this->templateLoader->load("login", [], $templates);
        }
    }

    public function handleRegister()
    {
        $requestBody = $this->request->getRequest()->getBody();
        $uuid = $requestBody["uuid"];
        $first_name = $requestBody["first_name"];
        $last_name = $requestBody["last_name"];
        $email = $requestBody["email"];
        $pass = $requestBody["password"];
        $occupation = $requestBody["occupation"];


        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

        $id = $this->getModel()->createUser($uuid, $first_name, $last_name, $email, $hashed_pass, $occupation);

        if ($id && !$_SESSION["logged_in"]) {
            $_SESSION["uuid"] = $uuid;
            $_SESSION["logged_in"] = true;
            $_SESSION["role"] = $occupation;
        }
        $templates = ["header" => "header", "footer" => "footer"];
        echo $this->templateLoader->load("home", [], $templates);
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
        $templates = ["header" => "header", "footer" => "footer"];

        echo $this->templateLoader->load("register", [], $templates);
    }
}

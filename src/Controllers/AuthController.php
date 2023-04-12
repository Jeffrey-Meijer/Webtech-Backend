<?php

namespace Webtech\Controllers;

use Exception;

class AuthController extends GenericController
{

    /**
     * @throws Exception
     */
    public function view(): void
    {
        $templates = ["header" => "header", "footer" => "footer"];

        $this->templateLoader->load("login", [], $templates);
    }

    /**
     * @throws Exception
     */
    public function logout(): void
    {
        unset($_SESSION["uuid"]);
        unset($_SESSION["logged_in"]);
        unset($_SESSION["role"]);

        $this->templateLoader->load("login");
    }

    /**
     * @throws Exception
     */
    public function handleLogin(): void
    {
        $requestBody = $this->request->getRequest()->getBody();
        $email = $requestBody["email"];
        $pass = $requestBody["password"];

        $user = $this->getModel()->getUserByEmail($email);
        $templates = ["header" => "header", "footer" => "footer"];
        if ($user && password_verify($pass, $user->password)) {
            // log it to $session
            $_SESSION["uuid"] = $user->uuid;
            $_SESSION["logged_in"] = true;
            $_SESSION["role"] = $user->occupation;
            $this->templateLoader->load("home", [], $templates);
        } else {
            $this->templateLoader->load("login", [], $templates);
        }
    }

    /**
     * @throws Exception
     */
    public function handleRegister(): void
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
        $this->templateLoader->load("home", [], $templates);
    }

    /**
     * @throws Exception
     */
    public function registerView(): void
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

        $this->templateLoader->load("register", [], $templates);
    }
}

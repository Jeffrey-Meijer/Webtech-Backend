<?php

namespace Webtech\Controllers;

class LoginController extends GenericController
{

    public function view()
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
            }
        }

        echo $this->templateLoader->load("login");
    }
}

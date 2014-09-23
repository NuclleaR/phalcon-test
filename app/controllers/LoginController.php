<?php

class LoginController extends ControllerBase {

    public function indexAction() {

    }

    public function loginAction() {

        $authData = $this->request->get();
        $user = Users::findFirst("name='" . $authData['name'] . "'");

        if ($user && ($user->password == $authData['password'])) {

            $this->session->set("user-name", $user->name);

            $this->response->redirect();

        }

//        var_dump($auth['name']);die;

    }

}
<?php

class LoginController extends ControllerBase {

    public function indexAction() {

    }

    public function loginAction() {


        $authData = $this->request->get();
        $user = Users::findFirst("name='" . $authData['name'] . "'");

        if ($user->password == $authData['password']) {

            $this->session->set("user-name", $user->name);

            $this->response->redirect();


        } else {

        }


//        var_dump($auth['name']);die;

    }

}
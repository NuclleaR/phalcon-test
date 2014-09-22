<?php

class LoginController extends ControllerBase {

    public function indexAction() {

    }

    public function loginAction() {


        $authData = $this->request->get();
        $user = Users::findFirst("name='".$authData['name']."'");

        if ($user->password == $authData['password']){
            $this->session->set("user-name", $user->name);

            $this->response->redirect();

//            if($this->session->has("user-name")) {
//
//                $name = $this->session->get("user-name");
//
//                var_dump($name . " is logined!");
//                die();
//            }

        } else {

        }


//        var_dump($auth['name']);die;

    }

}
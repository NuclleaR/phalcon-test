<?php

class AuthController extends ControllerBase {

    public function indexAction() {

        $user = false;

        $this->view->setVar('user', $user);

    }

    public function loginAction() {

        $authData = $this->request->get();

        $user = Users::findFirst("name='" . $authData['name'] . "'");

        if ($user && ($user->getPassword() == $authData['password'])) {

            $this->session->set("user-name", $user->getName());

            $this->response->redirect();

        } else {

//            var_dump($this->view);die;

            $user = true;

//            $this->response->redirect('auth');

        }
    }

    public function removeSessionAction() {
        $this->session->remove("user-name");
    }

    public function logoutAction() {

        $this->session->destroy();
        $this->response->redirect();

    }
}
<?php

class LogoutController extends ControllerBase {

    public function indexAction() {
    }

    public function removeAction() {
        $this->session->remove("user-name");
    }

    public function logoutAction() {

        $this->session->destroy();
        $this->response->redirect();

    }

}
<?php

class SignupController extends ControllerBase {

    public function indexAction() {

    }

    public function registerAction() {

        $user = new Users();

//        var_dump($this->request->getPost());die();

//        var_dump($this->response->redirect());die();

        $success = $user->save($this->request->getPost(), array('name', 'email', 'password'));

        if ($success) {
            $this->response->redirect();
        } else {
            echo "К сожалению, возникли следующие проблемы: ";
            foreach ($user->getMessages() as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }
    }

}
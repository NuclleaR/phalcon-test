<?php

class SignupController extends ControllerBase {

    public function indexAction() {

        if($this->request->isPost()){
            
            $post = $this->request->getPost();
            $user = new Users();
            $user->setEmail($post['email']);
            $user->setName($post['name']);
            $user->setPassword($post['password']);

            $success = $user->save();

            if ($success) {

                $this->response->redirect();

            } else {

                $errors = array();

                foreach ($user->getMessages() as $message) {
                    array_push($errors, $message->getMessage());
                }

                $this->view->setVar('errors', $errors);

            }
        }
    }

}
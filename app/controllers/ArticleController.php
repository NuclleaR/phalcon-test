<?php

class ArticleController extends ControllerBase {

    public function indexAction() {

        if ($this->request->isPost()) {

            $post = $this->request->getPost();

            $comment = new Comments();
            $comment->setComment($post['comment']);

            $successAdd = $comment->save();

            if ($successAdd) {

                $this->response->redirect('article');

            } else {

                $errors = array();

                foreach ($comment->getMessages() as $message) {
                    array_push($errors, $message->getMessage());
                }

                $this->view->setVar('errors', $errors);
            }
        }

        $comments = Comments::find();
        $this->view->setVar('comments', $comments);
    }

}
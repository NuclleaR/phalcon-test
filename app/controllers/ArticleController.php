<?php

class ArticleController extends ControllerBase {

    public function indexAction() {

        $comments = Comments::find();

//        var_dump($comments);die();


    }

    public function addcommentAction() {
        $comment = new Comments();

//        var_dump($this->request->getPost());die();

        $successAdd = $comment->save($this->request->getPost(), array('comment'));

        if ($successAdd) {
            $this->response->redirect('article');
        } else {
            echo "К сожалению, возникли следующие проблемы: ";
            foreach ($comment->getMessages() as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }
    }

    public function commentsAction() {

        $comments = Comments::find();

        foreach ($comments as $comment) {
            echo $comment->comment . "<br/>";
        }

    }

}
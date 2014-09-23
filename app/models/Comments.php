<?php

use Phalcon\Mvc\Model\Validator\PresenceOf as PresenceOf;

class Comments extends \Phalcon\Mvc\Model {

    public $comment;

    public function validation() {

        $this->validate(new PresenceOf(array(
            'field'   => 'comment',
            'message' => 'Комментарий не может быть пустым'
        )));

        if ($this->validationHasFailed() == true) {
            return false;
        }
    }

}
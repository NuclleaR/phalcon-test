<?php

use Phalcon\Mvc\Model\Validator\PresenceOf as PresenceOf;

class Users extends Phalcon\Mvc\Model {


    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=true)
     */
    protected $name;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=true)
     */
    protected $email;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=true)
     */
    protected $password;

    /**
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * Company validation method
     *
     * @return bool
     */
    public function validation() {

        $this->validate(new PresenceOf(array(
            'field'   => 'name',
            'message' => 'Поле с именем не может быть пустым'
        )));

        $this->validate(new PresenceOf(array(
            'field'   => 'email',
            'message' => 'Поле e-mail не может быть пустым'
        )));

        $this->validate(new PresenceOf(array(
            'field'   => 'password',
            'message' => 'Пароль не может быть пустым'
        )));

        if ($this->validationHasFailed()) {
            return false;
        }
    }
}
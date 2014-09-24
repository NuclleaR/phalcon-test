<?php

use Phalcon\Mvc\Model\Validator\Uniqueness as Uniqueness,
    Phalcon\Mvc\Model\Validator\PresenceOf,
    Phalcon\Mvc\Model\Validator\Regex;
//    Library\Model\Validator\Address as Address;

class Company extends BaseModel
{

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
     * @Column(type="string", length=100, nullable=true)
     */
    protected $name;



    /**
     *
     * @var boolean
     * @Column(type="integer", length=1, nullable=true)
     */
    protected $is_active;

    /**
     *
     * @var string
     * @Column(type="string", length=150, nullable=true)
     */
    protected $address;

    /**
     *
     * @var string
     * @Column(type="string", length=400, nullable=true)
     */
    protected $notes;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = preg_replace('/\s+/', ' ', trim($name));

        return $this;
    }

    /**
     * Method to set the value of field is_active
     *
     * @param boolean $is_active
     * @return $this
     */
    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;

        return $this;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        foreach($address as &$value){
            $value = preg_replace('/\s+/', ' ', trim($value));
        }
        $this->address = json_encode($address);
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = preg_replace('/\s+/', ' ', trim($notes));
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field is_active
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * @return string
     */
    public function getAddress($toString = true)
    {
        if(!$toString){
            return json_decode($this->address);
        }
        return $this->address;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->hasMany('id', 'Campaign', 'company_id', NULL);
        $this->hasMany('id', 'Mtag', 'company_id', NULL);
        $this->hasMany('id', 'Personnel', 'company_id', NULL);
    }

    /**
     * Company validation method
     *
     * @return bool
     */
    public function validation() {
        $this->validate(new Uniqueness(array(
            'field' => 'name',
            'message' => '<br>Partner with this name already exists.<br>'
        )));

        $this->validate(new PresenceOf(array(
            'field' => 'name',
            'message' => '<br>Partner name is required.<br>',
        )));

        $this->validate(new Regex(array(
            'field' => 'name',
            'pattern' => '/^([a-z ]+)$/i',
            'message' => '<br>Partner name should contains only letters (A-z) and spaces.<br>'
        )));

        $this->validate(new Address(array(
            'field' => 'address'
        )));

        return $this->validationHasFailed() != true;
    }
}
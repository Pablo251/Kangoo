<?php

use Phalcon\Mvc\Model\Validator\Email as Email;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Uniqueness;

class User extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_user;

    /**
     *
     * @var string
     */
    public $username;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var integer
     */
    public $active;

    /**
     * Before create the user assign a password
     */
    public function beforeValidationOnCreate()
    {
        //The account must be confirmed via e-mail
        $this->active = 0;
    }

    /**
     * Send a confirmation e-mail to the user if the account is not active
     */
    public function afterSave()
    {
        if ($this->active == 0) {
            $emailConfirmation = new EmailConfirmations();
            $emailConfirmation->usersId = $this->id_user;

            if ($emailConfirmation->save()) {
                $this->getDI()->getFlash()->notice(
                    '<h4> A confirmation mail has been sent to </h4> ' . $this->email
                );
            }

        }
    }
    /**
     * Validations and business logic
     * Validate that emails are unique across users
     * @return boolean
     */
    public function validation()
    {
        $this->validate(new Email(
                array(
                    'field'    => 'email',
                    'required' => true,
                )
            ),
            new Uniqueness(
                array(
                    "field"   => "email",
                    "message" => "The email is already registered"
                ));
        if ($this->validationHasFailed() == true) {
            return false;
        }
        return true;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_user', 'Adressee', 'id_user', array('alias' => 'Adressee'));
        $this->hasMany('id_user', 'EmailConfirmations', 'usersId', array('alias' => 'EmailConfirmations'));
        $this->hasMany('id_user', 'Mail', 'fk_user', array('alias' => 'Mail'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return User[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return User
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

<?php
use Phalcon\Mvc\Model;

class Mail extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $id_mail;

    /**
     *
     * @var string
     */
    public $fk_user;

    /**
     *
     * @var string
     */
    public $state;

    /**
     *
     * @var string
     */
    public $subject;

    /**
     *
     * @var string
     */
    public $content;

    /**
     *
     * @var string
     */
    public $date;

    /**
     *
     * @var integer
     */
    public $active;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_mail', 'Adressee', 'id_mail', array('alias' => 'Adressee'));
        $this->belongsTo('fk_user', 'User', 'id_user', array('alias' => 'User'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'mail';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Mail[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Mail
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

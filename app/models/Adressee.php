<?php
use Phalcon\Mvc\Model;
class Adressee extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $id_adresse;

    /**
     *
     * @var string
     */
    public $id_mail;

    /**
     *
     * @var string
     */
    public $adresse;

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
        $this->belongsTo('id_mail', 'Mail', 'id_mail', array('alias' => 'Mail'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'adressee';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Adressee[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Adressee
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

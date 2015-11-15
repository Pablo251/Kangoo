<?php
use Phalcon\Mvc\Controller;
class IndexController extends ControllerBase
{
    /*Initialize the controller class*/
    public function initialize(){
      //Set a title in the index file of view
      $this->tag->setTitle("Welcome to Kangoo");
    }
    public function indexAction()
    {

    }
    //My sandbox tester :D
    private $arrayName = array('dashboard' => array('hola' ,'adios' ));
    public function monyAction()
    {
       //print_r($this->acl);
      //  $prueba = array_key_exists('oard', $this->arrayName);
      //  if ($prueba==false) {
      //    echo "Si está";
      //  }else{
      //    echo "no ta :3";
      //  }
      var_dump($this->session->get('auth-identity'));
    }
    public function errorsAction(){
      echo "nada";
    }
}

<?php
use Phalcon\Mvc\Controller;

class SessionController extends ControllerBase
{
    /*Initialize This Controller*/ 
    public function initialize(){
      $this->tag->setTitle("Sign up");
      parent::initialize();
    }

    public function indexAction()
    {
    }
    /**
    * execute the signup ation, face to an existent user.
    */
    public function signupAction()
    {
      echo "<h2>Hola soy un form</h2>";
    }
}

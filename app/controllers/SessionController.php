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
    echo "<h1>Hello!</h1>";
  }
  /**
  * execute the signup ation, face to an existent user.
  */
  public function signupAction()
  {
    $myForm = new SignUpForm();
    if ($this->request->isPost()) {
      if ($myForm->isValid($this->request->getPost()) != false) { //->isValid($this->request->getPost()) != false
        //trying to send an email

        echo "<h1>Under develop... Confirmation coming soon</h1>";
        var_dump($this->request->getPost());
      }
    }
    $this->view->form = $myForm;
  }
}

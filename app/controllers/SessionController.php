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
    $form = new SignUpForm();
    if ($this->request->isPost()) {
        if ($form->isValid($this->request->getPost()) != false) {
          $user = new User();
          $user->assign(array(
              'username' => $this->request->getPost('name', 'striptags'),
              'password' => $this->security->hash($this->request->getPost('password')),
              'email' => $this->request->getPost('email'),
              'active' => 0
          ));
          if ($user->save()) {
            echo "Se guarda";
          }else{
            echo "No funcó";
          }
          die;
        }
    }
    $this->view->form = $form;
  }
}

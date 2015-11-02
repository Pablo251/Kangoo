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
    $myForm = new SignUpForm();
    if ($this->request->isPost()) {

      if ($form->isValid($this->request->getPost()) != false) {

        $user = new Users();

        $user->assign(array(
          'name' => $this->request->getPost('name', 'striptags'),
          'email' => $this->request->getPost('email'),
          'password' => $this->security->hash($this->request->getPost('password')),
          'profilesId' => 2
        ));

        if ($user->save()) {
          return $this->dispatcher->forward(array(
            'controller' => 'index',
            'action' => 'index'
          ));
        }

        $this->flash->error($user->getMessages());
      }
    }
    $this->view->form = $myForm;
  }
}

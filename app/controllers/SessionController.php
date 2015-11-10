<?php
use Phalcon\Mvc\Controller;
//use Vokuro\Forms\LoginForm;
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

  public function loginAction()
  {
    $form = new LoginForm();
    if ($this->request->isPost()) {
      if ($form->isValid($this->request->getPost()) != false) {
        echo "<h1>So near! Our App is under development... ;) </h1>";
      }
    }
    $this->view->form = $form;
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
            return $this->dispatcher->forward(array(
                'controller' => 'index',
                'action' => 'index'
            ));
          }else{
            echo "<h5>Upps! Data couldn't be saved :(... Try again...</h5>";
          }
          $this->flash->error($user->getMessages());
        }
    }
    $this->view->form = $form;
  }
  /**
   * Account confirmation through the previous sent mail.
   */
  public function confirmEmailAction()
  {
      $code = $this->dispatcher->getParam('code');

      $confirmation = EmailConfirmations::findFirstByCode($code);

      if (!$confirmation) {
          return $this->dispatcher->forward(array(
              'controller' => 'index',
              'action' => 'index'
          ));
      }
      if ($confirmation->confirmed != 'N') {
          return $this->dispatcher->forward(array(
              'controller' => 'session',
              'action' => 'login'
          ));
      }

      $confirmation->confirmed = 'Y';

      $confirmation->user->active = 1;

      /**
       * Change the confirmation to 'confirmed' and update the user to 'active'
       */
      if (!$confirmation->save()) {

          foreach ($confirmation->getMessages() as $message) {
              $this->flash->error($message);
          }

          return $this->dispatcher->forward(array(
              'controller' => 'index',
              'action' => 'index'
          ));
      }

      /**
       * Identify the user in the application
       */
      //$this->auth->authUserById($confirmation->user->id_user);

      $this->flash->success('The email was successfully confirmed');

      return $this->dispatcher->forward(array(
          'controller' => 'index',
          'action' => 'index'
      ));
  }
}

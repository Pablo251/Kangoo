<?php
use Phalcon\Mvc\Controller;
/**
 *  User Controller
 */
class DashboardController extends ControllerBase
{
  /**
  * Index, this is private, user only can access if are logged into the app
  */
  public function indexAction(){
    //echo "<h1>Hello " . $this->session->get('authenticated')['id'].".... App is under development :P</h1>" ;
  }
   public function newAction(){
    $form = new NewMailForm();
    if ($this->request->isPost()) {
      if ($form->isValid($this->request->getPost()) != false) {
        $mail = new User();
        $mail->assign(array(
          'fk_user' => $this->session->get('authenticated')['id'],
          'state' => 'pending',
          'subject' => $this->request->getPost('subject'),
          'content' => $this->request->getPost('content'),
          'date' => date("d-m-Y", time()),
          'active' => 0
        ));
        if ($mail->save()) {
          return $this->dispatcher->forward(array(
            'controller' => 'index',
            'action' => 'index'
          ));
        }else{
          echo "<h5>Upps! Data couldn't be saved :(... Try again...</h5>";
        }
        $this->flash->error($mail->getMessages());
      }
    }
    $this->view->form = $form;
  }
  /**
  * Account confirmation through the previous sent mail.
  */
  }

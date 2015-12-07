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
  public function initialize(){
    parent::initialize();
  }
  /**
  * This load a mailbox view...
  */
  public function indexAction(){
    //echo "<h1>Hello " . $this->session->get('authenticated')['id'].".... App is under development :P</h1>" ;
  }
   public function newAction(){
    $form = new NewMailForm();
    if ($this->request->isPost()) {
      if ($form->isValid($this->request->getPost()) != false) {
        $mail = new Mail();
        $mail->assign(array(
          'fk_user' => $this->session->get('authenticated')['id'],
          'state' => 'pending',
          'subject' => $this->request->getPost('subject'),
          'content' => $this->request->getPost('content'),
          'date' => date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000)),
          'active' => 1
        ));
        if ($mail->save()) {
          return $this->dispatcher->forward(array(
            'controller' => 'dashboard',
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
  /**
  * This take a 10 mails in the output gate.
  */
  public function outputChargerAction(){
    //Disable view
    $this->view->disable();
    //Post?
    if ($this->request->isPost() && $this->request->isAjax()) {
      //take the info posted: Mails Count
      $stackCount = $this->request->getPost('sentstack');
      //take the target to find
      $findBy = $this->request->getPost('findby');
      //Create my response JSON_array
      $JSON = array();
      //Temporal array
      $mytemp = array();
      //Execute a select
      $allmails = Mail::find();
      //Set my loop counter
      $loopCounter = --$stackCount;
      //count the laps
      $lapsCounter = 0;
      //It's the final mails... Turururuuu... turututu..
      for ($i=$stackCount; $i >= 0; $i--) {
        //Was sent and are active
        if ($allmails[$loopCounter]->state==$findBy&&$allmails[$loopCounter]->active==1) {
          $mytemp = $allmails[$loopCounter];
          array_push($JSON, $mytemp);
          //Ask if exist 10 mails in the stack
          if(count($JSON)==5){
            break;
          }
        }
        --$loopCounter;
        ++$lapsCounter;
      }
    //Run and Push a custom response
    $this->response->setJsonContent(array(
     'mails'=>$JSON,
     'finalLoop'=>++$loopCounter,
     'initialLoop'=>$this->request->getPost('sentstack'),
     'diference'=>$lapsCounter));
    $this->response->setStatusCode(200, "OK");
    $this->response->send();
    }
  }
  /**
  * Ajax Get petition. Get the count of the all mails in the db
  * @return ajax:get JSON: Count of the mail stack
  */
  public function getMailStackAction(){
    //Disablen the view
    $this->view->disable();
    //Is post an Ajax request
    if ($this->request->isGet()) {
      if ($this->request->isAjax()) {
        //Execute querys
        $allmails = Mail::find();
        $this->response->setJsonContent(count($allmails));
        $this->response->setStatusCode(200, "OK");
        $this->response->send();
      }else{
        $this->response->setStatusCode(404, "Not Found");
      }
    }
  }
  /**
  * Delete a selected mail
  */
  public function deleteMailAction(){
    //Disable the view
    $this->view->disable();
    if ($this->request->isPost()&&$this->request->isAjax()) {
      //Get the info
      $mailTarget = $this->request->getPost('id_mail');
      //Find the correct email
      $selectEmail = Mail::findFirst("id_mail = $mailTarget");
      //Inactive that mail
      $selectEmail->active = 0;
      $selectEmail->state = "deleted";
      //Try to save the new changes
      if ($selectEmail->save()) {
         $this->response->setJsonContent("success");
      }else{
         $this->response->setJsonContent("fail");
      }
      $this->response->setStatusCode(200, "OK");
      $this->response->send();
    }
  }
  /**
  * Get the mail
  */
  public function getEmailAction(){
    //Disable the view
    $this->view->disable();
    if ($this->request->isPost()) {
      if ($this->request->isAjax()) {
        $mailTarget = $this->request->getPost('id_mail');
        //Find the correct email
        $selectEmail = Mail::findFirst("id_mail = $mailTarget");
        $this->response->setJsonContent($selectEmail);
        $this->response->setStatusCode(200, "OK");
        $this->response->send();
      }else {
        $this->response->setStatusCode(404, "Not Found");
      }
    }
  }
//------------------------------------------------------------------------Edge--
}

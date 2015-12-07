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
    ///echo "<h1>Hello " . $this->session->get('authenticated')['username'].".... App is under development :P</h1>" ;
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
          'date' => date('d-m-Y'), 
          'active' => 1
          ));
        if ($mail->save()) {
          $num = $mail->id_mail;
          $str = $this->request->getPost('adress');
          $adresses = explode(",",$str);
          for ($i=0; $i < count($adresses);$i++) { 
           $adresse = new Adressee();
           if (filter_var($adresses[$i], FILTER_VALIDATE_EMAIL)) {
            $adresse->assign(array(
              'adresse' => $adresses[$i],
              'id_mail' => $num,
              'active' => 1
              ));
            if ($adresse->save()) {
            }
          }else {echo"<script>alert('La dirección de correo:  ($adresses[$i]) es incorrecta por lo cual no se agregara a los destinatarios del email que desea enviar, solo los correctos.')</script>";
        } 
      }
      return $this->dispatcher->forward(array(
        'controller' => 'dashboard',
        'action' => 'index'));

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
      $stackCount = $this->request->getPost('stack');
      //Create my response JSON_array
      $JSON = array();
      //Temporal array
      $mytemp = array();
      //Execute a select
      $allmails = Mail::find();
      //Set my loop counter
      $loopCounter = --$stackCount;
      //It's the final mails... Turururuuu... turututu..
      for ($i=$stackCount; $i >= 0; $i--) {
        //Was sent?
        if ($allmails[$loopCounter]->state=="sent") {
          $mytemp = $allmails[$loopCounter];
          array_push($JSON, $mytemp);
          //Ask if exist 10 mails in the stack
          if(count($JSON)==10){
            break;
          }
        }
        --$loopCounter;
      }
    //Run and Push a custom response
      $this->response->setJsonContent(array('mails'=>$JSON, 'finalLoop'=>++$loopCounter));
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
//------------------------------------------------------------------------Edge--
}


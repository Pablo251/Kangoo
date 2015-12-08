<?php
use Phalcon\Mvc\Controller;
use Phalcon\Validation\Validator\Email;
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
// create a new mail
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
  /**
  * This get an array to adresses for a respective
  * @return JSON array: addresses
  */
  public function getAdAction(){
    //Disable the view
    $this->view->disable();
    if ($this->request->isPost()) {
      if ($this->request->isAjax()) {
        $JSON = array();
        $mytemp = array();
        $mailTarget = $this->request->getPost('id_mail');
        //Find the correct email
        $adress = Adressee::find("id_mail = $mailTarget");
        $counter = -1;
        for ($j=1; $j <= count($adress); $j++) {
          $mytemp = $adress[++$counter];
          array_push($JSON, $mytemp);
        }
        $this->response->setJsonContent($JSON);
        $this->response->setStatusCode(200, "OK");
        $this->response->send();
      }else {
        $this->response->setStatusCode(404, "Not Found");
      }
    }
  }
  /**
  * This save the changes in adressee and mail
  */
  public function saveChangesMailAdressAction(){
    //Disable the view
    $this->view->disable();
    if ($this->request->isPost()) {
      if ($this->request->isAjax()) {
        //Mail
        $mailId = $this->request->getPost('id_mail');
        $mailSubject = $this->request->getPost('subject');
        $mailContent = $this->request->getPost('content');
        //Adressee
        $adressId = $this->request->getPost('id_adresse');
        $adress = $this->request->getPost('adress');
        //Update Email
        $selectEmail = Mail::findFirst("id_mail = $mailId");
        //assign new values
        $selectEmail->subject = $mailSubject;
        $selectEmail->content = $mailContent;
        if ($selectEmail->save()) {
          //Convert to array
          $adressId = explode(',', $adressId);
          $adress = explode(',', $adress);
          //Update the adressee
          for ($i=0; $i < count($adressId) ; $i++) {
            $selectAdressee = Adressee::findFirst("id_adresse = $adressId[$i]");
            //assign
            $selectAdressee->adresse = $adress[$i];
            $selectAdressee->save();
          }
          $this->response->setJsonContent('done');
        }else{
          $this->response->setJsonContent('fail');
        }
        $this->response->setStatusCode(200, "OK");
        $this->response->send();
      }else {
        $this->response->setStatusCode(404, "Not Found");
      }
    }
  }

  /**
  * Set a mail state
  */
  public function setStateAction(){
    //Disable the view
    $this->view->disable();
    if ($this->request->isPost()) {
      if ($this->request->isAjax()) {
        //Mail
        $mailId = $this->request->getPost('id_mail');
        $mailSate = $this->request->getPost('action');
        //Update Email
        $selectEmail = Mail::findFirst("id_mail = $mailId");
        //assign new values
        $selectEmail->state = $mailSate;
        if ($selectEmail->save()) {
          $this->response->setJsonContent($mailSate);
        }else{
          $this->response->setJsonContent('fail');
        }
        $this->response->setStatusCode(200, "OK");
        $this->response->send();
      }else {
        $this->response->setStatusCode(404, "Not Found");
      }
    }
  }
//------------------------------------------------------------------------Edge--
}

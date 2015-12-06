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
    //echo "<h1>Hello " . $this->session->get('authenticated')['username'].".... App is under development :P</h1>" ;
  }

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
      //Create my response JSON_array
      $JSON = array();
      //Temporal array
      $mytemp = array();
      //Execute a select
      $allmails = User::find();
      //Set my loop counter
      $loopCounter = --$stackCount;
      //count the laps
      $lapsCounter = 0;
      //It's the final mails... Turururuuu... turututu..
      for ($i=$stackCount; $i >= 0; $i--) {
        //Was sent?
        if ($allmails[$loopCounter]->username=="Pablo") {
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
        $allmails = User::find();
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

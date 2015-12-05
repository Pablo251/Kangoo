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
      //take the info
      $startIn = $this->request->getPost('start');
      $endTo = $this->request->getPost('end');
      //Create my response JSON_array
      $JSON = array();
      //Temporal array
      $mytemp = array();
      //Execute a select
      $acounts = User::find(
      array(
        "offset" => $startIn,
        "limit" => $endTo
      )
    );
    //Run and Push a custom response
    foreach ($acounts as $value) {
      $mytemp = array('username' => $value->username);
      array_push($JSON, $mytemp);
    }
    $this->response->setJsonContent(array('res' => $JSON));
    $this->response->setStatusCode(200, "OK");
    $this->response->send();
    }
  }
//------------------------------------------------------------------------Edge--
}

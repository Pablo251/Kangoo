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
  public function indexAction(){
    //echo "<h1>Hello " . $this->session->get('authenticated')['username'].".... App is under development :P</h1>" ;
    if ($this->request->isPost()) {
      if ($this->request->isAjax()) {
        $id = $this->request->getPost("id");
        $this->response->setJsonContent(array('res' => array("email" => $id, "password" => "pass")));
        $this->response->setStatusCode(200, "OK");
        $this->response->send();
      }
    }
  }
}

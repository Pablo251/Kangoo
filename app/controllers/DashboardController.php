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
    echo "<h1>Hello " . $this->session->get('authenticated')['username'].".... App is under development :P</h1>" ;
  }
}

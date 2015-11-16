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
    //var_dump($this->session->get('authenticated'));
    //var_dump($this->session->get('authenticated'));
    echo "Hola " . $this->session->get('authenticated')['username'] ;
  }
}

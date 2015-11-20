<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

class ControllerBase extends Controller
{
  /**
  * Init method
  */
  protected function initialize(){
    // Prepend the application name to the title
    $this->tag->prependTitle('Kangoo ');
  }

  /**
  * @param Dispatcher $dispatcher
  */
  public function beforeExecuteRoute(Dispatcher $dispatcher){
    $controllerName = $dispatcher->getControllerName();
    //si es una petición get
    // This confirm a private zone
    if ($this->acl->isPrivate($controllerName)) {
      if (!is_null($this->auth->getAccess())) {
      }
      else {
        //Display a error by a flash component
        $this->flash->notice('Upss! Access denied, Please Registry first or Login into Kangoo');
        //Execute the dispatcher to move above the user
        $dispatcher->forward(array(
          'controller' => 'index',
          'action'     => 'index'
        ));
        return false;
      }
    }

  }
}

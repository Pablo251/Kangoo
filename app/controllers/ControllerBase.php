<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

class ControllerBase extends Controller
{
  protected function initialize(){
    // Prepend the application name to the title
    $this->tag->prependTitle('Kangoo ');
    //$this->view->setTemplateBefore('public');
  }
  /**
  * @param Dispatcher $dispatcher
  */
  public function beforeExecuteRoute(Dispatcher $dispatcher){
    $controllerName = $dispatcher->getControllerName();
    //var_dump($this->router);
    // This confirm a private zone
    if ($this->acl->isPrivate($controllerName)) {
      if (!is_null($this->auth->getAccess())) {
        echo "no es nulo";
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

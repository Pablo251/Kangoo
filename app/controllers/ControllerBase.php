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
    $actionName = $dispatcher->getActionName();
    // This confirm a private zone
    //check for a closed controller and Action is exist a current session
    if ($this->acl->isClosed($controllerName, $actionName)) {
      if (!is_null($this->auth->getAccess())) {
        //This redirect to another Controller/Action
        $this->response->redirect('dashboard');
        // Disable the view to avoid rendering
        $this->view->disable();
      }
      return true;
    }
    if ($this->acl->isPrivate($controllerName)) {
      if (!is_null($this->auth->getAccess())) {
        echo "Logeado";
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
    // ---
  }
}

<?php
//use Phalcon\Acl;
//use Phalcon\Mvc\User\Component;
use Phalcon\Mvc\User\Component;
use Phalcon\Acl\Adapter\Memory as AclMemory;
// use Phalcon\Acl\Role as AclRole;
// use Phalcon\Acl\Resource as AclResource;
/**
 *
 */
class Acl extends Component
{
  /**
   * The ACL Object
   *
   * @var \Phalcon\Acl\Adapter\Memory
   */
  private $acl;

  /**
  * This define the private controllers and their actions too... For that need authentication
  * [Array]
  */
  private $privateResources = array(
     'dashboard' => array(
       'index',
       'edit',
       'delete',
       'sent',
       'output'
     )
  );

  /**
  * If exist a session (User Logged) this disabled a signup and login before close
  * the existent user session
  */
  private $closedResources = array(
    'session' => array(
      'index',
      'login',
      'signup'
     )
  );

  /**
  * Allow accees to the acl
  */
  public function getAcl(){

  }

  /**
  * Determines if a sent controllers is private or not, finding the key.
  * @param 1: controller name
  * @return boolean {true, if is private: false if not}
  */
  public function isPrivate($controllerName){
    $controllerName = strtolower($controllerName);
    return array_key_exists($controllerName, $this->privateResources);
  }

  /**
  *
  */
  public function isClosed($controllerName, $actionName){
    $controllerName = strtolower($controllerName);
    $actionName     = strtolower($actionName);
    if (array_key_exists($controllerName, $this->closedResources)) {
        return in_array($actionName, $this->closedResources[$controllerName]);
    }
    return false;
    //return array_key_exists($controllerName, $this->closedResources);
  }
}

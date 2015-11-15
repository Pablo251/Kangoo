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
}

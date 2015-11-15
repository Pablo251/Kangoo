<?php
use Phalcon\Mvc\User\Component;
/**
 * Authentication Class, check and asign access
 */
class Auth extends Component
{
  /**
  * Try to find an authenticated session
  */
  public function getAccess(){
    return $this->session->get('authenticated');
  }
}

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

  /**
  *
  * Create a user session into the application, that allow acces to the private
  * controllers and actions.
  * @param User Object: Contains all information by selected user
  */
  public function setAccess($user){
    $this->session->set('authenticated', array(
        'id'       => $user->id_user,
        'username' => $user->username,
        'email'    => $user->email,
        'profile'  => $user
    ));
  }
}

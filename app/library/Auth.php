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

  /**
  * try to find de correct remenber me info...
  * @param username String: Username sent by ajaxPost
  * @param token String: token sent by ajaxPost
  * @return true: success remember; false: incorrect info!;
  */
  public function appRemember($username, $token){
    try {
      $user = User::findFirst(array(
        "username = :username: and token = :token: AND active = 1",
        'bind' => array(
          'username' => strtolower($username),
          'token'    => $token
        ))
      );
      if ($user!=null) {
        $this->setAccess($user);
        return true;
      }else {
        return false;
      }
    } catch (Exception $e) {
    }
    return false;
  }

  public function remove(){
    $this->session->remove('authenticated');
  }
  public function bridge($user){
    echo "Booo " . $user;
  }
  /**
   * Sends e-mails via gmail based on predefined templates
   *
   * @param array $to
   * @param string $subject
   * @param string $name
   * @param array $params
   */
  public function send($to, $subject, $content)
  {
    //Settings
    $mailSettings = $this->config->mail;

    //$template = $this->getTemplate($name, $params);

    // Create the message
    $message = Swift_Message::newInstance()
        ->setSubject($subject)
        ->setTo($to)
        ->setFrom(array(
          $mailSettings->fromEmail => $mailSettings->fromName
        ))
        ->setBody($content);
        if (!$this->_transport) {
        $this->_transport = Swift_SmtpTransport::newInstance(
          $mailSettings->smtp->server,
          $mailSettings->smtp->port,
          $mailSettings->smtp->security
        )
            ->setUsername($mailSettings->smtp->username)
            ->setPassword($mailSettings->smtp->password);
        }

        // Create the Mailer using your created Transport
      $mailer = Swift_Mailer::newInstance($this->_transport);

      return $mailer->send($message);
  }
}

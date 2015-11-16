<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Confirmation;
// use Phalcon\Mvc\Model\Message as Message;
// use Phalcon\Mvc\Model\MessageInterface;
/**
* This is a login form, that allow the users can acces to they accounts
*/
class LoginForm extends Form
{
  public function initialize($entity = null, $options = null){
    // Username
    $username = new Text('username', array(
      'placeholder' => 'Username'
    ));

    $username->addValidators(array(
      new PresenceOf(array(
        'message' => 'The username is required'
      ))
    ));

    $this->add($username);

    // Password
    $password = new Password('password', array(
      'placeholder' => 'Password'
    ));

    $password->addValidator(new PresenceOf(array(
      'message' => 'The password is required'
    )));

    $password->clear();

    $this->add($password);

    $this->add(new Submit('Continue', array(
      'class' => 'btn btn-success'
    )));
  }
  /**
  * Prints messages for a specific element
  */
  public function messages($name)
  {
    if ($this->hasMessagesFor($name)) {
      foreach ($this->getMessagesFor($name) as $message) {
        $this->flash->error($message);
      }
    }
  }

  /**
  *  Adding errors after the controller post
  * @param String $name: Name of field.
  * @param String $message: Custom message.
  */
  public function addFormMessages($name, $message){
    $messages = $this->getMessagesFor($name);
    $messages->appendMessage(new  \Phalcon\Validation\Message($message));
  }

}

<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Textarea;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;

class NewMailForm extends Form
{
  /*
  * This form create an necesary elements an to set the new user info and
  * validate it
  */
  public function initialize($entity = null, $options = null)
  {
    // Subject, added a placeholder and content
    $subject = new Textarea('subject', array(
      'placeholder' => 'Type your subject',
      'style' => 'margin: 0px; height: 287px;'
      ));
    $this->add($subject);
    $subject->addValidators(array(
      new PresenceOf(array(
        'message' => 'The subject is required'
        ))
      ));

    $adress = new Textarea('adress', array(
      'placeholder' => 'Type your adress',
      'style' => 'margin: 0px; height: 30%;'
      ));
    $this->add($adress);
    $adress->addValidators(array(
      new PresenceOf(array(
        'message' => 'The adress is required'
        ))
      ));

// Content, added a placeholder and content
    $content = new Textarea('content', array(
      'placeholder' => 'Type your content',
      'style' => 'margin: 0px; height: 452px;'
      ));
    $this->add($content);
    // Button
    $this->add(new Submit('Send', array(
      'class' => 'btn btn-success  blue lighten-3 btn',
      'style' => 'margin: 1%; margin-left: 38%;'
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
}

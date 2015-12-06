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
    $subject = new Text('subject', array(
      'placeholder' => 'Type your subject'
      ));
    $subject->setLabel('subject');
    $subject->addValidators(array(
      new PresenceOf(array(
        'message' => 'The subject is required'
        ))
      ));

    $adress = new Text('adress', array(
      'placeholder' => 'Type your adress'
      ));
    $adress->setLabel('adress');
    $adress->addValidators(array(
      new PresenceOf(array(
        'message' => 'The adress is required'
        ))
      ));

// Content, added a placeholder and content
    $content = new Textarea('content', array(
      'placeholder' => 'Type your content'
      ));
    $content->setLabel('content');

    $this->add($subject);
    // Button
    $this->add(new Submit('Create Mail', array(
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
}

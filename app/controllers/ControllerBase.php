<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
  protected function initialize(){
    // Prepend the application name to the title
    $this->tag->prependTitle('Kangoo ');
    //$this->view->setTemplateBefore('public');
  }
}

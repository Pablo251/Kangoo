<?php

class IndexController extends ControllerBase
{
    /*Initialize the controller class*/
    public function initialize(){
      //Set a title in the index file of view
      $this->tag->setTitle("Welcome to Kangoo");
      //parent::initialize();
    }

    public function indexAction()
    {

    }

}

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
  public function principalAction()
  {
    $myForm = new SignUpForm();
    if ($this->request->isPost()) {
      if ($myForm->isValid($this->request->getPost()) != false) { //->isValid($this->request->getPost()) != false
        echo "<h1>Under develop... Confirmation coming soon</h1>";
      }
     }
    $this->view->form = $myForm;
  }
}

<?php
use Phalcon\Mvc\Controller;
class IndexController extends ControllerBase
{
  /*Initialize the controller class*/
  public function initialize(){
    //Set a title in the index file of view
    $this->tag->setTitle("Welcome to Kangoo");
  }
  public function indexAction()
  {
    if ($this->request->isPost()) {
      if ($this->request->isAjax()) {
        $id = $this->request->getPost("id");
        $this->response->setJsonContent(array('res' => array("email" => $id, "password" => "pass")));
        $this->response->setStatusCode(200, "OK");
        $this->response->send();
      }
    }
  }
  //My sandbox tester :D
  private $arrayName = array('dashboard' => array('hola' ,'adios' ));
  public function monyAction()
  {
    //print_r($this->acl);
    //  $prueba = array_key_exists('oard', $this->arrayName);
    //  if ($prueba==false) {
    //    echo "Si está";
    //  }else{
    //    echo "no ta :3";
    //  }
    var_dump($this->session->get('auth-identity'));
  }
  public function errorsAction(){

  }
  public function ajaxAction()
  {
    //deshabilitamos la vista para peticiones ajax
    $this->view->disable();

    //si es una petición get
    if($this->request->isGet() == true)
    {
      //si es una petición ajax
      if($this->request->isAjax() == true)
      {
        $this->response->setJsonContent(array('res' => array("Hola")));
        $this->response->setStatusCode(200, "OK");
        $this->response->send();
      }
    }
    else
    {
      $this->response->setStatusCode(404, "Not Found");
    }
  }
  public function principalAction()
  {

  }
  //***----------------------------------------------------------------------***//
}

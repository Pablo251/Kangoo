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
  /**
  * This is a ajax GET execution..
  */
  public function logAction()
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
  /**
  * Ajax POST execution
  * @return Boolean: true: successfully remenber, false: not is incide
  */
  public function logPostAction()
  {
    //Disable
    $this->view->disable();
    //Is Post!
    if($this->request->isPost())
    {
      //Important! If is a Ajax Petition
      if($this->request->isAjax())
      {
        //Return Manipulation
        $caja1 = $this->request->getPost("valorCaja1");
        $caja1 = $this->request->getPost("valorCaja2");

        $this->response->setJsonContent(array('res' => array("email" => $caja1, "password" => $caja1)));
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

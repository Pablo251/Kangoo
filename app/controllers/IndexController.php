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
        $this->response->setRawHeader("HTTP/1.1 200 OK");
        //Check for an existent session
        if (is_null($this->auth->getAccess())) {
          //Check for successful authentication
          if ($this->auth->appRemember($this->request->getPost('username'),$this->request->getPost('token'))) {
            $this->response->setJsonContent(array('res' => "successful"));
          }else {
            $this->response->setJsonContent(array('res' => "fail_session"));
          }
        }else {
          $this->response->setJsonContent(array('res' =>"exist_session"));
        }
        //Return Manipulation
        //$caja1 = $this->request->getPost('token');
        //$caja1 = $this->request->getPost("valorCaja2");

        //$this->response->setJsonContent(array('res' => array("email" => $caja1, "password" => "")));
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
    $username = "pablo251";
    $token = "ly4b35jvokj7cik9541ug6weqgjsjor";
    $user = User::findFirst(array(
      "username = :username: and token = :token: AND active = 1",
      'bind' => array(
        'username' => strtolower($username),
        'token'    => $token
      ))
    );
    //var_dump($user);
    if ($user==null) {
    echo "Como tal";
    }
    print_r($user);
  }
  //***----------------------------------------------------------------------***//
}

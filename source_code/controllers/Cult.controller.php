<?php

include_once("connection.php");
include_once("models/Cult.class.php");
include_once("views/Cult.view.php");

class CultController{
    private $cult;

    function __construct(){
    $this->cult = new Cult(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
  }

  public function index() {
    $this->cult->open();
    $this->cult->getCult();
    
    $data = array(
        'cults' => array(),
      );

    while($row = $this->cult->getResult()){
      array_push($data['cults'], $row);
    }

    $this->cult->close();

    $view = new CultView();
    $view->render($data);
  }

  
  function add($data){
    $this->cult->open();
    $this->cult->add($data);
    $this->cult->close();
    
    header("location:cult.php");
  }

  function edit($data){
    $this->cult->open();
    $this->cult->edit($data);
    $this->cult->close();
    
    header("location:cult.php");
  }

  function delete($id){
    $this->cult->open();
    $this->cult->delete($id);
    $this->cult->close();
    
    header("location:cult.php");
  }

  function createForm(){
    $view = new CultView();
    $view->createForm();
  }

  function editForm($id){
    $cult = null;

    $this->cult->open();
    $this->cult->getCultById($id);
    $cult = $this->cult->getResult();

    $this->cult->close();

    $view = new CultView();
    $view->editForm($cult);
  }
}
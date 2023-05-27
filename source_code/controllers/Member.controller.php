<?php

include_once("connection.php");
include_once("models/Member.class.php");
include_once("models/Cult.class.php");
include_once("views/Member.view.php");

class MemberController{
    private $member;
    private $cult;

    function __construct(){
    $this->member = new Member(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    $this->cult = new Cult(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
  }

  public function index() {
    $this->member->open();
    $this->member->getMemberJoin();
    
    $data = array(
        'members' => array(),
        'cult' => array()
      );

    while($row = $this->member->getResult()){
      array_push($data['members'], $row);
    //   echo "<script>alert('{$row['name']}') </script>";
    }

    $this->member->close();

    $view = new MemberView();
    $view->render($data);
  }

  
  function add($data){
    $this->member->open();
    $this->member->add($data);
    $this->member->close();
    
    header("location:index.php");
  }

  function edit($data){
    $this->member->open();
    $this->member->edit($data);
    $this->member->close();
    
    header("location:index.php");
  }

  function delete($id){
    $this->member->open();
    $this->member->delete($id);
    $this->member->close();
    
    header("location:index.php");
  }

  function createForm(){
    $cults = array();

    $this->cult->open();
    $this->cult->getCult();
    while($row = $this->cult->getResult()){
        array_push($cults, $row);
    }
    $this->cult->close();

    $view = new memberView();
    $view->createForm($cults);
  }

  function editForm($id){
    $data = array(
      'member' => null,
      'cults' => array()
    );

    $this->member->open();
    $this->member->getMemberById($id);
    $data['member'] = $this->member->getResult();

    $this->cult->open();
    $this->cult->getCult();

    while($row = $this->cult->getResult()){
        array_push($data['cults'], $row);
    }
    $this->member->close();
    $this->cult->close();

    $view = new memberView();
    $view->editForm($data);
  }
}
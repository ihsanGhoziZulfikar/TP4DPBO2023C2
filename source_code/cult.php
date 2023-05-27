<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Cult.controller.php");

$cult = new CultController();

if (isset($_POST['add'])) {
    $cult->add($_POST);
} else if(isset($_POST['edit'])){
    $cult->edit($_POST);
}  else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $cult->delete($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $cult->editForm($id);
}else if (!empty($_GET['create'])){
    $cult->createForm();
} else{
    $cult->index();
}
?>
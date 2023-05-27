<?php
//Saya Ihsan Ghozi Zulfikar NIM 2103303 mengerjakan soal TP4
//dalam mata kuliah DPBO untuk keberkahanNya maka
//saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");

$member = new MemberController();

if (isset($_POST['add'])) {
    $member->add($_POST);
} else if(isset($_POST['edit'])){
    $member->edit($_POST);
}  else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $member->delete($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $member->editForm($id);
}else if (!empty($_GET['create'])){
    $member->createForm();
} else{
    $member->index();
}
?>
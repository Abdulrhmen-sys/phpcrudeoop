<?php
include_once '../../database/model.php';
$del= new student();
$id =$_GET['id'];
$del->delete($id);

if($del){
    header("location:home.php");
}
   ?>



<?php
require_once('pdo.php');
session_start();
//First Check if Two Password match
  if(isset($_POST['submit'])&&isset($_POST['password1']) &&isset($_POST['password1'])&&isset($_SESSION['userData'])){
    $data=$_SESSION['userData'];
    if($_POST['password1']==$_POST['password2']){

      //Second insert data in database

      $stmt=$db->prepare("insert into user (oauth_uid,password,username) values(:id,:password,:username)" );
      $stmt->execute(array(
        ":id"=>$data->id,
        ":password"=>$_POST['password1'],
        ":username"=>$data->login
      ));
      if($stmt->rowcount()>0){
        $_SESSION['success']="Password recorded correctly";
        // Go To index with user user name
        header("location:index.php?name".$data->login);
        return;
      }
      else{
      $_SESSION['error']="ERROR ";
      header("location:confirm_password.php");
      return;
     }
    }
    //In case password not match ask for it again
    else{
      $_SESSION['error']="Password Not Match Please enter password again";
      header('location:confirm_password.php');
      return;
    }
  }
 ?>

<?php
//... THIS FILE TO ACCESS API WITH USER'S ACCESS TOKEN
session_start();
require_once("pdo.php");

  function error($msg)
  {
    $response=[];
    $response['success']=false;
    $response['message']=$msg;
    return json_encode($response);
  }

$accessToken=$_SESSION['my_access_token_accessToken'];

if($accessToken==""){
  die(error("Error : Invalid access token"));
}

$url="https://api.github.com/user";
$authHeader="Authorization: token ".$accessToken;
$userAgentHeader="User-Agent: task5";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept: application/json',$authHeader,$userAgentHeader));
$response = curl_exec($ch);
curl_close ($ch);
$data=json_decode($response);
//-----------------------------HERE TO SEARCH IF USERNAME ALREADY IN MY DATABASE OR NOT?------//
$sql = "select * from user where username=:name";
$stmt=$db->prepare($sql);
$stmt->execute(array(
  'name'=>$data->login
));
$count = $stmt->rowCount();
//------------------------------IF FOUND GO TO SECOND PAGE------//
if($count>0){
  $_SESSION["email"]=$data->login;
  header('location:second page.php');
  return;
}
//-----------------------------ELSE TAKE PASSWORD FROM USER------//
  else{
    $_SESSION['userData']=$data;
    header('location:confirm_password.php');
    return;

   }
 ?>

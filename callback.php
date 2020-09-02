
<?php
//......................THIS FILE WHEN GITHUB REDIRECTED TO MY WEBSITE ....//
$code=$_GET['code'];
if($code==""){
  header('location:index.php');
  exit;
}
$client_id="d23881a17b8e9c5e4c1a";
$client_secret="7c7faaf844b332b9b4517a3afdd3197317d9b73c";
$url="https://github.com/login/oauth/access_token";

$postParams=[
  'client_id'=>$client_id,
  'client_secret'=>$client_secret,
  'code'=>$code
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$postParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept: application/json'));
$response = curl_exec($ch);
curl_close ($ch);
$data=json_decode($response);
var_dump($data);

if($data->access_token!=""){
session_start();
$_SESSION['my_access_token_accessToken']=$data->access_token;
header('location:user.php');
return;
}
echo $data->error_description;
 ?>

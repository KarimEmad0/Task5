<?php
session_start();
require_once('pdo.php');

//Check For Email AND password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if(isset($_POST['email'])&&isset($_POST['password']) )
  {
    $email=test_input($_POST['email']);
    $password=test_input($_POST['password']);

    if(strlen($_POST['email'])<1||strlen($_POST['password'])<1)
    {
      $_SESSION['error']="Email and password are required";
      header("location:index.php");
      return;
    }
    //Checek in Database
    $sql = "select * from user where username=:email AND password=:password";
    $stmt=$db->prepare($sql);
    $stmt->execute(array(
      'email'=>$_POST['email'],
      'password'=>$_POST['password']
    ));

    $count = $stmt->rowCount();

    //If found in database
    if($count>0){
      $_SESSION["email"]=$_POST["email"];
      header('location:second page.php');
      return;
    }
      else{ //IF NOT found
        $_SESSION["error"]="Email or password are incorrect";
        header('location:index.php');
       }
}
}

// function to clear input
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

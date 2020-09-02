<?php
 session_start();
 ?>

<html>
<head>
<title>Second page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
</head>

<body>

<div class="topnav">
  <a  href="logout.php"> LOGOUT </a>
</div>


    <div class="login-box">
    <div class="row">
    <div class="col-md-10 login-left">
      <?php
      if (isset($_SESSION['register_success'])) {
          echo('<p style="color: green;">' . htmlentities($_SESSION['register_success']) . "</p>\n");
          unset($_SESSION['register_success']);
      }
       ?>
                <h1>Welcome <?php echo $_SESSION['email'];?></h1>

          </div>
      </div>

</div>


</body>
</html>

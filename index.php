<?php
  session_start();
  //first check access token
$accessToken="";
  if(isset($_SESSION['my_access_token_accessToken'])){
  $accessToken=$_SESSION['my_access_token_accessToken'];
  }
$name="";
  if(isset($_GET['name'])){
    $name=$_GET['name'];
  }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>User Log in using github</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
</head>
<body>
		<div class="container">
  	<div class="login-box">
			<div class="row">
				<div class="col-md-8 login-left">
					<h1>Login</h1>
						<form action="login.php"  method="post">
							<div class="form-group">
                <?php
                //FLASH MESSAGE
                if (isset($_SESSION['success'])) {
              			 echo('<p style="color: red;">' . htmlentities($_SESSION['success']) . "</p>\n");
              			 unset($_SESSION['success']);
              	 }
                else if (isset($_SESSION['error'])) {
                     echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
                     unset($_SESSION['error']);
                 }
                  ?>
					<label for="email"><b>User name</b></label>
					<input class="form-control" id="email"  type="text" name="email" value="<?php echo $name;?>"   >
				</div>
				<div class="form-group">
					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password">
				</div>
					<input class="btn btn-primary" type="submit" id="register" name="create" value="Sign In">
		    </form>

        <form action="https://github.com/login/oauth/authorize" method="get" >
        </br>
            <input class="btn btn-secondary" type="submit" value="Register with Github" >
            <input type="hidden" name="client_id" value="d23881a17b8e9c5e4c1a">
        </form>
				</div>

		</div>
		</div>
</body>
</html>

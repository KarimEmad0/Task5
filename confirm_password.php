<?php
  session_start();
$accessToken="";
  if(isset($_SESSION['my_access_token_accessToken'])){
  $accessToken=$_SESSION['my_access_token_accessToken'];
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
					<h1> Password</h1>
						<form action="process_password.php"  method="post">
							<div class="form-group">
					<label for="pass"><b>New Password</b></label>
					<input class="form-control" id="email"  type="password" name="password1"   >
				</div>
				<div class="form-group">
					<label for="password"><b>Confirm Password</b></label>
					<input class="form-control" id="password"  type="password" name="password2">
				</div>
        <?php
        if (isset($_SESSION['error'])) {
      			 echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
      			 unset($_SESSION['error']);
      	 }
         ?>
					<input class="btn btn-primary" type="submit" id="register" name="submit" value="Confirm">
		    </form>
				</div>

		</div>
		</div>


</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body class="sign_background">
	<div align="left">
	<nav>
		<a href="index.php">Home</a>
		<a href="register.php">Regist</a>
		<a href="login.php" class="active">Login</a>
		<a href="About_Us.php">About Us</a>
	</nav>
	</div>

	<div align="center">
		<div class="signup_div">
			<form action="login_api.php" method="post">
			<h1 align="center">Sign In Using Your Email</h1>
			<input class="input_c" type="email" name="email" placeholder="Enter email">
			<input class="input_c" type="password" name="password" placeholder="Enter password"><br><br>
			<a href="reset_password.php">Forget Password ????</a>
			<p>You don't have an account?? <a href="register.php">Create One</a></p>
			<input type="submit" class="signup_btn" value="Sign In">
			</form>
		</div>
	</div>
	<?php
                if(isset($_GET['msg']) && !empty($_GET['msg'])){
                  if ($_GET['msg'] == 'created') echo '<script>alert("Great Account Was Created Successfully")</script>';
				  elseif ($_GET['msg'] == 'error') echo '<script>alert("Email Or Password Is Wrong")</script>';
				  elseif ($_GET['msg'] == 'empty') echo '<script>alert("You have to enter email and password")</script>';
				  elseif ($_GET['msg'] == 'good') echo '<script>alert("Nice !!! Your new password was sent to your email")</script>';
              
                }
            ?>
</body>
</html>
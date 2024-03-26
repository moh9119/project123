<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reset Password</title>
	<link rel="stylesheet" href="style.css">
</head>
<body class="sign_background">
	<div align="left">
	<nav>
		<a href="login.php">Back</a>
			
	</nav>
	</div>

	<div align="center">
		<div class="signup_div">
			<form action="reset_password_api.php" method="post">
			<h1 align="center">Enter Your Recovery Email</h1>
			<input class="input_c" type="email" name="email" placeholder="Enter your email"><br><br>
			<input type="submit" class="signup_btn" value="Send New Password">
			</form>
		</div>
	</div>
	<?php
                if(isset($_GET['msg']) && !empty($_GET['msg'])){
                  if ($_GET['msg'] == 'error') echo '<script>alert("Sorry You had enterd invalid email")</script>';
              
                }
            ?>
</body>
</html>
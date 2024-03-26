<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" href="style.css">
	<style>

		#admin{
			display: none;
		}
		#user{
			display: none;
		}
		#coordinator{
			display: none;
		}
	</style>
</head>
<body class="sign_background">
	<div align="left">
	<nav>
		<a href="index.php">Home</a>
		<a href="register.php" class="active">Regist</a>
		<a href="login.php">Login</a>
		<a href="About_Us.php">About Us</a>	
	</nav>
	</div>

	<div align="center">
		<div class="signup_div">
			<h1 align="center">Sign Up Using Your Info</h1>
			<form action="register_api.php" method="post" name="add" onsubmit="return validateForm()">
            <input class="input_c" type="text" name="fname" placeholder="Enter First Name" required>
            <input class="input_c" type="text" name="lname" placeholder="Enter Last Name" required>
			<input class="input_c" type="email" name="email" placeholder="Enter Email" required>
            <input class="input_c" type="password" name="password" placeholder="Enter Passsword" required>
			<select class="input_c_select" name="gender" value="Select Gender" required>
                <option value="male" selected>Male</option>
                <option value="female">Female</option>
            </select>
            <input class="input_c" type="text" name="age" placeholder="Enter Your Age" required>
			<input class="input_c" value="" type="number" name="phone" placeholder="Enter Phone Number" required>
            <select class="input_c_select" name="city" value="Select Gender" required>
                <option value="Najran" selected>Najran</option>
				<option value="Al Riadh">Al Riadh</option>
                <option value="Makkah">Makkah</option>
                <option value="Jazan">Jazan</option>
                <option value="Jeddah">Jeddah</option>
                <option value="Al Baha">Al Baha</option>
            </select>

			<p>You  have an account?? <a href="login.php">Sign In</a></p>
			<input type="submit" name="user" class="signup_btn" value="Sign Up">
			</form>
		</div>
		</div>
	<div style="color:red">
            <?php
                if(isset($_GET['msg']) && !empty($_GET['msg'])){
                  if ($_GET['msg'] == 'sorry') echo '<script>alert("Sorry this email is already exist")</script>';
              
                }
            ?>
        </div>

		<script>
					var anUpperCase = /[A-Z]/;
					var aLowerCase = /[a-z]/; 
					var aNumber = /[0-9]/;
					var aSpecial = /[!|@|#|$|%|^|&|*|(|)|-|_]/;
					var obj = {};
					obj.result = true;

					
			function validateForm(){
				let x = document.forms["add"]["phone"].value;
  				let p = document.forms["add"]["password"].value;

				var num = x.toString();

				if(num.length > 10 || num.length < 10 ){
					alert("Sorry you had Enter invaild phone Number");
  					return false;
				}
				if(p.length < 10){
						alert("Sorry Password must be more than 10 characters");
  						return false;
					}

					var numUpper = 0;
					var numLower = 0;
					var numNums = 0;
					var numSpecials = 0;
					for(var i=0; i<p.length; i++){
						if(anUpperCase.test(p[i]))
							numUpper++;
						else if(aLowerCase.test(p[i]))
							numLower++;
						else if(aNumber.test(p[i]))
							numNums++;
						else if(aSpecial.test(p[i]))
							numSpecials++;
					}

					if(numUpper == 0 || numLower == 0 || numNums == 0 || numSpecials == 0){
						alert("Sorry Password must be more complex");
  						return false;
					}
				
			}


		</script>
</body>
</html>
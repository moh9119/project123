<?php
session_start();
include ("connection.php");

$query = "SELECT * FROM accounts WHERE id = ? ";
        $stmt = $conn->prepare($query);
        $stmt->execute([$_GET['id']]);
        $count_r = $stmt->rowCount();
        $user = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manage Users</title>
	<link rel="stylesheet" href="style.css">

</head>
<body class="user_background">
	<div align="left">
	<nav>
		<a href="main.php">Home</a>
		<a href="book_event.php">Book Event</a>
        <a href="scheduled_events.php">Scheduled Events</a>
        <a href="profile.php"   class="active">Profile</a>
        <a href="logout.php">Logout</a>	
    </nav>
	</div>


	</div>
    <div align="center">
	<div  class="signup_div" >
			<h1 align="center">Edit User Information</h1>
			<form action="edit_user_in_user_api.php" method="post" name="add">
            <input class="input_c" type="hidden" name="id"  value="<?= !empty($user['id']) ? $user['id'] : '' ?>" required>
            <input class="input_c" type="hidden" name="type"  value="<?= !empty($user['type']) ? $user['type'] : '' ?>" required>
            <input class="input_c" type="text" name="fname" placeholder="Enter First Name" value="<?= !empty($user['fname']) ? $user['fname'] : '' ?>" required>
            <input class="input_c" type="text" name="lname" placeholder="Enter Last Name" value="<?= !empty($user['lname']) ? $user['lname'] : '' ?>" required>
			<input class="input_c" type="email" name="email" placeholder="Enter Email" value="<?= !empty($user['email']) ? $user['email'] : '' ?>" required>
            <input class="input_c" type="password" name="password" placeholder="Enter Passsword" value="<?= !empty($user['password']) ? $user['password'] : '' ?>" required>
			

			<br><br>
			<input type="submit" name="user" class="signup_btn" value="Update">
			</form>
		</div></div>
      <?php
                if(isset($_GET['msg']) && !empty($_GET['msg'])){
                  if ($_GET['msg'] == 'successful') echo '<script>alert("User Info Update Successfully")</script>';
                 
              
                }
            ?>
</body>
</html>
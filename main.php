<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Home</title>
	<link rel="stylesheet" href="style.css">
	<style>
.req {
  background-color: #cc9966;
  color: white;
  padding:10px 100px;
  font-size: 25px;
  border: none;
  min-width: 440px;
  border-radius: 8px;
  text-decoration: none;

}

.req:hover {
    background-color: white;
    color: #cc9966;
    cursor: pointer;
    }

</style>

</head>
<body class="user_background">
	<div>
	<nav>
		<a href="main.php"  class="active">Home</a>
        <a href="book_event.php">Book Event</a>
		<a href="scheduled_events.php">Scheduled Events</a>
        <a href="profile.php">Profile</a>
		<a href="login.php">Logout</a>
	</nav>
	
	</div>

	<br><br><br><br>
	<div align="center">
        <h1 style="color:#595959">Wellcome To Event Manager</h1>
		<br>
		<a class="req" href="book_event.php">Book Event</a>
		<br><br><br>
		<a class="req" href="scheduled_events.php">Scheduled Events</a>
		<br><br><br>
		<a class="req" href="profile.php">Profile</a>
		<br><br><br>
		<a class="req" href="Coordinator_request.php">Request To Be Coordinator</a>
	</div>
	<?php
                if(isset($_GET['msg']) && !empty($_GET['msg'])){
                  if ($_GET['msg'] == 'request') echo '<script>alert("Your Request Was Sent Successfully")</script>';
              
                }
            ?>

</body>
</html>
<?php
session_start();
   include ("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Main Coordinator</title>
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
	<div align="left">
	<nav>
		<a href="main_coordinator.php"   class="active">Home</a>
		<a href="create_event.php">Create Event</a>
        <a href="my_events.php">My Events</a>
        <a href="logout.php">Logout</a>
	</nav>
	</div>

    <div  align="center">
	<div style="width: 80%;">

        <h1 style="color : #595959">Wellcome To Event Manager</h1>
        <a class="req" href="create_event.php">Create Event</a>
        <br><br><br><br>
		    <a class="req" href="my_events.php">My Events</a>
        <br><br><br>

	</div>
    </div>
</body>
</html>
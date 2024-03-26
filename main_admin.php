<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Home</title>
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
		<a href="main_admin.php"  class="active">Home</a>
		<a href="manage_users.php">Manage Users</a>
		<a href="requests.php">Requests</a>
        <a href="logout.php">Logout</a>
	</nav>
	</div>

	<div align="center">
        <h1 style="color:#595959">Wellcome To Event Manager</h1>
        <a  class="user_btn"   href="manage_users.php"><img src="images/admin1.png" width="280" height="280"></a>
		<br><br>
		<a class="req" href="manage_users.php">Manage Users</a>
		<br><br><br><br>
		    <a class="req" href="requests.php">Requests</a>
	</div>
</body>
</html>
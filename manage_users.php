<?php
session_start();
include ("connection.php");

$query = "SELECT * FROM accounts WHERE type = 1 and statue = 0 ";
        $stmt1 = $conn->prepare($query);
        $stmt1->execute();
        $count_r = $stmt1->rowCount();
$query = "SELECT * FROM accounts WHERE type = 3 and statue = 0 ";
        $stmt2 = $conn->prepare($query);
        $stmt2->execute();
        $count_c = $stmt2->rowCount();
$query = "SELECT * FROM accounts WHERE type = 2 and statue = 0 ";
        $stmt3 = $conn->prepare($query);
        $stmt3->execute();
        $count_a = $stmt3->rowCount();
$query = "SELECT * FROM accounts";
        $stmt4 = $conn->prepare($query);
        $stmt4->execute();
        $count_s = $stmt4->rowCount();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manage Users</title>
	<link rel="stylesheet" href="style.css">
    <style type="text/css">
		#user{
			display: none;
		}
		#coordinator{
			display: none;
		}
        #admin{
			display: none;
		}
		#r_user{
			display: none;
		}
		table {
  border-collapse: collapse;
  width: 80%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #DDD;
  text-align: center;
}
th{
	font-size: 25px;
	color: #997a00;
}
td{
	color: #333333;
	font-weight: bold;
	font-size: 20px;
}

tr:hover {background-color: #D6EEEE;cursor: pointer;}
a{
	text-decoration: none;
	color: #0066cc;
}

	</style>
</head>
<body class="user_background">
	<div align="left">
	<nav>
		<a href="main_admin.php">Home</a>
		<a href="manage_users.php"  class="active">Manage Users</a>
		<a href="requests.php">Requests</a>
        <a href="logout.php">Logout</a>
			
	</nav>
	</div>

	<div id="btns" align="center">
    <br>
    <h1 style="color:#595959">Accept / Reject Sign Up Requests</h1>
    <br><br><br>
		<button onclick="ruser()" class="users_btn">Manage Registed Users</button><br><br>
        <button onclick="user()" class="users_btn">Accept Users</button>
        </div>
    <div id="user" align="center">
    <?php
if ($count_r > 0) {
	echo'
				<h1 style="color:#595959">Normal Users</h1>
					<table>
					  <tr>
					    <th>ID</th>
					    <th>Name</th>
					    <th>Email</th>
					    <th>Accept</th>
					    <th>Reject</th>

					  </tr>';
	$users = $stmt1->fetchAll();
	foreach ($users as $user) {
		echo'  <tr>
				    <td>'.$user['id'].'</td>
				    <td>'.$user['fname'].'</td>
				    <td>'.$user['email'].'</td>
				    <td><a href="approve_regist.php?id='.$user['id'].'">Approve</a></td>
				    <td><a href="reject_regist.php?id='.$user['id'].'">Reject</a></td>
  				</tr>';
	}
	echo'</table>';
}
else{
		echo'<h1 style="color:#595959">No Normal Users</h1>';
}

?>
	</div>
    
	<div id="r_user" align="center">
    <?php
if ($count_s > 0) {
	echo'
				<h1 style="color:#595959">Registed Users</h1>
					<table>
					  <tr>
					    <th>ID</th>
					    <th>Name</th>
					    <th>Email</th>
					    <th>Accept</th>
					    <th>Reject</th>

					  </tr>';
	$users = $stmt4->fetchAll();
	foreach ($users as $user) {
		echo'  <tr>
				    <td>'.$user['id'].'</td>
				    <td>'.$user['fname'].'</td>
				    <td>'.$user['email'].'</td>
				    <td><a href="edit_user.php?id='.$user['id'].'">Edit</a></td>
				    <td><a href="reject_regist.php?id='.$user['id'].'">Delete</a></td>
  				</tr>';
	}
	echo'</table>';
}
else{
		echo'<h1 style="color:#595959">No Normal Users</h1>';
}

?>
	</div>
    <script>
		function ruser(){
            document.getElementById("btns").style.display="none";
            document.getElementById("r_user").style.display="block";
        }
        function user(){
            document.getElementById("btns").style.display="none";
            document.getElementById("user").style.display="block";
        }
    </script>
      <?php
                if(isset($_GET['msg']) && !empty($_GET['msg'])){
                  if ($_GET['msg'] == 'accepted') echo '<script>alert("Nice user was accepted successfully")</script>';
                  if ($_GET['msg'] == 'rejected') echo '<script>alert(" user was rejected successfully")</script>';
              
                }
            ?>
</body>
</html>
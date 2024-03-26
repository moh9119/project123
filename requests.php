<?php
session_start();
include ("connection.php");

$query = "SELECT * FROM requests WHERE type = 1 ";
        $stmt1 = $conn->prepare($query);
        $stmt1->execute();
        $count_r = $stmt1->rowCount();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Requests</title>
	<link rel="stylesheet" href="style.css">
    <style type="text/css">
		#coordinator{
			display: none;
		}
        #admin{
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
		<a href="manage_users.php">Manage Users</a>
		<a href="requests.php"  class="active">Requests</a>
        <a href="logout.php">Logout</a>
			
	</nav>
	</div>
	<div id="btns" align="center">
    <br>
    <h1 style="color:#595959">Accept / Reject All Reuests</h1>
    <br><br><br><br>
        <button onclick="coordinator()" class="users_btn">Coordinator Requests</button>
       </div>
    
    <div id="coordinator" align="center">
    <?php
if ($count_r > 0) {
	echo'
				<h1 style="color:#595959">Coordinator Request</h1>
					<table>
					  <tr>
					    <th>ID</th>
					    <th>Name</th>
					    <th>Accept</th>
					    <th>Reject</th>

					  </tr>';
	$users = $stmt1->fetchAll();
	foreach ($users as $user) {
		echo'  <tr>
				    <td>'.$user['user_id'].'</td>
				    <td>'.$user['user_name'].'</td>
				    <td><a href="approve_coordinator.php?id='.$user['user_id'].'">Approve</a></td>
				    <td><a href="reject_coordinator.php?id='.$user['user_id'].'">Reject</a></td>
  				</tr>';
	}
	echo'</table>';
}
else{
		echo'<br><br><br><br><br><br><h1 style="color:#595959">No Coordinators Users</h1>';
}

?>
	</div>

?>
	</div>
    <script>
        function coordinator(){
            document.getElementById("btns").style.display="none";
            document.getElementById("coordinator").style.display="block";
        }
        
    </script>
      <?php
                if(isset($_GET['msg']) && !empty($_GET['msg'])){
                  if ($_GET['msg'] == 'accepted') echo '<script>alert("Request accepted successfully")</script>';
                  if ($_GET['msg'] == 'rejected') echo '<script>alert(" Request rejected successfully")</script>';
              
                }
            ?>
</body>
</html>
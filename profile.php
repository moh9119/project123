<?php
session_start();
   include ("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
    <style>
        .card {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
                width: 400px;
                border-radius: 10px;
                display: inline-block;
                margin-left: 30px;
                margin-bottom: 30px;
            }

            .card:hover {
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
                cursor: pointer;
            }

            .container {
                padding: 2px 16px;
            }
            .card img{
                border-radius: 10px;
            }
            a{
                text-decoration: none;
                font-size: 20px;
                background-color: #4d4d4d;
                padding: 1% 4%;
                color: white;
                border-radius: 10px;
            }
            a:hover{
                background: none;
                color: #4d4d4d;
            }
    </style>
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
	<br><br><br>
    <div  align="center">
	<div style="width: 80%;">
        <h1 style="color : #595959">Your Profile</h1>
        <?php
            $query = "SELECT * FROM users where id = ? ";
            $stmt = $conn->prepare($query);
            $stmt->execute([$_SESSION['id']]);
            $g = $stmt->fetch();
           
                    echo'<div class="card">
                    <img src="images/admin1.png" alt="Avatar" style="width:50%">
                    <div class="container"  align="left">
                        <p>Email Name : <b>'.$g['fname'].'</b></p> 
                        <p>Last Name : <b>'.$g['lname'].'</b></p>
                        <p>Email : <b>'.$g['email'].'</b></p>
                        <p>Phone : <b>'.$g['phone'].'</b></p>
                        <p>Age : <b>'.$g['age'].'</b></p> 
                    </div>
                    <a href="edit_user_in_user.php?id=' . $g['id'] . '">Edit</a>
                    <br><br>
                    </div>';

        ?>
	</div>
    </div>


</body>
</html>
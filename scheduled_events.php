<?php
session_start();
   include ("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Scheduled Events</title>
	<link rel="stylesheet" href="style.css">
    <style>
        .card {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
                width: 300px;
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
        <a href="scheduled_events.php"  class="active">Scheduled Events</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>	
        
        </nav>
	</div>

    <div  align="center">
	<div style="width: 80%;">
        
        <?php
            $query = "SELECT * FROM books where user_id=?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$_SESSION['id']]);
            
            if($stmt->rowCount()){
                $events = $stmt->fetchAll();
                echo'<h1 style="color : #595959">You have scheduled those Events</h1>';
            foreach($events as $g){
                $query = "SELECT * FROM books where event_id=?";
                $stmt = $conn->prepare($query);
                $stmt->execute([$g['event_id']]);
                $count = $stmt->rowCount();
                    echo'<div class="card">
                    <img src="images/event.jpg" alt="Avatar" style="width:100%">
                    <div class="container"  align="left">
                        <p>Group Name : <b>'.$g['event_name'].'</b></p> 
                        <p>City : <b>'.$g['city'].'</b></p>
                        <p>Date : <b>'.$g['date'].'</b></p>
                        <p>Start Time : <b>'.$g['s_time'].'</b></p>
                        <p>End Time : <b>'.$g['e_time'].'</b></p>
                        <p>Intrested People : <b>'.$count.'</b></p>  
                    </div>
                    <a href="chat.php?id='.$g['id'].'">Chat</a>
                    <a href="book_event.php?id=' . $g['id'] . '">Show Map</a>
                    <br><br>
                    </div>';
                  }
            }
            else{
                echo'<h1 style="color : #595959;margin-top:200px">You have not scheduled any Events</h1>';
            }
        ?>
	</div>
    </div>


</body>
</html>
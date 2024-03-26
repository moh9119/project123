<?php
session_start();
   include ("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Events</title>
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
		<a href="main_coordinator.php">Home</a>
		<a href="create_event.php">Create Event</a>
        <a href="my_events.php"  class="active">My Events</a>
        <a href="logout.php">Logout</a>
	</nav>
	</div>

    <div  align="center">
	<div style="width: 80%;">

        <?php
            $query = "SELECT * FROM events where coordinator_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$_SESSION['id']]);
            if($stmt->rowCount()>0){
                $events = $stmt->fetchAll();
                echo'<h1 style="color : #595959">Events You Had Created</h1>';
            foreach($events as $e){
                
                    echo'<div class="card">
                    <img src="images/event.jpg" alt="Avatar" style="width:100%">
                    <div class="container"  align="left">
                        <p>Event Name : <b>'.$e['name'].'</b></p> 
                        <p>Event Category : <b>'.$e['category'].'</b></p>
                        <p>City : <b>'.$e['city'].'</b></p>
                        <p>Date : <b>'.$e['date'].'</b></p> 
                        <p>Start Time : <b>'.$e['s_time'].'</b></p> 
                        <p>End Time : <b>'.$e['e_time'].'</b></p>  
                    </div>
                    <div align="center">
                    <a class="confirmation" href="delete_event.php?id='.$e['id'].'">Delete Event</a>
                    <br><br>
                    </div>
                    </div>';

            }
            }
            else{
                echo' <br><br><br><h1 style="color : #595959">You Did not  Create Any Events</h1>';
            }
            

        ?>
	</div>
    </div>
    <script>
 var elems = document.getElementsByClassName('confirmation');
            var confirmIt = function (e) {
                if (!confirm('Are you sure you want to delete this event?')) e.preventDefault();
            };
            for (var i = 0, l = elems.length; i < l; i++) {
                elems[i].addEventListener('click', confirmIt, false);
    }
</script>
  <?php
                if(isset($_GET['msg']) && !empty($_GET['msg'])){
                  if ($_GET['msg'] == 'deleted') echo '<script>alert("Event was deleted Successfully")</script>';
              
                }
            ?>

</body>
</html>
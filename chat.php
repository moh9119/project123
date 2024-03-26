<?php
session_start();
   include ("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Groups</title>
	<link rel="stylesheet" href="style.css">
    <style>
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
		<a href="scheduled_events.php" class="active">Scheduled Events</a>
        <a href="logout.php">Logout</a>	
       
	</nav>
	</div>
	<br><br><br>
    <div  align="center">
	<div style="width: 80%;">
        <h1 style="color : #595959">Chat</h1>
        <div  class="chat_div_2" >
		<?php

		    $sql = "SELECT * FROM chat where events_id = ? ";
		    $stmt = $conn ->prepare($sql);
		    $stmt->execute([$_GET['id']]);
		    
		    if($stmt->rowCount()>0){
		    	$message = $stmt->fetchAll();
			    foreach($message as $msg ){
					
					if ($msg['sender_id'] == $_SESSION['id']) {
					 	echo'<div align="left">
						<p class="p_send"><b>'.$msg['sender_name'].' : </b>'.$msg['message'].'</p></div>';
					 		} 
					else{
						echo'<div align="right">
                        <p class="p_recive"><b style="color:#cc9966">'.$msg['sender_name'].' : </b>'.$msg['message'].'</p></div>';
							}			
			     }
		     
		    }
		    else{
		    	echo'<div align="center">
						<p class="p_start_chat">Start chat</p></div>';
		    }



		 ?>	
	</div>
	<br>
	<div class="chat_send_div">
		<form action="send_message.php" method="post">
			<input type="hidden" name="id" value="<?= $_GET['id']?>" required>
			<input type="text" name="message" placeholder="Write your message...." required>
			<br><br>
			<input type="submit" name="message_btn" value="Send">
		</form>
	</div>
	</div>
    </div>


</body>
</html>
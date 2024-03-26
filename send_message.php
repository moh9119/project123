<?php
session_start();
   include ("connection.php");

	  $events_id = $_POST['id'];
      $message = $_POST['message'];

        $msg_id=0;
        $msg_content = "";

                $sql = "INSERT INTO chat (`events_id`,`sender_id`,`sender_name`,`message`) VALUES (?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$events_id,$_SESSION['id'],$_SESSION['name'],$message]);
    
    header('Location:chat.php?id='.$group_id.'');

?>
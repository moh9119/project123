<?php
session_start();
   include ("connection.php");
    
        $id = trim($_GET['id']);
        

        $query = "SELECT * FROM events where id=?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$id]);
        $event = $stmt->fetch();


        $sql = "INSERT INTO books (`event_id`,`user_id`,`event_name`,`city`,`date`,`s_time`,`e_time`) VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id,$_SESSION['id'],$event['name'],$event['city'],$event['date'],$event['s_time'],$event['e_time']]);
                $msg .= "book"; 
                header('Location: book_event.php?msg='.$msg);
    ?>
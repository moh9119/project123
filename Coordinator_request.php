<?php
session_start();
   include ("connection.php");
    
        $msg = "";

        $id = trim($_GET['id']);

      
        $sql = "INSERT INTO requests (`user_id`,`user_name`,`type`) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_SESSION['id'],$_SESSION['name'],3]);
 
                    $msg .= "request";
                    header('Location: main.php?msg='.$msg);
              
                
          
    ?>
<?php
session_start();
   include ("connection.php");
    
        $msg = "";

        $id = trim($_GET['id']);

      
                $sql = "delete from events where id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id]);
 
                    $msg .= "deleted";
                    header('Location: my_events.php?msg='.$msg);
              
                
          
    ?>
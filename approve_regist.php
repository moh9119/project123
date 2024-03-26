<?php
session_start();
   include ("connection.php");
    
        $msg = "";

        $id = trim($_GET['id']);

      
                $sql = "UPDATE accounts set statue = 1 where id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id]);
 
                    $msg .= "accepted";
                    header('Location: manage_users.php?msg='.$msg);
              
                
          
    ?>
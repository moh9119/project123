<?php
session_start();
   include ("connection.php");
    
        $msg = "";

        $id = trim($_GET['id']);

      
                $sql = "DELETE FROM accounts WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id]);

 
                    $msg .= "rejected";
                    header('Location: manage_users.php?msg='.$msg);
              
                
          
    ?>
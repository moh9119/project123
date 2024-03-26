<?php
session_start();
   include ("connection.php");
    
        $msg = "";

        $id = trim($_GET['id']);

      
                $sql = "UPDATE accounts set type = 3 where id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id]);

                $sql = "DELETE FROM requests where id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id]);
 
                    $msg .= "accepted";
                    header('Location: requests.php?msg='.$msg);
              
                
          
    ?>
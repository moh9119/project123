<?php
session_start();
   include ("connection.php");
    
        $msg = "";

        $name = trim($_POST['name']);
        $lat = trim($_POST['lat']);
        $log = trim($_POST['log']);
        $category = trim($_POST['category']);
        $city = trim($_POST['city']);
        $date = trim($_POST['date']);
        $stime = trim($_POST['s_time']);
        $etime = trim($_POST['e_time']);
      
                $sql = "INSERT INTO events (`name`,`date`,`s_time`,`e_time`,`category`,`city`,`coordinator_id`,`coordinator_name`,`lat`,`log`) VALUES (?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$name,$date,$stime,$etime,$category,$city,$_SESSION['id'],$_SESSION['name'],$lat,$log]);
 
                    $msg .= "created";
                    header('Location: create_event.php?msg='.$msg);

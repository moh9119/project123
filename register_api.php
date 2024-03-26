<?php

   include ("connection.php");
    
        $msg = "";
        $type = 1;
        if(isset($_POST['user'])){
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $city = trim($_POST['city']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $phone = trim($_POST['phone']);
        $gender = trim($_POST['gender']);
        $age = trim($_POST['age']);
            $sql = "SELECT * from accounts where email ='$email'";
            $stmt = $conn ->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()>0){
                $msg .= "sorry";
                header('Location: register.php?msg='.$msg);
            }
            else{
                $sql = "INSERT INTO accounts (`fname`,`lname`,`email`,`password`,`type`) VALUES (?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$fname,$lname,$email,$password,1]);

                $query = "SELECT * FROM accounts WHERE email = ? ";
                $stmt = $conn->prepare($query);
                $stmt->execute([$email]);
                $user = $stmt->fetch();
                

                $sql = "INSERT INTO users (`id`,`fname`,`lname`,`email`,`password`,`phone`,`age`,`gender`,`city`) VALUES (?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                if($stmt->execute([$user['id'],$fname,$lname,$email,$password,$phone,$age,$gender,$city]))
                {   
                    $msg .= "created";
                    header('Location: login.php?msg='.$msg);
                }
                
            }
        }
       
    ?>
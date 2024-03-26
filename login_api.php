<?php
session_start();
   include ("connection.php");

   $user_email="";
   $user_password1="";

   if (isset($_POST['email'])) {
        $user_email = trim($_POST['email']);
        $user_password = trim($_POST['password']);
   }

    if (!empty($user_email) && !empty($user_password))
    {
       
        $query = "SELECT * FROM accounts WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$user_email, $user_password ]);

        $count = $stmt->rowCount();
           
            $user = $stmt->fetch();
            if($user['type']==1){
               
                $query = "SELECT * FROM accounts WHERE email = ? AND password = ?";
                $stmt = $conn->prepare($query);
                $stmt->execute([$user_email, $user_password ]);
                $user1 = $stmt->fetch();

                $_SESSION['id'] = $user1['id'];
                $_SESSION['email'] = $user1['email'];
                $_SESSION['name'] = $user1['fname'];
                $_SESSION['rate'] = $user1['rate'];
                $_SESSION['num_of_groups'] = $user1['num_of_groups'];
                $_SESSION['points'] = $user1['points'];
                $_SESSION['type'] = 1;

                header('Location:main.php');
            }
               
            elseif($user['type']==2){
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['fname'];
                $_SESSION['type'] = 2;
                header('Location:main_admin.php');
            }
                
            elseif($user['type']==3){
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['fname'];
                $_SESSION['type'] = 3;
                header('Location:main_coordinator.php');    
            }
                 
        
        else
        { 
            header('Location: login.php?msg=' . 'error');
        }
    }
    else
    {

        header('Location: login.php?msg=' . 'empty');
    }

?>

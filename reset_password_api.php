<?php
session_start();
 include 'connection.php';

$email = trim($_POST['email']);


$n=10;
function generateCode($n) {
    $characters = '01234567891285743857359437525alldidfgurahgjsdMCosdkfmsd*@^ABCDERFHFSGHJL.,x\wdsas';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}

$password = generateCode($n);

$query = "SELECT * FROM accounts WHERE email = ? ";
        $stmt = $conn->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        $count = $stmt->rowCount();

    if($count == 0){
        header('Location:reset_password.php?msg=error&email='.$email);
    }
else{
$sql = "update accounts SET password = ? WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$password,$email]);
    $to      = $email;
    $subject = 'reset your account passowrd';
    $message = 'your new password is :'. "\r\n" .$password;
    $headers = 'From: lets.lets.do.it.2022@gmail.com'       . "\r\n" .
                 'Reset your Password' . "\r\n" .
                 'by LDT';
                 
    mail($to, $subject, $message, $headers);
   echo"goooood";
   header('Location:login.php?msg=good&email='.$email);
   }
?>

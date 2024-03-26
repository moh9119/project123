<?php

session_start();
include 'connection.php';

$fname = $_POST['fname'];
$type = $_POST['type'];
$lname = $_POST['lname'];
$id=$_POST['id'];
$email=$_POST['email'];
$password=$_POST['password'];


$sql = "update accounts set fname=?,lname=?,email=?,password=? where id =?";
$stmt = $conn ->prepare($sql);
$stmt->execute([$fname,$lname,$email,$password,$id]);

if($type == 1){
    $sql = "update users set fname=?,lname=?,email=?,password=? where id =?";
    $stmt = $conn ->prepare($sql);
    $stmt->execute([$fname,$lname,$email,$password,$id]);
}
if($type == 2){
    $sql = "update admin set fname=?,lname=?,email=?,password=? where id =?";
    $stmt = $conn ->prepare($sql);
    $stmt->execute([$fname,$lname,$email,$password,$id]);
}
if($type == 3){
    $sql = "update coordinator set fname=?,lname=?,email=?,password=? where id =?";
    $stmt = $conn ->prepare($sql);
    $stmt->execute([$fname,$lname,$email,$password,$id]);
}

$msg = "successful";
header('Location:edit_user.php?msg='.$msg.'&id='.$id);

?>
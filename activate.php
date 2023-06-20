<?php 
session_start();
include 'connect.php';
if ($_GET['token']) {
    $token  = $_GET['token'];
    $sql = "UPDATE `userdtls` SET `state`='active' WHERE token = '$token'";
    $result=mysqli_query($con,$sql);
    if($result){
        $sql1 = "SELECT * FROM `userdtls` WHERE token = '$token'";
    $result1=mysqli_query($con,$sql1);
    $arr = mysqli_fetch_array($result1);
    $email = $arr['email'];
    header('location:login.php?inemail='.$email);
    }
    else{
        echo "error updating database";
    }
    
}
else{
    header('location:login.php');
}

?>
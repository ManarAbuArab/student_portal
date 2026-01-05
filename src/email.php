<?php
session_start();
    if(!isset($_SESSION['status']))
    {
        header('Location:index.php');
        exit;
    }
    include('connection.php'); 
     $username = $_SESSION['user2'];
     $branch = $_SESSION['branch1'];
     $username= stripcslashes($username);   
     $username = mysqli_real_escape_string($con,$username); 
     $branch= stripcslashes($branch);   
     $branch = mysqli_real_escape_string($con,$branch);
$to = "ced19i027@iiitdm.ac.in";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: dhyutin9@gmail.com" . "\r\n" .
"CC: dhyutin9@gmail.com";

mail($to,$subject,$txt,$headers);
?>
<?php 
    include('connection.php');
    
    $assignment=$_POST['assgn'];
    $dt=$_POST['dt'];
    session_start();
    $user=$_SESSION['user2'];

    //to prevent from mysqli injection  
    $user = stripcslashes($user);   
    $assignment = stripcslashes($assignment);  
    $dt = stripcslashes($dt);

    $user = mysqli_real_escape_string($con, $user); 
    $assignment = mysqli_real_escape_string($con, $assignment); 
    $dt = mysqli_real_escape_string($con, $dt);
    $date = date('Y-m-d H:i:s');
    if($dt < $date)
    {
        header('Location:todo.php');
        exit;
    }
    $sql = "insert into todo values('$user','$assignment','$dt')";  
    mysqli_query($con, $sql);
    
    header('Location:todo.php');
    exit;
    
    mysqli_close($con);

?>
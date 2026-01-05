<?php      
    include('connection.php'); 
    session_start();
        $_SESSION['branch1']=$_POST['brnch'];
            $_SESSION['status']="active"; 
    $_SESSION['user2']=$_POST['user'];  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
    $branch = $_POST['brnch'];
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $branch= stripcslashes($branch);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
        $branch = mysqli_real_escape_string($con, $branch);  
        
    
        $sql = "select * from login where username = '$username' and password = '$password' and branch='$branch'"; 
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
              header('Location: student_page.php');
              exit;
        }  
        else{  
            include('login_fail.php');
        }  
       ?>
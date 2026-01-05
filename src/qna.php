<?php
    include('connection.php');
      session_start();
      if(!isset($_SESSION['status']))
    {
        header('Location:index.php');
        exit;
    }
     $username = $_SESSION['user2'];
     $branch = $_SESSION['branch1'];
     $username= stripcslashes($username);   
     $username = mysqli_real_escape_string($con,$username); 
     $branch= stripcslashes($branch);   
     $branch = mysqli_real_escape_string($con,$branch);
     $sql = "select name,username,branch from login where username = '$username'";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result);
     echo "Username - ".$row['username']."<br>";
     echo "    Name - ".$row['name']."<br>";
     echo "  Branch - ".$row['branch']."<br>";
?>   
<html>
<title>Question and Answers</title>
<body>
    <form name="f3" action = "<?php echo $_SERVER['PHP_SELF'];?>"  method = "POST">  
            <p>  
                <label> Question:</label>  
                <input type = "text" placeholder="Ask a question" id ="q" name  = "q" />  
            </p>  
                <input type =  "submit" id = "btn" value = "ASK" />  
</form>
<?php
  $q=$_POST['q'];
  $q= stripcslashes($q);   
  $q = mysqli_real_escape_string($con,$q); 
  $sql = "select * from qna";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
  echo "qno :".$row['qno']." User:".$row['qroll']." Question:".$row['question'];
  if ($_SERVER["REQUEST_METHOD"] == "POST")
?>
</body>
</html>


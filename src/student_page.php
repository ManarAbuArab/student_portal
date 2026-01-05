<?php
session_start();
    if(!isset($_SESSION['status']))
    {
        header('Location:index.php');
        exit;
    }
    include('connection.php'); 
     $username = $_SESSION['user2'];
        //to prevent from mysqli injection  
        $username= stripcslashes($username);   
        $username = mysqli_real_escape_string($con,$username);  
        $sql = "select name from login where username = '$username'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
      mysqli_close($con);  
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<title>login page</title>
<style>

.b1 { grid-area: 1 / 1 / 1 / 1; }
.b2 { grid-area: 1 / 2 / 1 / 2; }
.b3 { grid-area: 1 / 3 / 1 / 3; }
.b4 { grid-area: 1 / 4 / 1 / 4; }
* {
  box-sizing: border-box;
}

body {
  font-family: "Lucida Console", "Courier New", monospace;
  background-color:#bfcba8;

}

/* Style the header */
.logout {
    text-align: right;
}
.header {
  text-align: left;
  color :#464f41;
  font-size: 35px;
 
}

.links {
    color: white;
}

/* The grid container */
.grid-container {
  display: grid;
  color: white;
  grid-template-columns: auto auto auto auto;
  grid-template-rows: auto ;
  /* grid-column-gap: 10px; - if you want gap between the columns */
} 

.b1,
.b2,
.b3,
.b4 {
  padding: 10px;
  height: 300px; Should be removed. Only for demonstration */
}
a{
     text-decoration: none;
     color:#464f41;
     font-size: 20px;
}

</style>
<body>
 <div class ="logout">
 <a href="logout.php"  ="right">LOGOUT</a>
 </div>
 <div class="header">
 <h4><?php  echo "Welcome,".$row['name'].":)"; ?></h4>
 </div>
    <div class="grid-container">
  <div class="b1" style="background-color:#56776c;"><form name="f1" action = "internships.php"  method = "POST"> 
<a href="internships.php"><div class="links">INTERNSHIPS</div></a>
</form></div>

<div class="b2" style="background-color:#5b8a72;"><form name="f1" action = "time_table.php"  method = "POST"> 
<a href="time_table.php"><div class="links">TIME TABLE</div></a>
</form></div>

  <div class="b3" style="background-color:#56776c;"><form name="f1" action = "todo.php"  method = "POST"> 
<a href="todo.php"><div class="links">TO-DO</div></a>
</form></div>

<div class="b4" style="background-color:#5b8a72;"><form name="f1" action = "personal.php"  method = "POST"> 
<a href="personal.php"><div class="links">EDIT PROFILE</div></a>
</form></div>
<div class="b5" style="background-color:#5b8a72;"><form name="f1" action = "qna.php"  method = "POST"> 
<a href="qna.php"><div class="links">Q & A</div></a>
</form></div>
</div>

 </body>
</html>
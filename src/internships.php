<?php
session_start();
    if(!isset($_SESSION['status']))
    {
        header('Location:index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

.logout {
    text-align: right;
    font-family: "Lucida Console", "Courier New", monospace;
    
}

table

{
border: 1px solid black;

border-collapse: collapse;

width:100%;

border-color:black;

}

td {
  text-align: center;
}
a{
    text-decoration:none;
    color:#464f41
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  font-family: "Lucida Console", "Courier New", monospace;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #464f41;
  color: white;
  font-family: "Lucida Console", "Courier New", monospace;
}
h2{
  color: #464f41;
  font-family: "Lucida Console", "Courier New", monospace;
}
</style>

</head>

<body bgcolor="#bfcba8">

 <div class ="logout">
  <a href="student_page.php">HOME |</a>
 <a href="logout.php"> LOGOUT</a>
 </div>
<h2>Here's your timetable...</h2>
<?php      
include('connection.php'); 
     $branch = $_SESSION['branch1'];
        //to prevent from mysqli injection  
        $branch= stripcslashes($branch);   
        $branch = mysqli_real_escape_string($con,$branch);  
if ($branch == 'coe' or $branch == 'ced') {
    $result = mysqli_query($con,"SELECT * FROM internships where branch = 'CSE'");
}
else if ($branch=='esd'or $branch=='evd' or $branch=='edm') {
    $result = mysqli_query($con,"SELECT * FROM internships where branch = 'ECE'");
}
else if($branch=='msm' or $branch=='mdm'or $branch='mfd' or $branch='mpd') {
    $result = mysqli_query($con,"SELECT * FROM internships where branch = 'MEC'");
}

echo "<table id = 'customers'>

<tr>

<th>ID</th>

<th>NAME</th>

<th>BRANCH</th>

<th>COMPANY_NAME</th>

<th>LOCATION</th>

<th>PRE-REQUISITES</th>

<th>For More Info</th>


</tr>";

while($row = mysqli_fetch_array($result)) 
{
  
  echo "<tr>";

  echo "<td>" . $row['intership_id'] . "</td>";

  echo "<td>" . $row['name'] . "</td>";
  
   echo "<td>" . $row['branch'] . "</td>";

  echo "<td>" . $row['company_name'] . "</td>";

  echo "<td>" . $row['Location'] . "</td>";
  
  echo "<td>" . $row['Pre-requisites'] . "</td>";
  
  $internship_link = '<a href="' . $row['link'] . '">Click Here</a>';
   
   echo "<td>" .$internship_link."</td>";

  echo "</tr>";

  }
  echo "</table>";
  

?>

<form name="f1" method="post" action = "<?php echo $_SERVER['PHP_SELF'];?>">  
          
            <p>  
                <label> Branch: </label>  
                <!--  <input type = "text" id ="brnch" name  = "brnch" />  -->
                <select name="bnch" id="brnch">
                    <option value="CSE">CSE</option>
                    <option value="MEC">MEC</option>
                    <option value="ECE">ECE</option>
                  </select>
            </p> 
            <p>     
                <input type =  "submit" id = "btn" value = "GO" />  
            </p>  
        </form> 
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['bnch'];
    if (empty($name)) {
        echo "Name is empty";
    } 
    else {
        if ($name =="CSE") {
           $result = mysqli_query($con,"SELECT * FROM internships where branch = 'CSE'");
            }
        else if ($name == 'ECE') {
           $result = mysqli_query($con,"SELECT * FROM internships where branch = 'ECE'");
            }
        else if($name=='MEC') {
           $result = mysqli_query($con,"SELECT * FROM internships where branch = 'MEC'");
            }

echo "<table id='customers'>

<tr>

<th>ID</th>

<th>NAME</th>

<th>BRANCH</th>

<th>COMPANY_NAME</th>

<th>LOCATION</th>

<th>PRE-REQUISITES</th>

<th>For More Info</th>


</tr>";

 
       while($row = mysqli_fetch_array($result)) 
       {

            echo "<tr>";

            echo "<td>" . $row['intership_id'] . "</td>";

            echo "<td>" . $row['name'] . "</td>";
  
            echo "<td>" . $row['branch'] . "</td>";

           echo "<td>" . $row['company_name'] . "</td>";

            echo "<td>" . $row['Location'] . "</td>";
  
            echo "<td>" . $row['Pre-requisites'] . "</td>";
            
              $internship_link = '<a href="' . $row['link'] . '">Click Here</a>';
   
              echo "<td>" .$internship_link."</td>";
            

            echo "</tr>";

        }
        echo "</table>";
    } 
     mysqli_close($con);
}
 
?>

</body>

</html>

</table>
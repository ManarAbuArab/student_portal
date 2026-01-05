<?php
    include('connection.php');
    if(isset($_POST['ticked']))   
    {
       foreach ($_POST["ticked"] as $id)
       {
           $de1 = "DELETE FROM todo WHERE assignment='$id'";
           if(mysqli_query($con, $de1))
            {}
           else
               echo "ERROR: Could not execute";
       }
    }
   
    header('Location:todo.php');
    exit; 
?>
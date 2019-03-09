<?php
$con = mysqli_connect('localhost','root','','ip');
    $id = $_GET['id'];
    
$query = "DELETE FROM `ipinf` WHERE `ipinf`.`id` = '$id';";

   if($con->query($query) === TRUE){
       echo header('location:home.php');
   }
else {
    echo"no";
}
$con->close();
?>
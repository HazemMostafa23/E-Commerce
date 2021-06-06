<?php
ob_start();
session_start();
include "nav.php";
include "errorhandler.php";
if($_SESSION['Role']!=2){

    header("Location:outofreach.php");
  }
  
?>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);

   $sql="DELETE FROM products where Id ='".$_GET['X']."'";
$result = mysqli_query($conn,$sql);
if($result)	
       {
           header("Location:manageproducts.php");
       }
       else
       {
           echo $sql;
       }
   





?>




<?php ob_end_flush(); ?>
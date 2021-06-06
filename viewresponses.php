<style>
body{
  overflow-x: hidden;
}
table,th,td,tr{
  border:1px solid black;
  position:relative;
}
th,td{
  padding: 15px;
  text-align: left;
}
th{
  background-color: grey;
  color: white;
}
table{
  width: 100%;
  position:relative;

}

h3{
text-align:center;
}
</style>
<div class="container">
  <div class="row"> 
    <div class="col-lg">
<table>
    <tr>
      
     
      
<?php
ob_start(); 
  session_start();
include "nav.php";
include "errorhandler.php";
if($_SESSION['Role']!=4){

  header("Location:outofreach.php");
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql="SELECT * from formresponses where FID='".$_GET["X"]."'";
$result=mysqli_query($conn,$sql); ?>

<th>Customer ID</th>
<th>Customer Email</th>
<th>Question</th>
<th>Answer</th>
<?php
while($row=mysqli_fetch_array($result))	{
    ?>
    <tr>
<td> <?php echo $row["CID"]?></td>

<?php 
$sql3="SELECT * from accounts where ID='".$row["CID"]."'";
$result3=mysqli_query($conn,$sql3);
while ($row3=mysqli_fetch_array($result3)){
?>
   <td> <?php echo $row3["Email"]?></td>
<?php
}
$sql2="SELECT * from formsquestions where QID='".$row["QID"]."'";
$result2=mysqli_query($conn,$sql2);
while ($row2=mysqli_fetch_array($result2)){
    ?>
    <td> <?php echo $row2["Question"]?></td>
    <?php
}
?>
<td> <?php echo $row["Response"]?></td>

<?php
    }

    echo"</table>";
?>
<?php
 ob_end_flush(); 
?>
 </div>
</div>   
</div> 
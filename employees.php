<html>
<style>
body{
  overflow-x: hidden;
}
table,th,td,tr{
  border:1px solid black;
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
.button{
  position: relative;
  bottom: 35px;
  font-size: 1.25em;
  font-weight: 700;
  color: white;
  background-color: red;
  display: inline-block;
  cursor: pointer;
  border: 1px solid white;
  top:10px;
}

.button:focus,
.button:hover{
  background-color: rgb(121, 117, 117);
}

</style>
<?php
session_start(); 
ob_start();
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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql="SELECT * from accounts where role='2' OR role='3' OR role='4'";
	$result = mysqli_query($conn,$sql);	

?>
<div class="container">
  <div class="row"> 
    <div class="col-lg">
    <h3>Manage employees accounts</h3>
   <table>
	<tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Email</th>
	  <th>Age</th>
    <th>Role</th>
	  <th>Delete</th>
	
</tr>
<form action="employees.php" method="post">
	<?php
	while($row=mysqli_fetch_array($result))	
	{
?>
<tr>
<td><?php echo $row["ID"];?></td>
 <td><?php echo $row['Name'];?></td>
 <td><?php echo $row["Email"];?></td>
 <td><?php echo $row["Age"];?></td>
 <?php 
 $sql2="SELECT * from roles WHERE ID=".$row["Role"]."";
 $result2=mysqli_query($conn,$sql2);
if($row2=mysqli_fetch_array($result2)){
  ?>
  <td><?php echo $row2["Role"];?></td>
<?php
}
?>
 
<td><input type="checkbox" value="<?php echo $row['ID']; ?>" name="check[ ]"></td>

 </tr>
	<?php }?>
 <br>
</table>
<input type="submit" class="submit button btn w-100 py-3" name="Submit" value="Delete">
</form>
<?php
if(isset($_POST["Submit"])){

$checkbox = $_POST['check'];  
 
for ($i=0; $i<count($checkbox);$i++) { 
 $deleteid=$checkbox[$i];
$sql="DELETE FROM accounts where ID ='$deleteid'";
$result=mysqli_query($conn,$sql); 
header("Location:employees.php");
} 
}
?>
<h3> Add a new administrator</h3>
<form action="addemployee.php">
    <input type="submit" class="submit button btn w-100 py-3" value="Add an account" />
</form>

</html>
<?php
ob_end_flush();
?>
</div>
</div>   
</div> 
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
.actions{
       color:red;
       
}
</style>
<?php
session_start(); 
ob_start();
include "nav.php";
include "errorhandler.php";
if($_SESSION['Role']!=3){

  header("Location:outofreach.php");
}

?>
<div class="container">
  <div class="row"> 
    <div class="col-lg">
<h3>You can add penalties to admins here</h3>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql="SELECT * from accounts where role='2'";
	$result = mysqli_query($conn,$sql);	

?>
   <table>
	<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
	  <th>Age</th>
	  <th>Add Penalty</th>
	
</tr>

	<?php
	while($row=mysqli_fetch_array($result))	
	{
?>
<tr>
<td><?php echo $row["ID"];?></td>
 <td><?php echo $row['Name'];?></td>
 <td><?php echo $row["Email"];?></td>
 <td><?php echo $row["Age"];?></td>
 <td><span><a class="actions"href = "addpenalty.php?X=<?php echo $row[0]; ?>">Add Penalty</a></span></td>        

 </tr>
	<?php }?>
 <br>
</table>
    <br>
   <h3> Currently penalized admins</h3>
    <table>
	<tr>
    <th>ID of penalty</th>
    <th>Name</th>
    <th>Email</th>
    <th>Penalized by</th>
	  <th>Reason</th>
	  <th>Image</th>
	
</tr>

<?php 
$sql="SELECT * from penalties";
$result = mysqli_query($conn,$sql);	
while($row=mysqli_fetch_array($result))	
	{
        ?>
<tr>
<td><?php echo $row["ID"];?></td>
<?php $sql2="SELECT * from accounts where ID='".$row["AID"]."'";
$result2 = mysqli_query($conn,$sql2);	
$row2=mysqli_fetch_array($result2);
?>
<td><?php echo $row2["Name"];?></td>
<td><?php echo $row2["Email"];?></td>
<?php $sql3="SELECT * from accounts where ID='".$row["HRID"]."'";
$result3 = mysqli_query($conn,$sql3);	
$row3=mysqli_fetch_array($result3);
?>
<td><?php echo $row3["Email"];?></td>
<td><?php echo $row["Reason"];?></td>
<td> <img src="<?php echo $row["Image"];?>" width=50px> </td>
</tr>
	<?php }?>
 <br>
</table>


</html>
<?php
ob_end_flush();
?>
 </div>
</div>   
</div>   

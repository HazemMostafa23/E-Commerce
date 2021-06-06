<style>
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
  text-align:center

}

h5{
       color:red;
       font-size:15x;

}
.details{
       font-size:20px;
}
.actions{
       color:red;
       
}


</style>
<body>
  <table>
    <tr>
      <th>Order ID</th>
      <th>Email</th>
      <th>Product</th>
      <th>Size</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Amount</th>
    </tr>
</body> 
<div class="container">
  <div class="row"> 
    <div class="col-lg">
<?php
ob_start();
session_start();
if($_SESSION['Role']!=2){

  header("Location:outofreach.php");
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);
 $sql="SELECT * FROM orders where Email LIKE '%".$_POST['search']."%' OR ID LIKE '%".$_POST['search']."%'";
  $result = mysqli_query($conn,$sql);	

while($row=mysqli_fetch_array($result))
{
echo"<tr>";
echo" <td>$row[0]</td>";
echo" <td>$row[1]</td>";
$id=$row[0];
$sql="SELECT Product from orderedproducts WHERE ID='$id'";
$result2 = mysqli_query($conn,$sql);	
echo "<td>";
while($row2=mysqli_fetch_array($result2)){
  echo"$row2[0]";
 echo "<br>";


} 
echo "</td>";
$sql="SELECT Size from orderedproducts WHERE ID='$id'";
$result3 = mysqli_query($conn,$sql);	
echo "<td>";
while($row2=mysqli_fetch_array($result3)){
  echo"$row2[0]";
 echo "<br>";


} 
echo "</td>";
$sql="SELECT Quantity from orderedproducts WHERE ID='$id'";
$result3 = mysqli_query($conn,$sql);	
echo "<td>";
while($row2=mysqli_fetch_array($result3)){
  echo"$row2[0]";
 echo "<br>";


} 
echo "</td>";
$sql="SELECT Price from orderedproducts WHERE ID='$id'";
$result3 = mysqli_query($conn,$sql);	
echo "<td>";
while($row2=mysqli_fetch_array($result3)){
  echo"$row2[0]";
  echo "<br>";



} 
echo "</td>";
echo"<td>$row[2]</td>";
?>

<?php 
echo"</tr>";
}
echo"</table>";
?>
 </div>
</div>   
</div> 
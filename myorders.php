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
body{

    overflow-x: hidden;
}
.head2{
    text-align:center;
}

</style>
<?php
ob_start();
session_start();
include "nav.php";
include "errorhandler.php";
if($_SESSION['Role']!=1){

  header("Location:outofreach.php");
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);

?>

<div class="container">
  <div class="row"> 
    <div class="col-lg">
<h1 class="head2">Orders</h1>
<body>
  <table id="mytable">
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

<?php 

  $sql="SELECT * from orders WHERE CID='".$_SESSION["ID"]."'";
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
        


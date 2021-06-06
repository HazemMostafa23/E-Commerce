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
<body>
<div class="container">
  <div class="row"> 
    <div class="col-lg">
  <table>
    <tr>
    
      <th>Name of auditor</th>
      <th>The Message</th>
      <th>The comment</th>
      <th>Chat ID</th>
      
    </tr>
</body>  
<?php 
ob_start();
session_start();
include "nav.php";
include "errorhandler.php";
if($_SESSION['Role']!=4&&$_SESSION['Role']!=2){

  header("Location:outofreach.php");
}
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web";
              
    // Create connection
    $conn = mysqli_connect($servername,$username,$password,$dbname);

    $sql="SELECT * from comments where CHID='".$_GET["X"]."'";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($result)){
  
    $sql2="SELECT * from accounts where ID='".$row["AID"]."'";
    $result2=mysqli_query($conn,$sql2);
if($row2=mysqli_fetch_array($result2)){
echo "<td>$row2[1]</td>";
}
$sql3="SELECT * from chats where MID='".$row["MID"]."'";
    $result3=mysqli_query($conn,$sql3);
if($row3=mysqli_fetch_array($result3)){
echo" <td>$row3[1]</td>";
  
}
echo "<td>$row[4]</td>";
echo "<td>$row[2] </td>";
echo"</tr>";
}



echo"</table>";

?>
 </div>
</div>   
</div>     

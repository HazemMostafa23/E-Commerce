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
?>
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
<div class="container">
  <div class="row"> 
    <div class="col-lg">
<table>
    <tr>
      <th>Form ID</th>
      <th>Auditor Name</th>
      <th>Auditor Email</th>
      <th>Responses</th>
     
      </tr>


      <?php
        $sql="SELECT * from forms";
        $result = mysqli_query($conn,$sql);	
        while($row=mysqli_fetch_array($result))	
	{
        $ID=$row[0];
        $AID=$row[1];
        echo"<tr>";
        echo" <td>$ID</td>";
        $sql2="SELECT * from accounts WHERE ID='$AID'";
        $result2=mysqli_query($conn,$sql2);
        if($row2=mysqli_fetch_array($result2)){
            ?>
            <td><?php echo $row2["Name"];?></td>
            <td><?php echo $row2["Email"];?></td>
          <?php
          }
         ?> <td><span><a class="actions"href = "viewresponses.php?X=<?php echo $row[0]; ?>">View Responses</a></span></td>      
       
       <?php  echo"</tr>";
            
        }
        echo"</table>";

      ?>

<?php
 ob_end_flush(); 
?>
 </div>
</div>   
</div>     

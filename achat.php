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
.actions{
color:red;

}
.Active{

  color:green;
}
</style>
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
?>
<body>
<div class="container">
  <div class="row"> 
    <div class="col-lg">
  <h3>Messages</h3>
  <table>
	  <tr>
      <th>ID</th>
      <th>Customer Name</th>
      <th>Title</th>
      <th>Status</th>
      <th>Reply</th>
      <th>Comments</th>
	  </tr>
</body>
<?php 
if($_SESSION["Role"]==4){
  $sql="SELECT * from messages";
}

else $sql="SELECT * from messages where AID='0' OR AID='".$_SESSION["ID"]."'";
$result = mysqli_query($conn,$sql);	

while($row=mysqli_fetch_array($result))
{
  echo"<tr>";
  echo" <td>$row[0]</td>";
 $cid= $row[1];
  $sql2="SELECT Name from accounts where ID='$cid'";
  $result2=mysqli_query($conn,$sql2);
  $row2=mysqli_fetch_array($result2);
  $sql3="SELECT * from comments where CHID='".$row["ID"]."'";
  $result3=mysqli_query($conn,$sql3);
  $row3=mysqli_fetch_array($result3);
  echo" <td>$row2[0]</td>";
  echo" <td>$row[3]</td>";
?>
  <?php 
  if($_SESSION["Role"]!=4){
  if($row[4]==0){?>
  <td class="Active">Active</td>
  <td class="actions"><a class="actions" href="chat.php?X=<?php echo $row["ID"]; ?>" id="reply">Reply</a></td>
  <?php 
  } else if($row[4]==1) { ?> 
  <td>Closed</td>
  <td class="actions"><a class="actions" href="chat.php?X=<?php echo $row["ID"]; ?>">View chat</a></td>
  <?php
  }
  }
  else {
    if($row[4]==0){?>
      <td class="Active">Active</td>
      <td class="actions"><a class="actions" href="chat.php?X=<?php echo $row["ID"]; ?>" id="reply">View chat</a></td>
      <?php 
      } else if($row[4]==1) { ?> 
      <td>Closed</td>
      <td class="actions"><a class="actions" href="chat.php?X=<?php echo $row["ID"]; ?>">View chat</a></td>
      <?php
      }



  }
  if($row3){?>
    <td class="actions"><a class="actions" href="viewcomments.php?X=<?php echo $row["ID"]; ?>">View comments</a></td>



<?php

  }
  else{ ?> <td>No comments</td>
  
<?php

  }
  echo"</tr>";

}
echo"</table>";

?>
 </div>
</div>   
</div>  



           
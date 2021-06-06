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
a[disabled="disabled"] {
        pointer-events: none;
        color:black;
    }

</style>
<?php 
ob_start();
session_start();
include "nav.php";
include "errorhandler.php";
if($_SESSION['Role']!=3){

  header("Location:outofreach.php");
}


?>
<body>
<div class="container">
  <div class="row"> 
    <div class="col-lg">
  <h3>Cases</h3>
  <table>
	  <tr>
      <th>The Complainant</th>
      <th>The Complainee</th>
     <th>The Complaint</th>
      <th>Image</th>
      <th>Reply</th>
	  </tr>
</body>
                           
   <?php $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web";
              
    // Create connection
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    $sql="SELECT * from complaints";
    $result = mysqli_query($conn,$sql);	

    while($row=mysqli_fetch_array($result))
    {
      echo"<tr>";
      $sql2="SELECT * from accounts where ID='".$row["UID"]."'";
      $result2 = mysqli_query($conn,$sql2);	
      if($row2=mysqli_fetch_array($result2)){
        ?>
        <td> <?php echo $row2["Email"]?></td>
<?php 
      }
      $sql3="SELECT * from accounts where ID='".$row["AID"]."'";
      $result3 = mysqli_query($conn,$sql3);	
      if($row3=mysqli_fetch_array($result3)){
        ?>
        <td><?php echo $row3["Email"]?></td>
        <?php
      }
      ?>
      <td><?php echo $row[4]?></td>
     
    
    
      <td> <img src="<?php echo $row[6];?>" width=100px alt="No image attached "> </td>
      <?php 
      if($row[5]==""){?>
      <td><a href="areply.php?X=<?php echo $row["ID"]; ?>" id="reply">Reply</a></td>
      <?php 
      } else if($row[5]!="") { ?> <td><a disabled="disabled" href="javascript:void(0)">Case handled</a></td>
      <?php
      }

      echo"</tr>";
 
    }
    echo"</table>";
    ?>

 </div>
</div>   
</div>   
<?php
ob_end_flush();
?>
                        
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
if($_SESSION['Role']!=2){

  header("Location:outofreach.php");
}


?>
<body>
<div class="container">
  <div class="row"> 
    <div class="col-lg">
  <h3>Users' complaints</h3>
  <table>
	  <tr>
    <th>ID</th>
      <th>Name</th>
      <th>The complaint</th>
      <th>Email</th>
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
    $sql="SELECT * from contactus";
    $result = mysqli_query($conn,$sql);	

    while($row=mysqli_fetch_array($result))
    {
      echo"<tr>";
      echo" <td>$row[0]</td>";
      echo" <td>$row[1]</td>";
      echo" <td>$row[2]</td>";
      echo "<td>$row[3]</td>";
    ?>
    
      <td> <img src="<?php echo $row[4];?>" width=100px alt="No image attached "> </td>
      <?php 
      if($row[5]==""){?>
      <td><a href="reply.php?X=<?php echo $row["ID"]; ?>" id="reply">Reply</a></td>
      <?php 
      } else if($row[5]!="") { ?> <td><a disabled="disabled" href="javascript:void(0)">Ticket handled</a></td>
      <?php
      }

      echo"</tr>";
 
    }
    echo"</table>";
    ?>
<?php
ob_end_flush();
?>
 </div>
</div>   
</div>    <br><br>

                        
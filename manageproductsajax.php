<style>
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

</style>
<body>
<div class="container">
  <div class="row"> 
    <div class="col-lg">
  <table id="mytable">
    <tr>
      <th>Product title</th>
      <th>Description</th>
      <th>Price</th> 
      <th>Quantity</th>
      <th>maCategory</th>
      <th>miCategory</th>
      <th>Color</th>
      <th>Brand</th>
      <th>Image</th>
      <th>Edit</th>
       <th>Delete</th>
    </tr>

</body>     
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
 $sql="SELECT * FROM products where Name LIKE '%".$_POST['search']."%' OR Brand LIKE '%".$_POST['search']."%'";  
 $result = mysqli_query($conn,$sql);	
  
	while($row=mysqli_fetch_array($result))	
	{
              $ID=$row[0];
              $Name=$row[1];
              $Description=$row[2];
              $Price=$row[3];
              $Image=$row[5];
              $Quantity=$row[4];
              $maCategory=$row[6];
              $miCategory=$row[7];
              $Color=$row[8];
              $Brand=$row[9];
              echo"<tr>";
              echo" <td>$Name</td>";
              echo" <td>$Description</td>";
              echo" <td>$Price</td>";
              echo" <td>$Quantity</td>";
              echo" <td>$maCategory</td>";
              echo" <td>$miCategory</td>";
              echo" <td>$Color</td>";
              echo" <td>$Brand</td>";
              
              ?>
             <td> <img src="<?php echo $Image;?>" width=50px> </td>
              
             <td><span><a class="actions"href = "editproduct.php?X=<?php echo $row[0]; ?>">Edit</a></span></td>            
              <td><span><a class="actions"href = "deleteproduct.php?X=<?php echo $row[0]; ?>">Delete</a></span></td>
          
             <?php 
              echo"</tr>";
            
            }
            echo"</table>";
          
            ?>
           
          </form>
          </div>
</div>   
</div> 
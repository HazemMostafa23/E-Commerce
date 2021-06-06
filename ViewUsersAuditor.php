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
</style>
<?php 
session_start(); 
ob_start();
include "nav.php";
include "errorhandler.php";
if($_SESSION['Role']!=4){

  header("Location:outofreach.php");
}
?>
<div class="container">
  <div class="row"> 
    <div class="col-lg">
<h3>Users</h3>
<body>
  <table>
    <tr>
      <th>Name</th>
      <th>Email</th>

      <th>Age</th>
       <th>SurveyNumber</th>
      <th>Image</th>
     
      <th>Survey</th>
    </tr>
</body>                        
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web";
    // Create connection
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    $sql2="SELECT * from forms";
    $i=0;
    $result2 = mysqli_query($conn,$sql2);	
    while($row2=mysqli_fetch_array($result2))	
    {
    $forms[$i]=$row2[0];
    $i++;

    }
    $sql="SELECT * from accounts where Role='1'";
    $result = mysqli_query($conn,$sql);	
?>
<form action="ViewUsersAuditor.php" method="post">

<?php
  while($row=mysqli_fetch_array($result))
  {
    echo"<tr>";
    echo" <td>$row[1]</td>";
    echo" <td>$row[2]</td>";

    echo"<td>$row[4]</td>";
    

?>
   <td><select name="select[]"> <?php
    for($i=0;$i<count($forms);$i++)
    {      
           ?> 
           <option hidden value=0 disabled selected value>Select a form </option>
           <option value=<?php echo $forms[$i]?>><?php echo $forms[$i]?> </option>  
           <?php  
    }
    ?></select>
  </td>
   <td> <img src="<?php echo $row[5];?>" width=50px> </td>
  


<td><input type="checkbox" value="<?php echo $row['ID']; ?>" name="check[ ]"></td>
<?php


    echo"</tr>";
  }
  echo"</table>";

  ?>
  <input type="submit" class="submit button btn w-100 py-3" name="Submit" value="Send Survey">
</form>
  <?php
  if(isset($_POST["Submit"])){
    $checkbox = $_POST['check'];  
    $select=$_POST['select'];
    for ($i=0; $i<count($checkbox);$i++) { 
     if($select[$i]!=0){
   $selection=$select[$i];
     $survey=$checkbox[$i];
    $sql="UPDATE accounts SET Survey='$selection' where ID ='$survey'";
   
    $result=mysqli_query($conn,$sql); 
     }
  
    }
  }
ob_end_flush();
?>
 </div>
</div>   
</div> 
                        
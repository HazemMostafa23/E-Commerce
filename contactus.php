<?php 
session_start();
include "nav.php";
include "errorhandler.php";
if($_SESSION['Role']!=1){

    header("Location:outofreach.php");
  }
  
?>
<html>
  <head>
      <style>
  body{
    height: 600px;
    overflow-x: hidden;
}

.online{
    background-color:#86868b;
}
.online h1{
    color: white;
    font-size: 48px;
}

.inputfile{
    position: relative;
    bottom: 35px;
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: transparent;
    display: inline-block;
    cursor: pointer;
    border: 1px solid white;
}
.inputfile:focus,
.inputfile:hover {
    background-color: rgb(121, 117, 117);
}
h5{
    position: relative;
    bottom:50px;
    color : blue;
}
a{
color:black;	
}
.forget{
	text-decoration:none;
	font-weight:bold;
}
.forget:hover{
	text-decoration:none;
}

.pos{
	width:500px;
}
.head{
	text-align:center;
	position:relative;
	bottom:50px;
}
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
h4{
    color:white;
    position:relative;
    bottom:30px;
}
.head2{
    text-align:center;
}

      </style>
      
  </head>
<body>
<div class="online py-100">
    <div class="container pos">
        <div class="row">
            <div class="col-lg">
                <h1 class="head">ContactUs</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form">
                      <input type="Name"class="form-control mb-4 border-0 py-4 "id="fname" name="Complaint" placeholder="The complaint or suggestion.."><br> 
                      <h4>Add a picture to illustrate your problem/suggestion</h4>
                      <i class="fa fa-upload icon"></i>
                      <input type="file" class=" inputfile btn w-100 py-3" id="img" name="img" accept="image/*" ><br><br>
                      <input type="submit"class="inputfile btn w-100 py-3" value="Send" name="Submit">
                    </div>
                </form> 
            </div>
        </div> 
        <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST["Submit"]))
{
    if(!empty($_POST["Complaint"]))
    {
        $image=$_FILES['img']['name'];
          move_uploaded_file($_FILES["img"]["tmp_name"], "C:\\\\xampp\htdocs\project\\" . $image);
        $sql="INSERT INTO contactus (CID,Name,Complain,Email,Picture) values('".$_SESSION["ID"]."','".$_SESSION["Name"]."','".$_POST["Complaint"]."','".$_SESSION["Email"]."','$image' )";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            echo"<h5>Your complaint have been received.</h5>";
        }
    }
        else echo "<h5>*Please fill in your complaint</h5>";
}
?>  
    </div>
</div>
                   
<div class="row">
    <div class="container">
        <div class="col-lg">

  
   <h1 class="head2">Your recent tickets</h1> 
   <table>
    <tr>
    <th>The ticket</th>
    <th>The Reply</th>
  
	
</tr>
    
                 



<?php 
$sql="SELECT * from contactus WHERE CID='".$_SESSION["ID"]."'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))	
	{
        echo"<tr>";
    
        echo" <td>$row[2]</td>";
       
        ?>
        <?php
        if($row[5]==""){
echo " <td>No reply yet</td>";

        }
     else echo"<td> $row[5]</td>";
        echo"</tr>";
      }
      echo"</table>";
    
   
    
?>
    </div>
</div>   
</div>     
            
</body>

    
</html>


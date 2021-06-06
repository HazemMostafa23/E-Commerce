
<?php 
session_start();
ob_start();
include "nav.php";
include "errorhandler.php";
if($_SESSION['Role']!=3){

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
    color:blue;
    position:relative;
    bottom:40px;
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
h4{
    color:white;
    position:relative;
    bottom:20px;
}
</style>
<div class="online py-100">
    <div class="container pos">
        <div class="row">
            <div class="col-lg">
                <h1 class="head">Add Penalty</h1><br>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form">
                      <input type="Name"class="form-control mb-4 border-0 py-4 "id="penalty" name="penalty" placeholder="Reason of the penalty"><br> 
                      <h4>Add a proof for your penalty if available</h4>
                      <i class="fa fa-upload icon"></i>
                      <input type="file" class=" inputfile btn w-100 py-3" id="img" name="img" accept="image/*" ><br><br>
                      <input type="submit"class="inputfile btn w-100 py-3" value="Send" name="submit">
                    </div> 
                </form>
            </div>
        </div>
        <?php
                if(isset($_POST["submit"])){
                    if(!empty($_POST["penalty"])){
        $image=$_FILES['img']['name'];
        move_uploaded_file($_FILES["img"]["tmp_name"], "C:\\\\xampp\htdocs\project\\" . $image);
$sql="INSERT into penalties (HRID,AID,Reason,Image) values('".$_SESSION["ID"]."','".$_GET["X"]."','".$_POST["penalty"]."','$image')";
$result=mysqli_query($conn,$sql);
header('Location:homeee.php');
                    } else echo "<h5>*Missing fields</h5>";

                }
                ?>
    </div>
</div>
             
            
                
 
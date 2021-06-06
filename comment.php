<?php 
session_start(); 
ob_start();
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
    bottom:150px;
    left:600px;
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
      </style>
  </head>
  <body>
<div class="online py-100">
    <div class="container pos">
        <div class="row">
            <div class="col-lg">
                <h2 class="head">Reply</h2>
                <form action="" method="post">
                    <div class="form">
                      <input type="text" class="form-control mb-4 border-0 py-4 "name="comment" placeholder="Add your comment"><br>
                      <input type="submit"class="inputfile btn w-100 py-3" value="Reply" name="Submit">
                    </div>
                </form>
            </div>
         </div>
    </div>
</div>
</div>
</body>
<?php
 if(isset($_POST["Submit"]))
 {
     if(!empty($_POST['comment']))
     {
      $sql = "INSERT INTO comments (AID,CHID,MID,Comment) values ('".$_SESSION['ID']."','".$_GET['Y']."','".$_GET['X']."','".$_POST['comment']."')";
      $result=mysqli_query($conn,$sql);
      echo "<h5>Comment added</h5>";
      header("Location:homeee.php");
     } 
    else
    { 
      echo "<h5>*Empty fields</h5>";
    }
 }
 include "footer.php";
 ?>

</html>





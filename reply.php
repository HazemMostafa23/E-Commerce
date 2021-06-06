<?php ob_start();
session_start();
include "nav.php";
include "errorhandler.php";
if($_SESSION['Role']!=2){

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
    top:420px;
    left:620px;
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
    color:white;
}

      </style>
  </head>
  
<?php $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "web";
 
 // Create connection
 $conn = mysqli_connect($servername,$username,$password,$dbname);
 $sql="SELECT Complain from contactus WHERE ID='".$_GET['X']."'";
 $result = mysqli_query($conn,$sql);	
 $row=mysqli_fetch_array($result);
 ?>

<?php
 if(isset($_POST["Submit"]))
 {
     if(!empty($_POST['reply']))
     {
      $sql = "UPDATE contactus SET Reply='".$_POST["reply"]."' WHERE ID='".$_GET['X']."'";
      $result=mysqli_query($conn,$sql);
      echo "<h5>Reply sent to the user</h5>";
     } 
    else
    { 
      echo "<h5>*Please enter a reply to the complaint</h5>";
    }
 }
 ?>
<body>
<div class="online py-100">
    <div class="container pos">
        <div class="row">
            <div class="col-lg">
                <h1 class="head">Reply</h1>
                <form action="" method="post">
                    <div class="form">
                      <input type="text"class="form-control mb-4 border-0 py-4 "id="fname" value=" <?php echo $row["Complain"];?> " name="Complaint" placeholder="The complaint or suggestion.."><br> 
                      <input type="text" class="form-control mb-4 border-0 py-4 "name="reply" placeholder="Reply to the customer"><br>
                      <input type="submit"class="inputfile btn w-100 py-3" value="Reply" name="Submit">
                    </div>
                </form>
            </div>
         </div>
    </div>
</div>
</div>
</body>
</html>





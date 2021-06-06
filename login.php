<?php
ob_start();
include "nav.php";
include "errorhandler.php";
?>
<html>
  <head>
  </head>
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
    bottom:200px;
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
<body>
	<div class="online py-100">
		<div class="container pos">
			<div class="row">
				<div class="col-lg">
					<form action="" method = "post">
						<div class="form">	
							<h1 class="head">Login</h1>
							<input type="text"class="form-control mb-4 border-0 py-4 " name="Email"placeholder="Your email.."><br>
							<input type="password"class="form-control mb-4 border-0 py-4 "id="fname" name="Password" placeholder="Your password.."><br>
							<input type="submit"class="inputfile btn w-100 py-3" value="Submit" name="Submit">
							<a href="resetpass.php" class="forget">Forgot your password?</a><br>
							<a href="signup.php" class="forget">  Haven't got an account?</a>
						</div>
					</form>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>
<?php
session_start();
$_SESSION['cart']=array();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST["Submit"]))
{ 
	
	 $sql="SELECT * from accounts where Email='".$_POST["Email"]."'and Password='".$_POST["Password"]."'";
	
	$result = mysqli_query($conn,$sql);	
	if($row=mysqli_fetch_array($result))	
	{
		
		$_SESSION["ID"]=$row["ID"];
		$_SESSION["Name"]=$row["Name"];
		$_SESSION["Email"]=$row["Email"];
		$_SESSION["Password"]=$row["Password"];
		$_SESSION["Age"]=$row["Age"];
		 $_SESSION["Image"]=$row[5];
		$_SESSION["sQuestion"]=$row[6];
		$_SESSION["sAnswer"]=$row[7];
		$_SESSION["Role"]=$row[8];
		$_SESSION["Survey"]=$row[9];
		header("Location:homeee.php");
	}
	else	
	{
		echo "<h5>*Incorrect E-Mail or Password.</h5>";
	}
}
?>

<?php
ob_end_flush();
?>

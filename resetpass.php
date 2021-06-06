<?php
ob_start();
include "nav.php";
include "errorhandler.php";
session_start();
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
h5{
    position: relative;
    bottom:35px;
    color:blue;
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
<head>
  </head>
        <div class="online py-100">
        <div class="container pos">
            <div class="row">
                <div class="col-lg">
					<h1 class="head">Reset</h1>
					<form action="" method = "post">
						<div class="form">
							<input type="text"class="form-control mb-4 border-0 py-4 " name="email" placeholder="Your email.."><br>
							<input type="submit"class="inputfile btn w-100 py-3" value="Submit" name="Submit">
                            <?php 
                           $check=false;
                            if(isset($_POST["Submit"]))
                            { 
                                $sql="SELECT * from accounts where Email='".$_POST["email"]."'"; 
                                $result = mysqli_query($conn,$sql);	
	if($row=mysqli_fetch_array($result))	
	{
        $check=true;
      
       
        
		 ?>
                                
                       
              
                            <?php 
                              
                            }
                            else echo "<h5>*Incorrect E-mail</h5>";
                        }
                        if($check==true){

                            header('Location: forgot.php?X='.$_POST["email"]);
                        }
                       
                          

?>

                        
							
						</div>
                        
				</div>
			</div>	
		</div>
	</div>
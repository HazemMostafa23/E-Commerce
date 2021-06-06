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
 h5{
    position: relative;
    bottom:25px;
    color : blue;
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

<?php 
  $sql="SELECT * from accounts where Email='".$_GET["X"]."'"; 
  $result = mysqli_query($conn,$sql);	
  if($row=mysqli_fetch_array($result))	
  { 
      $question=$row[6];
  }
    ?>
                        Your Security question: <br>
                        <input type="text"class="form-control mb-4 border-0 py-4 " disabled value="<?php echo $row[6];?>" name="Security question">
                           
                            Your Answer:
                             <input type="text"class="form-control mb-4 border-0 py-4 " id="answer"  name="answer">
                             New Password:
                             <input type="password"class="form-control mb-4 border-0 py-4 " placeholder="Your new password" name="Password"><br>
                             <input type="submit"class="inputfile btn w-100 py-3" value="Submit" name="Submit">
                             </form>
                             <?php
                      
                       if(isset($_POST["Submit"]))
                       { 
                         if(!empty($_POST['Password'])&&!empty($_POST['answer'])){
                        if(strlen($_POST["Password"])>=8){   
                        $invalid=true;
                        }
                        else 
                        {
                          $checkUpper=true;
                          for($i=0;$i<strlen($_POST["Password"]);$i++)
                          {
                            if(ctype_upper($_POST['Password'][$i]))
                            {
                              $checkUpper=false;
                            }   
                          }
                        
                          $checkNumeric=true;
                          for($i=0;$i<strlen($_POST["Password"]);$i++)
                          {
                            if(is_numeric($_POST['Password'][$i]))
                            {
                              $checkNumeric=false;
                            }
                          }
                        
                          $checkSpecial=true;
                          if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["Password"]))
                          {
                            $checkSpecial=false;
                          }
                          if($checkSpecial==true||$checkNumeric==true||$checkUpper==true)
                          {
                            $invalid=false;
                          }
                        }
                            $sql="SELECT * from accounts where sAnswer='".$_POST["answer"]."' And sQuestion='$question'"; 
                       $result = mysqli_query($conn,$sql);	
             
                        if($row=mysqli_fetch_array($result))	{
                         
if($invalid==true){
                           $sql ="UPDATE accounts SET Password='".$_POST["Password"]."'WHERE Email='".$_GET["X"]."'";
                           $result=mysqli_query($conn,$sql);
                           header("Location:login.php");
}   else echo "<h5>*Password should be atleast 8 chars in length & should contain atleast 1 uppercase letter , 1 number , and one special char </h5>";
                 

                        }   else echo "<h5>*Incorrect Answer</h5>";
                      
                                                     
                                                    
                                                } else echo "<h5>*Missing fields</h5>"; 
                                            }
                       
                                          
               
                                              
                    
                             ?>
                        
                             
<?php 
session_start();
ob_start();
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
                  <h1 class="head">Add</h1>
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="form">
                      <input type="text"class="form-control mb-4 border-0 py-4 "id="fname" name="Name" placeholder="Name..">
                      <input type="text"class="form-control mb-4 border-0 py-4 " id="mail" name="Email" placeholder="Email..">
                      <input type="Password"class="form-control mb-4 border-0 py-4 " name="Password"placeholder=" Temp Password..">
                      <input type="Age" class="form-control mb-4 border-0 py-4 " id="Age" name="Age"placeholder="Age..">
                      <input type="text"class="form-control mb-4 border-0 py-4 " id="question" name="question" placeholder="Temp security question">
                      <input type="text"class="form-control mb-4 border-0 py-4 " id="answer" name="answer" placeholder="Temp security answer">
                      <select name="role" class="form-control mb-4 border-0" py-4 id="role">
                        
  <option value=2>Administrator</option>
  <option value=3>Auditor</option>
  <option value=4>HR Partner</option>
 
</select><br>
                      <i class="fa fa-upload icon"></i>
                      <input type="file" class=" inputfile btn w-100 py-3" id="img" name="img" accept="image/*" ><br><br>
                      <input type="submit"class="inputfile btn w-100 py-3" value="Submit" name="Submit">
                      <input type="reset"class="inputfile btn w-100 py-3">
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
$("#Age").keypress(function(e) {
      if (String.fromCharCode(e.which).match(/[^0-9_ ]/)) {
        e.preventDefault();
        alert(" You can't enter an alphabet in Age field , Use '0-9'.");
       }
     });
  
     $("#fname").keypress(function(e) {
      if (String.fromCharCode(e.which).match(/[^A-Za-z ]/)) {
        e.preventDefault();
        alert("Special characters and numbers are not allowed in name field. Use 'A-Z', 'a-z'");
       }
     });
     $("#question").keypress(function(e) {
      if (String.fromCharCode(e.which).match(/[^A-Za-z ?]/)) {
        e.preventDefault();
        alert("Special characters and numbers are not allowed in question field. Use 'A-Z', 'a-z'");
       }
     });
     </script>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);


if(isset($_POST["Submit"])){
  $invalid=true;
  if(strlen($_POST["Password"])<8)
  {
    $invalid=false;
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
  if(empty($_POST['Email'])||empty($_POST['Password'])||empty($_POST['Name']))
{
  echo "<h5>*Missing fields</h5>";
  }
  $sql= "SELECT * FROM accounts where Email='".$_POST["Email"]."'";
  $result=mysqli_query($conn,$sql);
  $num_rows = mysqli_num_rows($result);
if($num_rows >= 1){
  echo "<h5>*Email already exists</h5>"; 
  }


else if(filter_var($_POST["Email"],FILTER_VALIDATE_EMAIL))
{
 if(strlen($_POST["Password"])>=6){
     if(filter_var($_POST["Age"],FILTER_VALIDATE_INT)){
      if($_POST["Age"]>=18){
        if($invalid==true)
        {
      $image=$_FILES['img']['name'];
      move_uploaded_file($_FILES["img"]["tmp_name"], "C:\\\\xampp\htdocs\project\\" . $image);
      if($image==""){
        $image="user.jpeg";
        $sql="INSERT INTO accounts (Name,Email,Password,Age,Image,sQuestion,sAnswer,Role) values('".$_POST["Name"]."','".$_POST["Email"]."','".$_POST["Password"]."','".$_POST["Age"]."','$image' ,'".$_POST["question"]."','".$_POST["answer"]."','".$_POST["role"]."')";

      }
  $sql="INSERT INTO accounts (Name,Email,Password,Age,Image,sQuestion,sAnswer,Role) values('".$_POST["Name"]."','".$_POST["Email"]."','".$_POST["Password"]."','".$_POST["Age"]."','$image' ,'".$_POST["question"]."','".$_POST["answer"]."','".$_POST["role"]."')";
      $result=mysqli_query($conn,$sql);
 
      header("Location:employees.php");
        } 
        else 
        {
          echo "<h5>*Password should be atleast 8 chars in length & should contain <br> atleast 1 uppercase letter , 1 number , and one special char </h5>";
        } 
      } 
      else echo "<h5>*Age must be 18 or older</h5>";
 }
 else echo "<h5>*Age must be a number</h5>";
 }
 else echo "<h5>*Pssword must be 6 charachters long</h5>";
}
else echo "<h5>*Email isn't in the correct format</h5>";
}
?>  
<?php
ob_end_flush();
?>
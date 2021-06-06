<?php ob_start();
session_start();
include "nav.php";
include "errorhandler.php";
if($_SESSION['Role']!=1&&$_SESSION['Role']!=2&&$_SESSION['Role']!=3&&$_SESSION['Role']!=4){

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
                  <h1 class="head">Edit</h1>
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="form">
                      <h4>Name</h4>
                      <input type="text"class="form-control mb-4 border-0 py-4 "id="fname" value="<?php echo $_SESSION['Name'];?>" name="Name"><br>
                      <h4>Email</h4> 
                      <input type="text"class="form-control mb-4 border-0 py-4 " id="mail" name="Email" value =<?php echo $_SESSION['Email'];?>><br>
                      <h4>Password</h4>
                      <input type="text"class="form-control mb-4 border-0 py-4 " name="Password" value =<?php echo $_SESSION['Password'];?>><br>
                      <h4>Question</h4>
                      <input type="text"class="form-control mb-4 border-0 py-4 " id="question" name="sQuestion" value ="<?php echo $_SESSION['sQuestion'];?>"><br>
                      <h4>Answer</h4>
                      <input type="text"class="form-control mb-4 border-0 py-4 " name="sAnswer" value ="<?php echo $_SESSION['sAnswer'];?>"><br>
                      <i class="fa fa-upload icon"></i>
                      <input type="file" class=" inputfile btn w-100 py-3" id="img" name="img" accept="image/*" ><br><br>
                      <input type="submit"class="inputfile btn w-100 py-3" value="Submit" name="Submit">
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
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


 if(filter_var($_POST["Email"],FILTER_VALIDATE_EMAIL))
{
   if($invalid==true)
     {
        
           
        $image=$_FILES['img']['name'];
        move_uploaded_file($_FILES["img"]["tmp_name"], "C:\\\\xampp\htdocs\project\\" . $image);
        if($image==""){
          $image="user.jpeg";
          $sql="UPDATE accounts SET Email='".$_POST["Email"]."' , Password='".$_POST["Password"]."', Name='".$_POST["Name"]."', Image='$image',sQuestion ='".$_POST["sQuestion"]."' , sAnswer='".$_POST["sAnswer"]."' WHERE Email='".$_SESSION['Email']."'";
          

        }
        $sql = "UPDATE accounts SET Email='".$_POST["Email"]."' , Password='".$_POST["Password"]."', Name='".$_POST["Name"]."', Image='$image',sQuestion ='".$_POST["sQuestion"]."' , sAnswer='".$_POST["sAnswer"]."' WHERE Email='".$_SESSION['Email']."'";
        $result=mysqli_query($conn,$sql);
        
        $_SESSION['Name']=$_POST['Name'];
        $_SESSION['Email']=$_POST['Email'];
        $_SESSION['Password']=$_POST['Password'];
        $_SESSION['sQuestion']=$_POST['sQuestion'];
        $_SESSION['sAnswer']=$_POST['sAnswer'];
        $_SESSION['Image']=$image;
        header("Location:homeee.php");
   }
 else echo "<h5>*Password should be atleast 8 chars in length & should contain<br>atleast1 uppercase letter,1 number,and one special char</h5>";
}
else echo "<h5>*Email isn't in the correct format</h5>";

}


 ?>
 <script>

  
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
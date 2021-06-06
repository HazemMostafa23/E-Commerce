
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
<style>
.online{
    background-color:#86868b;
}

.head{
  color:white;
  position:relative;
 text-align:center;
 bottom:90px;
}
.inputfile{
    position: relative;
    
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
.dec,.inc{
  font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: transparent;
    cursor: pointer;
    border: 1px solid white;
}
.dec,.inc:hover{
  background-color: rgb(121, 117, 117);
}
.number{
  width:50px;
}
.poss{
	width:500px;
}
.pos{
  position:relative;
  bottom:50px;
  left:30px;
}
</style>
<div class="online py-100">
        <div class="container poss">
            <div class="row">
                <div class="col-lg-6">

<div class="form">
<h1 class="head">Questions</h1>
<div class="d-flex">
  <div class="counter d-inline-block">
    <form method="post">
      <button type="button" class="pos dec px-3 py-2 border-right" onClick="dec();">-</button>
      <input type="number"class="pos number counter "size="1" name="quantity" id="counter" readonly value=1></input>
      <button type="button" class="pos inc px-3 py-2 border-left" onClick="inc();">+</button>
      <input type="submit" class="btn1 inputfile btn w-100 py-3" name="addquestions" value="Add"></input>
  </div>
    </form>
    </div>

</div><br>
 <script>

function inc()
{
var counter=document.getElementById("counter").value;
counter++;
document.getElementById("counter").value=counter;
}
function dec()
{
  var counter=document.getElementById("counter").value;
  if(counter>1)
  {
counter--;
  }
document.getElementById("counter").value=counter;
}

</script>

<div class="form2">

<form action="" method="post"> 
   <?php 


if(isset($_POST["addquestions"]))
{
  
    ?>
        
       
            <?php
    for($i=0;$i<$_POST["quantity"];$i++){
        ?>
        
 <input type="text" class="form-control" id="question" placeholder="Enter question here..." name="question[]"> </input><br>

<?php

    }

}

?> 
<input type="submit"class="btn2 inputfile btn w-100 py-3" name="submit"></input>
</form>
</div>
<?php


if(isset($_POST["submit"])){
    $sql="INSERT into forms (AID) values ('".$_SESSION["ID"]."')";
    $result=mysqli_query($conn,$sql);
    $newest_id = mysqli_insert_id($conn);
    
 for($i=0;$i<count($_POST['question']);$i++){
     
$sql="INSERT into formsquestions (ID,Question) values ('$newest_id','".$_POST['question']["$i"]."')";
$result=mysqli_query($conn,$sql);
 }

    
    header("Location:homeee.php");
}
    
    ?>
  

  </div>
        </div>
    </div>
</div>

<script>



$("#question").keypress(function(e) {
      if (String.fromCharCode(e.which).match(/[^A-Za-z ?]/)) {
        e.preventDefault();
        alert("Special characters and numbers are not allowed in question field. Use 'A-Z', 'a-z'");
       }
     });



</script>



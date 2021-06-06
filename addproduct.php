<?php
session_start();
ob_start();
include "nav.php";
include "errorhandler.php";
if($_SESSION['Role']!=2){

    header("Location:outofreach.php");
  }
  
?>
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>

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
.bold{
        font-weight:bold;
    }
      </style>
  </head>
<body>
<div class="online py-100">
    <div class="container pos   ">
        <div class="row">
            <div class="col-lg">
                <h1 class="head">Add</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form">
                        <input type="text"class="form-control mb-4 border-0 py-4 "id="fname" name="name" placeholder="Product title"><br> 
                        <input type="text"class="form-control mb-4 border-0 py-4 " id="desc" name="desc" placeholder="Description"><br>
                        <input type="text"class="form-control mb-4 border-0 py-4 " id="price" name="price"placeholder="Price"><br>
                        <input type="text"class="form-control mb-4 border-0 py-4 " id="quantity" name="quantity"placeholder="Quantity"><br>
                        <input type="text"class="form-control mb-4 border-0 py-4 " id="brand" name="brand"placeholder="Brand">
                        <label class="bold" for="MajorCategory" >Choose a major category</label>
                         <select name="maCategory" class="form-control mb-4 border-0" id="maCategory">

  <option value="Men">Men</option>
  <option value="Women">Women</option>
  <option value="Both">Both</option>
  <option value="Children">Children</option>
</select>
<label class="bold" for="MinorCategory" >Choose a minor category</label>
<select name="miCategory" class="form-control mb-4 border-0" id="miCategory" onchange="validate()">
<option value="Tops" >Tops</option>
  <option value="Bottoms" selected>Bottoms</option>
  <option value="Shoes">Shoes</option>
  <option value="Accessoires">Accessoires</option>
</select>
<label class="bold" for="Sizes" >Choose the available sizes </label><br>
37  <input type="checkbox" name="offer[]" disabled="disabled" value =37 id="chk1" />
Small  <input type="checkbox" name="offer2[]" value="Small" id="chk1"/><br>


38 <input type="checkbox" name="offer[]" disabled="disabled" value=38 id="chk2" />
Medium <input type="checkbox" name="offer2[]" value="Medium" id="chk2" /><br>
39 <input type="checkbox" name="offer[]" disabled="disabled" value=39 id="chk3" />
Large <input type="checkbox" name="offer2[]" value="Large"  id="chk3" /><br>
40 <input type="checkbox" name="offer[]" disabled="disabled" value=40 id="chk4" />
XLarge <input type="checkbox" name="offer2[]" value="XLarge" id="chk4" /><br>
41 <input type="checkbox" name="offer[]" disabled="disabled"  value=41 id="chk5" /><br />
42 <input type="checkbox" name="offer[]" disabled="disabled" value=42 id="chk6" /><br />
43 <input type="checkbox" name="offer[]" disabled="disabled" value=43 id="chk7" /><br><br>
</select>

<label class="bold" for="Color" >Choose the product's color</label>
                         <select name="color" class="form-control mb-4 border-0" id="color">
                         <option value="Black" >Black</option>
  <option value="White">White</option>
  <option value="Green">Green</option>
  <option value="Yellow">Yellow</option>
  <option value="Red">Red</option>
  <option value="Blue">Blue</option>
  <option value="Cyan">Cyan</option>
  <option value="Pink">Pink</option>
  <option value="Purple">Purple</option>
  <option value="Orange">Orange</option>
  <option value="Gray">Gray</option>
  <option value="Other">Other</option>
</select>

<script>
    function validate(){
       
var a =document.getElementById('miCategory').value;
var check=document.getElementsByName("offer[]");
var check2=document.getElementsByName("offer2[]");
if(a=="Tops"||a=="Bottoms"){
    for (var i = 0; i < check2.length; i++) {
                check2[i].disabled = false;
            
            }
            for (var i = 0; i < check.length; i++) {
                check[i].disabled = true;
            
            }
}
if(a=="Shoes"){
    for (var i = 0; i < check.length; i++) {
                check[i].disabled = false;
                
            }
            for (var i = 0; i < check2.length; i++) {
                check2[i].disabled = true;
                
            }
}



}

$("#price").keypress(function(e) {
      if (String.fromCharCode(e.which).match(/[^0-9_ ]/)) {
        e.preventDefault();
        alert(" You can't enter an alphabet in Price field , Use '0-9'.");
       }
     });
     $("#quantity").keypress(function(e) {
      if (String.fromCharCode(e.which).match(/[^0-9_ ]/)) {
        e.preventDefault();
        alert(" You can't enter an alphabet in Quantity field , Use '0-9'.");
       }
     });
  

     $("#desc").keypress(function(e) {
      if (String.fromCharCode(e.which).match(/[^A-Za-z ]/)) {
        e.preventDefault();
        alert("Special characters and numbers are not allowed in name field. Use 'A-Z', 'a-z'");
       }
     });
     $("#brand").keypress(function(e) {
      if (String.fromCharCode(e.which).match(/[^A-Za-z ]/)) {
        e.preventDefault();
        alert("Special characters and numbers are not allowed in question field. Use 'A-Z', 'a-z'");
       }
     });


</script>
</select>



                        <i class="fa fa-upload icon"></i>
                        <input type="file" class=" inputfile btn w-100 py-3" id="img" name="img" accept="image/*" ><br><br>
                        <input type="submit"class="inputfile btn w-100 py-3" value="Add" name="Submit">
                    </div>
                </form>
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


if(isset($_POST["Submit"]))
{
    if(empty($_POST['name']) || empty($_POST['brand']) || empty($_POST['color']) || empty($_POST['desc']) || empty($_POST['price']) || empty($_POST['quantity']) ||  empty($_POST['maCategory'])||empty($_POST['miCategory']))
	{
        echo "<h5>*Missing fields</h5>";
       
    }
    else
    {
        if(filter_var($_POST["price"],FILTER_VALIDATE_INT)&&filter_var($_POST["quantity"],FILTER_VALIDATE_INT)){


        
        $image=$_FILES['img']['name'];
          move_uploaded_file($_FILES["img"]["tmp_name"], "C:\\\\xampp\htdocs\project\\" . $image);
        $sql="INSERT INTO products (Name,Description,Quantity, Price, Image,maCategory,miCategory,Color,Brand) values('".$_POST["name"]."','".$_POST["desc"]."', '".$_POST["quantity"]."','".$_POST["price"]."','$image','".$_POST["maCategory"]."','".$_POST["miCategory"]."','".$_POST["color"]."','".$_POST["brand"]."')";
        $result=mysqli_query($conn,$sql);
        $newest_id = mysqli_insert_id($conn);
        
        if($_POST['offer']!=null)
        {
            foreach($_POST['offer'] as $checked)
            {
                $sql="INSERT INTO sizes(ID,Size)values('$newest_id','$checked') ";
                $result=mysqli_query($conn,$sql);
            }
        } 
        else 
        {
            foreach($_POST['offer2'] as $checked)
            {
                $sql="INSERT INTO sizes(ID,Size)values('$newest_id','$checked') ";
                $result=mysqli_query($conn,$sql);
            }
        }
        header("Location:manageproducts.php");
    }  else echo "<h5>Price and Quantity must be a number</h5>";
    }
}

?>  

<?
include "footer.php";
 ob_end_flush();
?>
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
       .bold{
        font-weight:bold;
    }
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
                      <input type="text"class="form-control mb-4 border-0 py-4 "id="fname" name="name" placeholder="Product title"><br> 
                      <input type="text"class="form-control mb-4 border-0 py-4 " id="mail" name="desc" placeholder="Description"><br>
                      <input type="text"class="form-control mb-4 border-0 py-4 " name="quantity"placeholder="Quantity"><br>
                      <input type="text"class="form-control mb-4 border-0 py-4 " name="price"placeholder="Price"><br>
                      <input type="text"class="form-control mb-4 border-0 py-4 " name="brand"placeholder="Brand">
                      <label class="bold"for="MajorCategory" >Choose a major category</label>
                         <select name="maCategory" class="form-control mb-4 border-0" id="maCategory">

  <option value="Men">Men</option>
  <option value="Women">Women</option>
  <option value="Both">Both</option>
  <option value="Children">Children</option>
</select>
<label class="bold"for="MinorCategory" >Choose a minor category</label>
<select name="miCategory" class="form-control mb-4 border-0" id="miCategory">

 
  <option value="Tops">Tops</option>
  <option value="Bottoms">Bottoms</option>
  <option value="Shoes">Shoes</option>
  <option value="Accessoires">Accessoires</option>
</select>


<label class="bold"for="Color" >Choose the product's color</label>
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

                      <i class="fa fa-upload icon"></i>
                      <input type="file" class=" inputfile btn w-100 py-3" id="img" name="img" accept="image/*" ><br><br>
                      <input type="submit"class="inputfile btn w-100 py-3" value="update" name="submit">
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


// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);



if(isset($_POST["submit"])){
    
  if(empty($_POST['name']) || empty($_POST['brand']) || empty($_POST['color']) || empty($_POST['desc']) || empty($_POST['price']) || empty($_POST['quantity']) || empty($_POST['maCategory'])||empty($_POST['miCategory']))
	{
        echo "<h5>*Missing fields</h5>";
       
    }
        else
        {
          
        $image=$_FILES['img']['name'];
        move_uploaded_file($_FILES["img"]["tmp_name"], "C:\\\\xampp\htdocs\project\\" . $image);
            
            $sql = "UPDATE products SET Name='".$_POST["name"]."' , Description='".$_POST["desc"]."', Quantity='".$_POST["quantity"]."',Price='".$_POST["price"]."', Brand='".$_POST["brand"]."', Color='".$_POST["color"]."', Image='$image' , maCategory='".$_POST["maCategory"]."' , miCategory='".$_POST["miCategory"]."' WHERE ID='".$_GET['X']."'";

            $result=mysqli_query($conn,$sql);
            if($result)	
            {
                header("Location:manageproducts.php");
            }
            else
            {
                echo $sql;
            }
        }
    }
    
?>

 <?php ob_end_flush(); ?>
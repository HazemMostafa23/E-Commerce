

<?php
ob_start(); 
session_start();
include "nav.php";
include "errorhandler.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Mahma Shop</title>
    <style>
body{
  overflow-x:hidden;
}
.container-fluid{
  position:relative;
}
.box{
  position:absolute;
  top:-80px;
  left:35%;
  z-index:1111111111;
}
.all{
  position:absolute;
  top:0;
  left:0;

}
#pop{
display:none;
background-color:#86868b;
color:black ;
width:500px;
border:2px solid black;
padding:15px 15px 15px 8px;
}
.inputs{
  width:480px;
  position:relative;
}
.questions{
  position:relative;

}
.inputfile{
    position: relative;
    font-size: 1.25em;
    font-weight: 700;
    color: black;
    background-color: transparent;
    display: inline-block;
    cursor: pointer;
    border: 1px solid white;
}

.inputfile:focus,
.inputfile:hover {
    background-color:white;
}
h2{
  color:white;
  text-align:center;
}
.featured-article{
  background-image: url(shoesicon.jpg);
  background-position: center;
    background-size: cover;
    color: #fff;
    padding-top: 20%;
    padding-left: 80px;
    padding-bottom: 80px;
    padding-right: 80px;
}
.right-part h1{
    font-size: 30px;
    font-weight: 700;
}
.right-part h1::before{
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    top: 50px;
    background-color: #ff8d61;
    width: 40%;
    height: 2px;
}
.mt-100{
    margin-top: 100px;
}
.button{
    background-color: #25a9bd;
    padding: 10px 40px;
    color: #fff;
    font-size: 21px;
    transition: .2s ease-in-out;
}
.more:hover{
  text-decoration:none;
}
.footer{
    padding: 100px 0;
}
.full-button button{
    background-color: #191919;
    color: #fff;
    font-size: 20px;
    transition: 0.4s ease-in-out;
    padding-top: 4em;
    padding-bottom: 4em;
}
.full-button button:hover{
    background-color: #25a9bd;
}
.bigbtn{
  color:white;
}
.bigbtn:hover{
  color:white;
  text-decoration:none;
}
h1{

color:white;
text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
}
h1.b1{

color:#573759;
text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
}
p.b1{

  color:grey;
  text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
}
.featured-article2{
  background-image: url(OfferAccessories.png);
  background-position: center;
    background-size: cover;
    color: #fff;
    padding-top: 20%;
    padding-left: 80px;
    padding-bottom: 125px;
    padding-right: 80px;
}
a{
color:White;

}
.btns:hover{
  text-decoration:none;
}
.links{
  color:grey;
}
.links:hover{
  color:blue;
  text-decoration:none;
}
    </style>
  </head>
  <body>
  <header>  
  


<script>

$(document).ready(function(){  

   
  setTimeout(function(){
  
    document.getElementById('pop').style.display="block"; 
    
  },500); // 5000 to load it after 5 seconds from page load
});
 
</script>
  <div class="container-fluid">
    <div class="box">
    <?php 
  if(!empty($_SESSION['Role'])){
  if($_SESSION["Survey"]!=0){
  
      ?>
  <div id="pop">
  <div id="popup">
  <form action="" method="post">
    <?php 
    echo "<h2>Survey</h2>";
    $sql="SELECT * from formsquestions where ID='".$_SESSION["Survey"]."'";
    $result=mysqli_query($conn,$sql);
    $qs[]=array();
    while($row=mysqli_fetch_array($result)){
      $formno=$row[0];
      array_push($qs,$row[2]);
?>
<h5 class="questions"><?php echo $row[1];?></h5>

<input class="inputs form-control mb-4 border-0 "type="text" name="question[]"> </input>
          
 
<?php }
?>
 </div>
<input class="inputfile btn w-100 py-3"type="submit" name="submit">
<input class="inputfile btn w-100 py-3"type="submit" name="later" value="Remind me later">
</div>

</form>

<?php  }
  }
  $valid=true;
if(isset($_POST["submit"])){
for($y=0;$y<count($_POST['question']);$y++){
if($_POST['question']["$y"]==''){
$valid=false;

}

}
if($valid==true){
  $sql = "UPDATE accounts SET Survey='0' WHERE ID='".$_SESSION['ID']."'";
  $result=mysqli_query($conn,$sql);
  $_SESSION["Survey"]=0;
  $i=0;
  foreach( $_POST['question'] as $value) {
       
 $i++;
    $sql="INSERT into formresponses (CID,QID,Response,FID) values ('".$_SESSION['ID']."', '".$qs["$i"]."' ,'$value','$formno')";
    $result=mysqli_query($conn,$sql);
    
   
        }
  $page = $_SERVER['PHP_SELF'];
header("Location:".$page);


      }

}
if(isset($_POST["later"])){
  $_SESSION["Survey"]=0;
  $page = $_SERVER['PHP_SELF'];
  header("Location:".$page);

}

  ?>
    </div>

  <div class="all">

  
          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="Media/back1.jpg" class="d-block w-100">
                <div class="carousel-caption  d-md-block">
                    <h1 class="b1">Mahma Shop</h1>
                    <p class="b1">Life Is Short<br>Make Every Outfit Count </p>
                    <button><a class="btns"href="category.php?X=Men"> Men</a></button>
          
                    <button> <a class="btns"href="category.php?X=Women">Women</a></button>
                </div>
              </div>
              <div class="carousel-item">
                <img src="Media/slide2.jpg" class="d-block w-100">
                <div class="carousel-caption d-md-block">
                    <h1>Lookbook 2015</h1>
                    <p>SHOW YOUR PRODUCTS WITH STYLE</p>
                    <button><a class="btns"href="category.php?X=Children">Children</a></button>
                    <button><a class="btns"href="category.php?X=Accessoires">Accessories</a></button>
                </div>
              </div>
              <div class="carousel-item">
                <img src="Media/slide3.jpg" class="d-block w-100">
                <div class="carousel-caption d-md-block">
                    <h1 class="b1">Brand New Arrivals</h1>
                    <p class="b1">NEW COLLECTION FROM NEW YORK</p>
                    <button><a  class="btns"href="category.php?X=Tops">Tops</a></button>
                    <button><a  class="btns"href="category.php?X=Shoes">Shoes</a></button>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade"  data-slide="prev">
              <span class="carousel-control-prev-icon" ></span> 
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade"  data-slide="next">
              <span class="carousel-control-next-icon" ></span>
            </a>
          </div>
      <div class="tutorials mt-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 ">
            <div class="featured-article">
              <h1><span class="font-weight-bold">Huge discounts</span></h1>
              <h1>20% off our shoes collection</h1>
              <button class="btn text-uppercase font-weight-bold button"> <a class="more" href="category.php?X=Shoes">Check offers ></a> </button>
          
            </div>
          </div>
          <div class="col-lg-6 ">
            <div class="featured-article2">
              <h1><span class="font-weight-bold">Accessories</span></h1>
              <h1>Starts from 50 EGP</h1>
              <button class="btn text-uppercase font-weight-bold button"> <a class="more" href="category.php?X=Accessoires">Check offers ></a> </button>
             
          </div>
        </div>
        </div>
     </div>
    <div class="full-button mt-100" style="width: 100%;">
    <button class=" w-100 border-0 button">
    <?php if(empty($_SESSION['Role'])){?>
      <a class="bigbtn"href="signup.php">Sign Up Now</a>
    <?php }
    else { ?> <a class="bigbtn"href="products.php">View all our products</a>

   <?php }
   ?>
    </button>
  </div>
    <?php include "footer.php"; ?>
  </header>
    
   

  
  </body>
</html>
<?php
ob_end_flush();
?>

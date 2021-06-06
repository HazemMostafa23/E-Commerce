<?php
session_start();
ob_start();
include "nav.php";
include "errorhandler.php";

?>
<style>
body{
  overflow-x:hidden;
}
.bold{

  font-weight:bold;
}

  
  .summary .counter button {
    all: unset;
  }
  
  .summary .add-to-card {
    all: unset;
    background-color:blue;
    color: #fff;
    padding: 7px 35px;
    font-size: 13px;
    border-radius: 40px;
    width:110px;
  }
  .rate{
    position:relative;
    left:150px;
    bottom:30px;
  }
  .name{
    position:relative;
    left:0px;
    color:blue;
  }
  .price{
    color:blue;
    font-size:50px;
  }
  .arrow{
    color:blue;
  }
  .stars{
    color:blue;
  }
  .name{
    color:blue;
    text-align:left;
  }
</style>


             
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);


$sql="SELECT * from products WHERE ID='".$_GET['X']."'";
$result = mysqli_query($conn,$sql);	

while($row=mysqli_fetch_array($result))	
{
  $ID=$row[0];
  $Name=$row[1];
  $Description=$row[2];
  $Price=$row[3];
  $Image=$row[5];
  $maCategory=$row[6];
  $miCategory=$row[7];
  $color=$row[8];
  $brand=$row[9];
}


$sql="SELECT * from sizes WHERE ID='$ID'";
$i=0;
$result = mysqli_query($conn,$sql);	
while($row2=mysqli_fetch_array($result))	
{
$Size[$i]=$row2[1];
$i++;
}
$sql="SELECT * from ratings WHERE ID='$ID'";
$result = mysqli_query($conn,$sql);
$i=0;
while($row=mysqli_fetch_array($result)){
  $check[$i]=$row[2];
  $i++;
}	
$sum=0;
if($i>0){
for($i=0;$i<count($check);$i++){
  $sum=$sum+$check[$i];
}
$Rating=floor($sum/count($check));

}
else $Rating=0;

?>
  <div class="summary py-100">
    <div class="container">
      <div class="row">
        <div class="col-md-5">  
          <img src=<?php echo ($Image); ?> width=300px>
          <span><h2 class="name"><?php echo($Name);?> </h2></span>
        </div>
        <div class="col-md-7">
          <span class="price"><h5><?php echo($Price);?> EGP</h5></span>
          <div class="rate">
          <?php
         if($Rating==5)
         {
         ?>
         <i class="fa fa-star stars"></i>
         <i class="fa fa-star stars"></i>
         <i class="fa fa-star stars"></i>
         <i class="fa fa-star stars"></i>
         <i class="fa fa-star stars"></i>
         <?php 
         }
         else if($Rating==4)
         {
         ?>
         <i class="fa fa-star stars"></i>
         <i class="fa fa-star stars"></i>
         <i class="fa fa-star stars"></i>
         <i class="fa fa-star stars"></i>
         <?php
         }
         else if($Rating==3)
         {
         ?>
         <i class="fa fa-star stars"></i>
         <i class="fa fa-star stars"></i>
         <i class="fa fa-star stars"></i>
         <?php
         }
         else if($Rating==2)
         {
         ?>
         <i class="fa fa-star stars"></i>
         <i class="fa fa-star stars"></i>
         
         <?php
         }
         else if($Rating==1)
         {
         ?>
         <i class="fa fa-star stars"></i>
         <?php 
         }
          else echo "No ratings for this product yet."
          ?>
          </div>
          <form action="" method="post">
          <span class="title"><i class="fa fa-angle-double-down arrow"></i><h6><?php echo($Description);?> </h6></span>
          <span class="title"><i class="fa fa-angle-double-down arrow"></i><h6><?php echo"Major category: $maCategory";?> </h6></span>
          <span class="title"><i class="fa fa-angle-double-down arrow"></i><h6><?php echo"Minor category: $miCategory";?> </h6></span>
          <span class="title"><i class="fa fa-angle-double-down arrow"></i><h6><?php echo"Color: $color";?> </h6></span>
          <span class="title"><i class="fa fa-angle-double-down arrow"></i><h6><?php echo"Brand: $brand";?> </h6></span><br>
          <span class="title"><label for="Choose size" ><h5>Choose the size</h5></label></span>
          <span class="title"><select name="size" id="size"></span>
          <?php for($i=0;$i<count($Size);$i++){
          ?>
          <option value=<?php echo $Size[$i];?>><?php echo $Size[$i]; ?></option>


          <br>
          <?php
          }
          ?>
          </select><br>
      
            <div class="d-flex">
                      <div class="counter border d-inline-block">
                        <button type="button" class="px-3 py-2 border-right" onClick="dec();">-</button>
                        <input type="text"class="counter"size="1" name="quantity" id="counter" readonly value=1></input>
                        <button type="button" class="px-3 py-2 border-left" onClick="inc();">+</button>
                      </div>
          </div><br>
            <span> 
              
            <input type="submit" class="add-to-card font-weight-bold text-uppercase" value="Add to cart" class="home-addtocart" name="addtocart" id="addtocart"></button></span><br>
            </form>
            <span class="title"><h5>Rate this product</h5> </span> 
            <form action="" method="post">
              <input type="radio" id="star5" name="rate" value=5 />
              <label for="star5" title="text">5 Stars</label>
              <input type="radio" id="star4" name="rate" value=4 />
              <label for="star4" title="text">4 Stars</label>
              <input type="radio" id="star3" name="rate" value=3 />
              <label for="star3" title="text">3 Stars</label>
              <input type="radio" id="star2" name="rate" value=2 />
              <label for="star2" title="text">2 Stars</label>
              <input type="radio" id="star1" name="rate" value=1 />
              <label for="star1" title="text">1 Star</label>

          <h5>Review this product</h5>
          <input type="text" id="review" name="review"></input><br><br>

            <input type="submit" class="add-to-card font-weight-bold text-uppercase" name="submit" id="submit" value="Submit Review"><br>
            </form>
            <?php
        
            if(isset($_POST["submit"]))
            { 
              $Rating=$_POST["rate"];
              $sql = "Insert into ratings(ID,Email,Rating,Review) values('$ID','".$_SESSION["Email"]."',$Rating,'".$_POST["review"]."')";
              $result=mysqli_query($conn,$sql);
              header('Location: products.php');
              
            }
            ?>
              
            
 <script>
function inc(){
var counter=document.getElementById("counter").value;
counter++;
document.getElementById("counter").value=counter;

}
function dec(){
  var counter=document.getElementById("counter").value;
  if(counter>1){
counter--;
  }
document.getElementById("counter").value=counter;



}
   </script>

  <?php
  if(isset($_POST["addtocart"])){

$quantity=$_POST['quantity'];
$size=$_POST['size'];



    array_push($_SESSION['cart'],array("Product"=>$Name,"Price"=>$Price,"Quantity"=>$quantity,"Size"=>$size,"ID"=>$ID));
    header('Location: cart.php');
    
  
  


  }
  ?>
  
<span class="title"><h5>Ratings & Reviews</h5></span>
<?php
$sql="SELECT * from ratings WHERE ID='$ID'";
$result = mysqli_query($conn,$sql);	

while($row=mysqli_fetch_array($result)){
  ?>

<?php echo"<h6>By:</h6> <h6 class='bold'>$row[1]</h6>";?> 
 <span class="title"><h6><?php echo"$row[3]";?> </h6></span>
 <?php
 
if($row[2]==5)
{
?>
<i class="fa fa-star stars"></i>
<i class="fa fa-star stars"></i>
<i class="fa fa-star stars"></i>
<i class="fa fa-star stars"></i>
<i class="fa fa-star stars"></i>
<?php 
}
else if($row[2]==4)
{
?>
<i class="fa fa-star stars"></i>
<i class="fa fa-star stars"></i>
<i class="fa fa-star stars"></i>
<i class="fa fa-star stars"></i>
<?php
}
else if($row[2]==3)
{
?>
<i class="fa fa-star stars"></i>
<i class="fa fa-star stars"></i>
<i class="fa fa-star stars"></i>
<?php
}
else if($row[2]==2)
{
?>
<i class="fa fa-star stars"></i>
<i class="fa fa-star stars"></i>
<?php
}
else if($row[2]==1)
{
?>
<i class="fa fa-star stars"></i><br>
<?php 

}


}



?>


</div>
</div>
</div>


</div>
<?php 
if(!empty($_SESSION['Email'])){
 $sql= "SELECT * FROM ratings where Email='".$_SESSION["Email"]."' AND ID='$ID'";
 $result=mysqli_query($conn,$sql);
 $num_rows = mysqli_num_rows($result);
if($num_rows >= 1){
 
 $checker=1;

 }
 
}
else $checker=2;
 
?>
<script>

(function() {
   

  var check=document.getElementsByName("rate");
  var checker = "<?php echo $checker; ?>";

  if(checker==1){
    document.getElementById("submit").disabled = true; 
    document.getElementById("review").disabled=true;
  for (var i = 0; i < check.length; i++) {
                check[i].disabled = true;
              }
  }
  if(checker==2){
    for (var i = 0; i < check.length; i++) {
                check[i].disabled = true;
              }
    document.getElementById("submit").disabled = true; 
    document.getElementById("addtocart").disabled = true; 
    document.getElementById("review").disabled=true;
  }
})();
</script>

<?php
 ob_end_flush(); 
 include "footer.php";
?>
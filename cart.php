<?php
session_start();
ob_start();
include "nav.php";
include "errorhandler.php";
if($_SESSION['Role']!=1){

    header("Location:outofreach.php");
  }
  
$counter=0;
foreach($_SESSION['cart'] as $array){
    $counter++;
}

?>
<html>
  <head>
  <link rel="stylesheet"href="cart.css">    
    <style>
        body{
            overflow-x: hidden;
        }
        table,th,td,tr{
            border:1px solid black;
        }
        th,td{
            padding: 15px;
            text-align: left;
        }
        th{
            background-color: grey;
            color: white;
        }
        .counter{
            color:blue;
        }
        .sub,.total{
            color:blue;
        }
        table{
            width: 50%;
        }
        .cart-items,.cart-heading{
            position:relative;
   
        }
        .cart-total{
            position:relative;

        }
        .checkout{
            position: relative;
            top:50px;
            font-size: 1.25em;
            font-weight: 700;
            color: white;
            background-color: rgb(121, 117, 117);
            display: inline-block;
            cursor: pointer;
            border: 1px solid black;
            width:200px;
            height:50px;
        }
        .checkout:hover{
            background-color:grey;
        }
    
    </style>
  </head>
  <body>
      
        <div class="container ">
            <div class="row">
                <div class="col-lg">

             
            <div class="cart">
             <h2 class="cart-heading">You have <span class="counter"><?php echo $counter?></span> products in your cart</h2><br>
                <table class="cart-items">
                    <thead>
                        <tr>
                        <th>ID</th>
                            <th>Product </th>
                            <th>Price </th>
                            <th>Quantity </th>    
                                <th>Size</th>
                            <th>Subtotal </th>
                            <th>Select</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <div class="items-table-parent"></div>
                    </tbody>
                    <?php 
                     $sum=0;
                     $item=0;
                     ?>
                     <form action="" method="post">
                     <?php
 foreach($_SESSION['cart'] as $array){
     ?>
    <tr>
    <td><?php echo $item."<br />";?></td>
   <td><?php echo $array['Product']."<br />";?></td>
   <td><?php echo $array['Price']."<br />";?></td>
   <td><?php echo $array['Quantity']."<br />";?></td>
   <td><?php echo $array['Size']."<br />";?></td>
   <?php $total=$array['Price']*$array['Quantity'];
   ?>
   <td><?php echo $total;
   $sum=$sum+$total;
   ?></td>
   <td><input type="checkbox" value="<?php echo $item; ?>" name="check[ ]"></td>
   
   

    </tr>
    <?php
    
    $item++;
  }

  ?>
 </table>

 <input type="submit"  name="delete" class="checkout" value="Remove item(s)">
 </form><br>
   <br>
                <table class="cart-total"><br>
                    <h2 class="cart-total">Cart total</h2>
                   <br>
                   <form action="" method="post">
                    <tr>
                        <th>total</th>
                        <td class="total"><?php echo $sum?></td>
                    </tr>
                </table>
            
                <input type="submit"  name="submit" class="checkout" value="Check Out">
                <input type="submit"  name="reset" class="checkout" value="Reset">
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
   if(isset($_POST["submit"])){
       $sql="INSERT INTO orders (Email,Amount,CID) values ('".$_SESSION["Email"]."','$sum','".$_SESSION["ID"]."')";
       $result=mysqli_query($conn,$sql);
       $newest_id = mysqli_insert_id($conn);
       foreach($_SESSION['cart'] as $array){

        $sql="INSERT INTO orderedproducts(ID,Product,Quantity,Size,Price,PID) values ('".$newest_id."','".$array['Product']."','".$array['Quantity']."','".$array['Size']."','".$array['Price']."','".$array['ID']."')";
        $result=mysqli_query($conn,$sql);


       }

header("Location:homeee.php");

       $_SESSION['cart']=array();

   }
   if(isset($_POST["delete"])){
 
    
    for ($i=0; $i<count($_POST['check']);$i++) { 
        $remove_id=$_POST['check']["$i"];
        array_splice($_SESSION["cart"], $remove_id, 1);

    }
    header("Location:cart.php");
   }
   if(isset($_POST["reset"])){
    $_SESSION['cart']=array();
    header("Location:cart.php");
   }

?>
<?php

ob_end_flush();
?>
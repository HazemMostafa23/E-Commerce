<html>
  <?php ob_start();
  ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
 
    <style>

.py-100{
    padding: 100px 0;
}

.navbar-light .navbar-nav .nav-link{
    color: black;
    font-size: 14px;
}
.navbar-light .navbar-nav .nav-link.active{
    color: #427ed1;
}
.carousel-caption{
    top: 50%;
    left:50%;
    transform:translate(-50%,-50%);
    padding: 0;
    width: 100%;
}
.carousel-caption h1{
    font-size: 80px;
}
.carousel-caption p{
    font-size: 24px;
    letter-spacing: 3px;
}
.carousel-caption button{
    background-color: transparent;
    color: white;
    border:1px solid white;
    padding: 7px 25px;
    font-size: 20px;
    border-radius: 20px;
}
.carousel-item img{
    height: 79vh;
}
.account{
    color:black;
}
.account:hover{
    text-decoration: none;
}
.featured .image .inner{
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height:0;
    overflow: hidden;
    color: #ccc;
    background-image: linear-gradient(to top,#f0a6d2 0,rgba(66,126,209,0.925)100%);
    transition: .4s ease-in-out;
    opacity: 0;
}
.featured .image:hover .inner{
    height: 100%;
    opacity: 1;
}
.ppimage{
    width:50px;
    height:50px;
    border-radius:25px;
}
body{
    overflow-x:hidden
}

.sicon{
    color:black;
}
.sicon:hover{
    text-decoration:none;
}
    </style>
        <div class="container">
          <div class="row upper-nav justify-content-center align-items-center">
            <div class="col-lg-6">
              <div class="icons text-muted text-center text-lg-left">
                <i class="fa fa-facebook-f mr-2"></i>
                <i class="fa fa-twitter mr-2"></i>
                <i class="fa fa-instagram mr-2"></i>
                <i class="fa fa-youtube mr-2"></i>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="upper-links text-muted text-right">
             
              
             <?php if(!empty($_SESSION['Role'])) { 
             ?>
               <img class="ppimage"src=<?php echo $_SESSION['Image'];?>>
              
    
         
          <span class="d-inline-block p-3"><?php echo "Welcome ".$_SESSION['Name']; ?></span>
                <span class="d-inline-block p-3 border-right border-left"><a class="account"href="editprofile.php">Edit Profile</a></span>
                
                <span class="d-inline-block p-3 border-right border-left"><a class="account"href="signout.php">Sign Out</a></span>
                
		<?php		} else { ?>
      <span class="d-inline-block p-3"><a class="account"href="signup.php">Sign up</a></span>
                <span class="d-inline-block p-3 border-right border-left"><a class="account"href="login.php">Log in</a></span>
                
               
                  
                  <?php }
                    if(!empty($_SESSION['Role'])&& $_SESSION['Role']==1){?>
                      <span class="d-inline-block py-3 bg-light text-uppercase"><i class="fa fa-shopping-cart"></i>
                      <a class="sicon"href="cart.php">Cart</a></span><?php

                    } ?>
              
               
              </div>
            </div>
          </div>
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-0">
              <img src="logo2.png"width=200px>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item p-3">
                  <a class="nav-link active" href="homeee.php">Home</a>
                </li>
                <?php if(!empty($_SESSION['Role'])&& $_SESSION['Role']==2 ) { ?>
<li class="nav-item p-3">
<a class="nav-link" href="ViewUsers.php">View Users </a>
</li>
<li class="nav-item p-3">
<a class="nav-link " href="employees.php">Employees</a>

</li>
<li class="nav-item p-3">
<a class="nav-link " href="manageproducts.php">Manage Products</a>
</li>
<li class="nav-item p-3">
<a class="nav-link " href="complaints.php">Complaints</a>
</li>
<li class="nav-item p-3">
<a class="nav-link " href="achat.php">Messages</a>
</li>
<li class="nav-item p-3">
<a class="nav-link " href="orders.php">Issued Orders</a>
</li>
</a>


               <?php }
             else if(!empty($_SESSION['Role'])&& $_SESSION['Role']==4 ) { ?>
              <li class="nav-item p-3">
              <a class="nav-link" href="ViewUsersAuditor.php">View Users </a>
              </li>
              <li class="nav-item p-3">
              <a class="nav-link" href="addform.php">Add a form </a>
              </li>
              <li class="nav-item p-3">
              <a class="nav-link" href="manageforms.php">Manage forms</a>
              </li>
              <li class="nav-item p-3">
              <a class="nav-link" href="Misbehaviour.php">Complain to an HR</a>
              </li>
              <li class="nav-item p-3">
              <a class="nav-link " href="achat.php">Messages</a>
              </li>
              <?php }
                else if(!empty($_SESSION['Role'])&& $_SESSION['Role']==3 ) { ?>
                  <li class="nav-item p-3">
                  <a class="nav-link" href="penalties.php">Penalties </a>
                  </li>
                  <li class="nav-item p-3">
                  <a class="nav-link" href="acomplaints.php">Deal with complaints</a>
                  </li>
                  
                  <?php }

               else { 
               if(!empty($_SESSION['Role'])&&$_SESSION['Role']==1){
                 ?>
               <li class="nav-item p-3">
              <a class="nav-link"href="contactus.php">Contact Us</a>
              </li>
              <li class="nav-item p-3">
              <a class="nav-link"href="messages.php">Chat with Us</a>
              </li>
              <li class="nav-item p-3">
                  <a class="nav-link " href="myorders.php">My Orders</a>
                </li>
              <?php }?>
              <li class="nav-item p-3">
                  <a class="nav-link " href="products.php">Products</a>
                </li>

                <li class="nav-item p-3 position-static">
                  <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink"
                    data-toggle="dropdown">
                    Categories
                  </a>

                 
                         <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <div class="container">
    
                      <div class="row">
                        <div class="col-3">
                          <a href="category.php?X=Men" class="dropdown-item my-3">
                            <h6 class="mb-3">Men</h6>
                            <img src="Media/promotion_men_img.jpg" class="img-fluid" alt="">
                          </a>
                        </div>
                        <div class="col-3">
                          <a href="category.php?X=Women" class="dropdown-item my-3">
                            <h6 class="mb-3">Women</h6>
                            <img src="Media/promotion_women_img.jpg" class="img-fluid" alt="">
                          </a>
                        </div>
                        <div class="col-3">
                          <a href="category.php?X=Children" class="dropdown-item my-3">
                            <h6 class="mb-3">Children</h6>
                            <img src="Media/children.jpg" class="img-fluid" alt="">
                          </a>
                        </div>
                        <div class="col-3">
                          <a href="category.php?X=Accessoires" class="dropdown-item my-3">
                            <h6 class="mb-3">Accessories</h6>
                            <img src="Media/sidebar_promotion_img.jpg" class="img-fluid" alt="">
                          </a>
                        </div>
                        <div class="col-3">
                          <a href="category.php?X=Tops" class="dropdown-item my-3">
                            <h6 class="mb-3">Tops</h6>
                            <img src="Media/tops.jpg" class="img-fluid" alt="">
                          </a>
                        </div>
                        <div class="col-3">
                          <a href="category.php?X=Bottoms" class="dropdown-item my-3">
                            <h6 class="mb-3">Bottoms</h6>
                            <img src="Media/bottoms.jpg" class="img-fluid" alt="">
                          </a>
                        </div>
                        <div class="col-3">
                          <a href="category.php?X=Shoes" class="dropdown-item my-3">
                            <h6 class="mb-3">Shoes</h6>
                            <img src="Media/promotion_accessories_img.jpg" class="img-fluid" alt="">
                          </a>
                        </div>
                        <li class="nav-item p-3">
                <input type="text" id="gsearch" name="gsearch">
                <a class="nav-link" href ="javascript:openPage()"><i class="fa fa-search"></i></a>
                <?php }
                 ?>
          
                
                      
               
                      </div>
                    </div>
                  </div>
                </li>
                
               
                <form>
              
              

          

<script>

openPage = function() {
  var key=document.getElementById("gsearch").value;
location.href = "search.php?Key="+key;
}
</script>
                  
                    </form>
                </li>
              </ul>
            </div>
          </nav>
        </div>
</div>
<?php ob_end_flush();?>


</html>
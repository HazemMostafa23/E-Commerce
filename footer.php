<?php ob_start();
?>
<html>
<head>
<style>
body{
  overflow-x:hidden;
  margin-bottom:0px;
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
background-color:#427ed1;
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
    color: white;
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
  color:black;
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
<div class="footer container">
        <div class="row">
          <div class="col-lg-3">
            <h3 class="mb-4">MAHMA online shop</h3>
            <p class="text-muted">We connect people and products  opening up a world of possibility. From bracelets and backpacks to tshirts and shorts – we give you access to everything you need and want. Our range is unparalleled, and our prices unbeatable.</p>
          </div>
          <div class="col-lg-3">
            <h6 class="mb-4 ">Useful links</h6>
            <ul class="list-group list-group-flush"> 
              <li class="list-group-item  text-muted">><a class="links"href="signup.php">Sign up</a></li>
              <li class="list-group-item text-muted"> ><a class="links"href="login.php">Login</a></li>
            </ul> 
          </div>
          <div class="col-lg-3">
            <h6 class="mb-4 ">Our products</h6>
            <ul class="list-group list-group-flush"> 
              <li class="list-group-item  text-muted">><a class="links"href="category.php?X=Men">Men</a></li>
              <li class="list-group-item text-muted"> ><a class="links"href="category.php?X=Women">Women</a></li>
              <li class="list-group-item text-muted"> ><a class="links"href="category.php?X=Children">Children</a></li>
              <li class="list-group-item text-muted"> ><a class="links"href="category.php?X=Accessoires">Accessoires</a></li>
              <li class="list-group-item text-muted"> ><a class="links"href="category.php?X=Tops">Tops</a></li>
              <li class="list-group-item text-muted"> ><a class="links"href="category.php?X=Bottoms">Bottoms</a></li>
              <li class="list-group-item text-muted"> ><a class="links"href="category.php?X=Shoes">Shoes</a></li>
            </ul> 
          </div>
          <div class="col-lg-3">
            <h6 class="mb-4 ">Contact Us</h6>
            <ul class="list-group list-group-flush"> 
              <li class="list-group-item text-muted"><i class="fa fa-facebook-f mr-2">https://facebook.com/MAHMA</i></li>
              <li class="list-group-item text-muted"><i class="fa fa-twitter mr-2">https://twitter.com/MAHMA</i></li>
              <li class="list-group-item text-muted"><i class="fa fa-instagram mr-2">https://instagram.com/MAHMA</i></li>
              <li class="list-group-item text-muted"><i class="fa fa-youtube mr-2">https://youtube.com/MAHMA</i></li>
            </ul> 
          </div>
        </div>
      </div>
</body>
</html>
<?php ob_end_flush();
?>
<?php 
ob_start();
session_start(); 
ob_start();
include "nav.php";
include "errorhandler.php";
if($_SESSION['Role']!=1){

  header("Location:outofreach.php");
}
?>
<html>
  <head>
    <style>
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
table{
  width: 100%;
  position:relative;
}
body{

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
h3{
    position: relative;
    bottom:150px;
    left:400px;
    color : blue;
}
a{
color:blue;	
}
a:hover{
color:blue;	
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
.head2{
    text-align:center;
}
.Active{
  color:green;
}

    </style>
  </head>
<body>
<div class="online py-100">
        <div class="container pos">
            <div class="row">
                <div class="col-lg">
                  <h1 class="head">Chat</h1>
                  <form action="" method="post">
                    <div class="form">
                      <input type="Name"class="form-control mb-4 border-0 py-4 "id="fname" name="title" placeholder="Your issue"><br>
                      <input type="submit"class="inputfile btn w-100 py-3" value="Start chatting" name="Submit">
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div><br>
</body>
</html>
<div class="row">
  <div class="container">
    <div class="col-lg">

 
<h1 class="head2">Your recent chats</h1>
<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);
?>
<table>
	  <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Status</th>
      <th>Reply</th>
	  </tr>

    <?php
       if(isset($_POST["Submit"])){
         if(!empty($_POST["title"])){
         $sql="INSERT INTO messages (CID,Title)values('".$_SESSION["ID"]."','".$_POST["title"]."') ";
         $result=mysqli_query($conn,$sql);
         $newest_id = mysqli_insert_id($conn);
          header('Location: userchat.php?X='.$newest_id);
         }else echo "<h3>Please enter a title</h3>";

      }
      
      $sql="SELECT * from messages where CID='".$_SESSION["ID"]."'";
$result = mysqli_query($conn,$sql);	

while($row=mysqli_fetch_array($result))
{
  echo"<tr>";
  echo" <td>$row[0]</td>";
  echo" <td>$row[3]</td>";
?>
  <?php 
  if($row[4]==0){?>
  <td class="Active">Active</td>
  <td><a class="actions"href="userchat.php?X=<?php echo $row["ID"]; ?>" id="reply">Reply</a></td>
  <?php 
  } else if($row[4]==1) { ?> 
  <td>Closed</td>
  <td><a class="actions" href="userchat.php?X=<?php echo $row["ID"]; ?>">View chat</a></td>
  <?php
  }

  echo"</tr>";

}
echo"</table>";
?>
   </div>
  </div>
</div>
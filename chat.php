<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
<style>

.container{
    max-width:1170px; 
    margin:auto;
}
img{ 
    max-width:100%;
}
.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.received_withd_msg { 
    width: 57%;
}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ 
    overflow:hidden; margin:26px 0 26px;
}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {
    border-top: 1px solid #c4c4c4;position: relative;
}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { 
    padding: 0 0 50px 0;
    position:relative;
    left:200px;
}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
</style>
</html>
<?php 
session_start(); 
ob_start();
include "nav.php";
include "errorhandler.php";
if($_SESSION['Role']!=4&&$_SESSION['Role']!=2){

  header("Location:outofreach.php");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql="SELECT * from messages WHERE ID='".$_GET["X"]."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
if($row[4]==1){

	$check=false;
}
else $check=true;

$sql="SELECT * from chats WHERE ID='".$_GET["X"]."'";
$result=mysqli_query($conn,$sql);
?>	
  <body>
        <div class="container">
            <div class="messaging">
                <div class="mesgs">
				<div class="msg_history">
	<?php

while($row=mysqli_fetch_array($result)){
    $uid=$row[2];
    $sql2="SELECT * from accounts where ID='$uid'";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($result2);
	if($row2[8]==1){
		?>
		
		<div class="incoming_msg">

							<div class="received_msg">
								<div class="received_withd_msg">
		        <p><?php echo $row2[1]; echo ":"; echo $row[1];?> </p>
				</div>
                                </div>
                        </div>
                              
       
<?php
    }
	if($row2[8]==2){
?>
 <div class="outgoing_msg">
 
                            <div class="sent_msg">
                                <p><?php echo $row2[1]; echo ":"; echo $row[1];?>
                                </p>
                                <?php if($_SESSION["Role"]==4){?>
                                
                                <span><a class="actions"href = "comment.php?X=<?php echo $row[3]; ?> &Y=<?php echo $_GET['X'];?>">Comment</a></span>
                                <?php 
                                }
                                ?>
                            </div>
	</div>
                       



<?php
}
}

?>
<form action="" method="post">
<div class="type_msg">
                            <div class="input_msg_write">
							<?php if($_SESSION["Role"]!=4){
              if($check==false){?>
                                <input type="text" name="message" disabled class="write_msg" placeholder="Type a message" />
                                    <button class="msg_send_btn" name="closed" type="submit" disabled type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                            </div>
							<?php
						} else {?>
							<input type="text"  name="message" class="write_msg" placeholder="Type a message" />
							<button class="msg_send_btn" name="submit" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
							<button type="submit" name="close" class="close">&times;</button>
					</div>

							<?php }
              }
							?>
							</form>
                        </div>
            </div>
        </div>
		</div>
    </body>

	
   <?php

if(isset($_POST["submit"])){
$sql="INSERT into chats (ID,Message,UID) values ('".$_GET["X"]."','".$_POST["message"]."','".$_SESSION["ID"]."') ";
$result=mysqli_query($conn,$sql);
$sql2 = "UPDATE messages SET AID ='".$_SESSION["ID"]."' WHERE ID='".$_GET['X']."'";
$result2=mysqli_query($conn,$sql2);
$page = $_SERVER['PHP_SELF'];
header("Location:".$page."?X=".$_GET["X"]);

}
if(isset($_POST["close"])){
$sql2 = "UPDATE messages SET Status ='1' WHERE ID='".$_GET['X']."'";
$result2=mysqli_query($conn,$sql2);
header("Location:homeee.php");
}

?>

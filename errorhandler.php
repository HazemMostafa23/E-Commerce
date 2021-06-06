<style>
h5.error{
    position: relative;
  
    left:600px;
    color : blue;
}
</style>
<?php

function customError($errno,$errmsg,$errfile,$errline)
{
$message=" Error no:".$errno." Error Message:".$errmsg." File name: " .$errfile." Line:".$errline;
error_log($message,3,"error_logs.txt");
?> <h5 class="error"> <?php die("Fatal error , cant proceed.");?></h5>

<?php
}
set_error_handler("customError");
?>
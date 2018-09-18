<?php
session_start();
if (!isset($_SESSION["id"])) {
	session_destroy();
	header("Location: http://localhost/oly/olyphp/login.php");
}

require('db_details.php');

$pid=$_REQUEST["pro_id"];



$sql="UPDATE product SET p_status='false' WHERE pid='".$pid."'";
if(mysqli_query($conn,$sql)){
	echo "false";
}else{
	echo "something went wrong!";
}


?>
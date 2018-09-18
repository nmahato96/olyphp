 <?php
require('db_details.php');

 $id=trim($_REQUEST["pid"]);

 $sql = "DELETE FROM product WHERE pid='".$id."'";
if (mysqli_query($conn,$sql)) {
	echo "deleted";
}else{
	echo "not";
}

  mysqli_close($conn);
 ?> 
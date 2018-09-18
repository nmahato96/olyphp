 <?php
require('db_details.php');

 $uemail=trim($_REQUEST["email"]);
 $upass=trim($_REQUEST["pass"]);
 $conv_pass=md5($upass);
 $sql = "SELECT * FROM user WHERE email='".$uemail."' AND password='".$conv_pass."'";
 $result = mysqli_query($conn, $sql);

 if (mysqli_num_rows($result) > 0) {
    // output data of each row
 	while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
 		if ($row["token"]=="") {
 			session_start();
 			$_SESSION["id"]=$row["id"];
			$_SESSION["name"]=$row["name"];
			$_SESSION["email"]=$row["email"];
			echo "login";
 		}else{
 			echo "link";
 		}
 	}
 } else {
 	echo "wrong";
 }
 mysqli_close($conn);
 ?> 
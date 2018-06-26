<?php 
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="oly";
	
	// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$uname = trim($_REQUEST["name"]);
		$uemail = trim($_REQUEST["email"]);
		$upass = trim($_REQUEST["pass"]);
		$cpass = trim($_REQUEST["cpass"]);
			
		if( $uname == "" || $uemail == "" || $upass == ""){
			echo "Please fill all fields!";
		}else{
			if( $upass == $cpass){
				$conv_pass = md5($upass);
				$sql = "INSERT INTO user (name, email, password, status)
				VALUES ('".$uname."', '".$uemail."', '".$conv_pass."', 'false')";

				if (mysqli_query($conn, $sql)) {
					echo "true";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}else{
				echo "Passwords don't match!";
			}
		}

		mysqli_close($conn);
?>
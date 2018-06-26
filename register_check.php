<?php 
	$servername="localhost";
	$username="root";
	$password="aapna@123";
	$dbname="olyphp";
	
	// $servername="localhost";
	// $username="root";
	// $password="";
	// $dbname="oly";
	
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
			if(strlen($upass)<5){
				echo "Password must contain atleast 5 characters.";
			}else{
				if( $upass == $cpass){
					$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
					if( preg_match($pattern,$uemail)){
						$conv_pass = md5($upass);
						
						
						
						$sql = "SELECT * FROM user WHERE email='".$uemail."'";
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								if($row["status"]=="false"){
									echo "registration incomplete. Please check mail.";
								}else{
									echo "Already Registered!";
								}
							}
						} else {
								$sql = "INSERT INTO user (name, email, pass, status)
								VALUES ('".$uname."', '".$uemail."', '".$conv_pass."', 'false')";

								if (mysqli_query($conn, $sql)) {
									echo "true";
								} else {
									echo "Error: " . $sql . "<br>" . mysqli_error($conn);
								}
							}	
					}else{
						echo "invalid email";
					}
					
				}else{
					echo "Passwords don't match!";
				}
			}
		}

		mysqli_close($conn);
?>
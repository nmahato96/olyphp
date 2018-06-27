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
									
									
									/****** php mailer start ****/	
									require 'PHPMailerAutoload.php';
									require 'credentials.php';
									$mail = new PHPMailer;

									//$mail->SMTPDebug = 4;                               // Enable verbose debug output

									$mail->isSMTP();                                      // Set mailer to use SMTP
									$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
									$mail->SMTPAuth = true;                               // Enable SMTP authentication
									$mail->Username = EMAIL;                 // SMTP username
									$mail->Password = PASS;                           // SMTP password
									$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
									$mail->Port = 587;                                    // TCP port to connect to

									$mail->setFrom(EMAIL, 'Oly Services');
									$mail->addAddress($uemail);     // Add a recipient
											   // Name is optional
									$mail->addReplyTo(EMAIL);

										   // Add attachments
									//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
									$mail->isHTML(true);                                  // Set email format to HTML

									$mail->Subject = 'Account Verification';
									$mail->Body    = 'Click on the link to verify your account.<br><a>https://www.google.com</a>';
									$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

									if(!$mail->send()) {
										// echo 'Message could not be sent.';
										// echo 'Mailer Error: ' . $mail->ErrorInfo;
										
									} else {
										// echo 'Message has been sent';
										echo "true";
									}
									
									/****** php mailer end ****/	
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
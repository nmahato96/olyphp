<?php

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
		
		<link rel="stylesheet" href="css/custom.css">
		
		<!-- Fontawesome icons -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="container">
			<?php include 'header.php'; ?>
			<section>
			<p class="form_title">Register</p>
				<form class="registration">
					<div class="register_container">
						<label for="name">Name</label><input type="text" id="name_reg" required><br/>
						<label for="email">Email</label><input type="email" id="email_reg" required><br/>
						<label for="pass">Password</label><input type="password" id="pass_reg" required><br/>
						<label for="cpass">Confirm Password</label><input type="password" id="cpass_reg" required><br/>
						<input type="checkbox" value="remember_me"><span>Remember me</span>
						<div class="register_submit">
							<input type="button" value="Register" onclick="register_check();">
						</div>
						
					</div>
					<div class="register_info">
						<p>By registering, you get access to <b>My Account where you can:</b></p>
						<br>
						<ul>
							<li><i class="fas fa-arrow-right"></i>&nbsp;Manage your Ads (Edit, Delete, Upgrade)</li>
							<li><i class="fas fa-arrow-right"></i>&nbsp;Check responses to your Ads</li>
							<li><i class="fas fa-arrow-right"></i>&nbsp;Track payments</li>
							<li><i class="fas fa-arrow-right"></i>&nbsp;Manage your settings</li>
						</ul>
					</div>
				</form>
				<div class="reg_mail_ver_panel no_display">
					<div class="mail_ver_img">
						<i class="fas fa-check"></i>
					</div>
					<div class="mail_ver_info">
						<p>A link is sent to your mail. Click on the link to activate your accout.</p>
					</div>
				</div>
			</section>
		</div>
		<?php include 'footer.php';?>
	</body>
	<script src="js/custom.js"></script>
</html>
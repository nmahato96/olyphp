<?php
session_start();
if(isset($_REQUEST["id"])){
	$_SESSION["id"]=$_REQUEST["id"];
}
if(isset($_REQUEST["name"])){
	$_SESSION["name"]=$_REQUEST["name"];
}
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
				<form id="login_page_form" action="login_verify.php" method="post">
					<p class="form_title">Login</p>
					<div class="login_main_container">
						<div class="login_container">
							<label for="email">Email</label><input type="email" id="l_email" name="email"><br/>
							<label for="pass">Password</label><input type="password" id="l_pass" name="pass"><br/>
							<input type="checkbox" value="remember_me"><span>Remember me</span>
							<div class="login_submit">
								<input type="button" onclick="login_check();" value="Log in">
							</div>
						</div>
						<div class="register">
							<a href="#">Unable to Login</a>
							<a href="register.php">Register</a>
						</div>
					</div>
				</form>
				<div class="login_social">
				
				</div>
			</section>
		</div>
		<?php include 'footer.php';?>
	</body>
	<script src="js/custom.js"></script>
</html>
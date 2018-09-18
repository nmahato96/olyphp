<?php
session_start();
if (!isset($_SESSION["id"])) {
	session_destroy();
	header("Location: http://localhost/oly/olyphp/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>OLY</title>
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
			<div class="ad_updated">
				<h2>Ad updated successfully!<br>It will be visible after a few minutes</h2>
				<p>See how your ad looks</p>
				<a class="viewAd" href="view_ad.php">View Ad</a>
				<a class="submit_another_ad">Submit another Ad</a>
				<a class="back_to_home_page">Back to home page</a>
				<a class="ad_updated_share_on_fb"><i class="fab fa-facebook-f"></i>&nbsp;Share on Facebook</a>
			</div>
		</section>
	</div>
	<?php include 'footer.php';?>
</body>
</html>
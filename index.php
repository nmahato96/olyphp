<?php


session_start();

require('db_details.php');

#REGISTRATION DATA
if (isset($_REQUEST["t"])) {

	$token=$_REQUEST["t"];
	$sql_index = "SELECT * FROM user WHERE token=".$token;
	$result_index=mysqli_query($conn,$sql_index);

	if (mysqli_num_rows($result_index)>0) {
		echo "<script>alert('Enjoy OLY!');</script>";
		while ($row=mysqli_fetch_assoc($result_index)) {
			$_SESSION["id"]=$row["id"];
			$_SESSION["name"]=$row["name"];
			$_SESSION["email"]=$row["email"];
			$_SESSION["token"]=$row["token"];
		}
		$sql_del="UPDATE user SET token=NULL WHERE id=".$_SESSION["id"];
		mysqli_query($conn,$sql_del);
		header("Location: http://localhost/oly/olyphp/index.php");
	}else{
		echo "<script>alert('You are already registered or your token has expired');</script>";
		session_destroy();
	}
}

#LOGIN DATA
else{
	//ELSE NOT REQUIRED LOGIN DONE FROM LOGIN_VERIFY.PHP
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
			<div class="search_bar">
				<form method="post">
					<input type="text" name="place" id="search_place" placeholder="All India"> 
					<input type="text" name="ad" id="search_ads_input"  placeholder="35,03,895 Ads near You">
					<input type="button" id="search_ads_submit" value="Search">
				</form>
			</div>
			<div class="index_category_icons_container">
				<div class="index_category_icons">
					<div class="category_img" id="property_img">
						<img src="img/olx.png">
					</div>
					<p><a href="marketplace.php?category=Properties">Properties</a></p>
				</div>
				<div class="index_category_icons">
					<div class="category_img" id="cars_img">
						<img src="img/olx.png">
					</div>
					<p><a href="marketplace.php?category=Cars">Cars</a></p>
				</div>
				<div class="index_category_icons">
					<div class="category_img" id="electronics_img">
						<img src="img/olx.png">
					</div>
					<p><a href="marketplace.php?category=Electronics">Electronics &amp; Appliances</a></p>
				</div>
				<div class="index_category_icons">
					<div class="category_img" id="furniture_img">
						<img src="img/olx.png">
					</div>
					<p><a href="marketplace.php?category=Furniture">Furniture</a></p>
				</div>
				<div class="index_category_icons">
					<div class="category_img" id="jobs_img">
						<img src="img/olx.png">
					</div>
					<p><a href="marketplace.php?category=Jobs">Jobs</a></p>
				</div>
				<div class="index_category_icons">
					<div class="category_img" id="mobiles_img">
						<img src="img/olx.png">
					</div>
					<p><a href="marketplace.php?category=Electronics">Mobiles</a></p>
				</div>
				<div class="index_category_icons">
					<div class="category_img" id="bikes_img">
						<img src="img/olx.png">
					</div>
					<p><a href="marketplace.php?category=Bikes">Bikes</a></p>
				</div>
				<div class="index_category_icons">
					<div class="category_img" id="books_img">
						<img src="img/olx.png">
					</div>
					<p><a href="marketplace.php?category=Books">Books, Sports &amp; Hobbies</a></p>
				</div>
				<div class="index_category_icons">
					<div class="category_img" id="fashion_img">
						<img src="img/olx.png">
					</div>
					<p><a href="marketplace.php?category=Fashion">Fashion</a></p>
				</div>
				<div class="index_category_icons">
					<div class="category_img" id="pets_img">
						<img src="img/olx.png">
					</div>
					<p><a href="marketplace.php?category=Pets">Pets</a></p>
				</div>
				<div class="index_category_icons">
					<div class="category_img" id="services_img">
						<img src="img/olx.png">
					</div>
					<p><a href="marketplace.php?category=Services">Services</a></p>
				</div>
			</div>
		</section>
	</div>
	<?php include 'footer.php';?>
</body>
</html>
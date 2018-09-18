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
	<div class="spinner"></div>
		<div class="container">
			<?php include 'header.php'; ?>
			<section>
				<form action="up.php" id="uploadForm" method="post" enctype="multipart/form-data" onsubmit="return validate();">
					<div class="post_container">
						<div class="post_main_title">
							<p>Submit a Free Classified Ad</p>
						</div>
						<div class="post_sub_container post_title">
							<span>Ad Title*</span><input type="text" name="p_title" required>
						</div>
						<div class="post_sub_container post_category">
							<span>Category*</span>
							<select name="p_category" required>
								<option>Choose Category..</option>
								<option value="Properties">Properties</option>
								<option value="Cars">Cars</option>
								<option value="Electronics">Electronics &amp; Appliances</option>
								<option value="Furniture">Furniture</option>
								<option value="Bikes">Bikes</option>
								<option value="Books">Books, Sports &amp; Hobbies</option>
								<option value="Fashion">Fashion</option>
								<option value="Pets">Pets</option>
							</select>
						</div>
						<div class="post_sub_container post_description">
							<span>Ad Description*</span><textarea name="p_description" required></textarea>
						</div>
					<div class="post_sub_container post_images">
							<span>Upload Photos<br><small>Ads with photos sell faster</small></span><input type="file" name="p_img" required>
							<!-- <div class="pro_img_prev"><img src="img/iphone.jpg" alt="test"></div> -->
						</div> 
						<div class="post_sub_container post_price">
							<span>Price*</span><input type="number" name="p_price" required>
							<!-- <div class="pro_img_prev"><img src="img/iphone.jpg" alt="test"></div> -->
						</div> 
						<div class="post_sub_container post_uname">
							<?php
								if(isset($_SESSION["name"])){
							?>
							<span>Name*</span><input type="text" name="u_name" value="<?php echo $_SESSION["name"];?>" disabled>
							<?php
								}else{
									?>
									<span>Name*</span><input type="text" name="u_name">
							<?php
								}
							?>
						</div>
						<div class="post_sub_container post_pnumber">
							<?php
								if(isset($_SESSION["email"])){
							?>
							<span>Email*</span><input type="email" name="u_email" value="<?php echo $_SESSION["email"];?>" disabled>
							<?php
								}else{
									?>
									<span>Email*</span><input type="text" name="u_email">
							<?php
								}
							?>
						</div>
						<div class="post_sub_container post_city">
							<span>Enter a city*</span><input list="place" name="city" id="product_city_input" required>
							<datalist id="place">
								<option value="Delhi">
								<option value="Mumbai">
								<option value="Kolkata">
								<option value="Bangalore">
							</datalist>
							<small style="color:orange;">Type your city name and select the matching city from the list.</small>
						</div>
						<div class="post_sub_container post_extra_text">
							<p>By clicking &#39;Submit&#39; you agree to our <a>Terms of Use</a> &amp; <a>Posting Rules</a></p>
						</div>
						<div class="post_sub_container post_submit">
							<input type="submit" value="submit">
						</div>
					</div>
				</form>
			</section>
		</div>
		<?php include 'footer.php';?>
	</body>
	<script src="js/custom.js"></script>
</html>
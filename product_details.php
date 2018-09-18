<?php
session_start();
if (!isset($_SESSION["id"])) {
	session_destroy();
	header("Location: http://localhost/oly/olyphp/login.php");
}

require('db_details.php');

$pid=$_REQUEST["pid"];
$sql="SELECT * FROM product WHERE pid=".$pid;
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
	while ($row=mysqli_fetch_assoc($result)) {

	}
}else{
	echo "<script>alert('Dont change url');</script>";
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
			<div class="product_container">
				<div class="pro_details_left">
					<div class="pro_details_title">
						<p>Apple iphone 6 128gb with bill nd sellrs warrnti</p>
					</div>
					<div class="pro_details_location">
						<p>Delhi, Delhi</p>
					</div>
					<div class="pro_details_img">
						<div class="pro_details_img_contain">
							<img src="img/iphone.jpg">
						</div>
					</div>
					<div class="pro_details_description">
						<p>Apple iphone 6 128gb with bill and sellers warrenty one month all accessories available</p>
					</div>
				</div>
				<div class="pro_details_right">
					<div class="pro_details_price">
						<p><i class="fas fa-rupee-sign"></i> 99999</p>
					</div>
					<div class="pro_details_seller_chat">
						<img src="img/logo.png"><span class="seller_name">Mohd</span>
						<p class="seller_online_status">Online</p>
						<p class="seller_active_minutes">(Active on site since 7 minutes)</p>
												
					</div>
					<div class="chat_seller">
						<p class="chat_with_seller">Chat with Seller</p>
						<textarea class="user_chat_box" placeholder="Type your message here.." required></textarea><br>
						<input type="button" name="chat_user" value="Send">

					</div>
					<div class="seller_safety_tips">
						<div class="safety_tips">
							<h3>Safety Tips for Buyers</h3>
							<ol>
								<li>Meet seller at a safe location</li>
								<li>Check the item before you buy</li>
								<li>Pay onlu after collection  item</li>
							</ol>
							<a class="safety_know_more">Know more -</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php include 'footer.php';?>
</body>
<script src="js/custom.js"></script>
</html>
<?php
session_start();
if (!isset($_SESSION["id"])) {
	session_destroy();
	header("Location: http://localhost/oly/olyphp/login.php");
}

require('db_details.php');

$sql="SELECT * FROM product WHERE uid='".$_SESSION["id"]."' AND p_status='false'";
$result_pro=mysqli_query($conn,$sql);

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
			<h1 class="dashboard_title">Your OLY Ads</h1>
			<h4 class="dashboard_sub_title">You can manage your Active &amp; Inactive Ads here</h4>
			<div class="balance_container">
				
			</div>
			<div class="dashboard_container">
				<div class="dashboard_upper_menu">
					<ul>
						<li class="dashboard_active"><a href="">Ads</a></li>
						<li><a href="">Messages</a></li>
						<li><a href="">Payments</a></li>
						<li><a href="">Settings</a></li>
					</ul>
				</div>
				<div class="dashboard_second_menu">
					<div class="ad_status">
						<a href="dashboard.php">Active </a>|
						<a href="dashboard_inactive.php" class="product_inactive"> Inactive</a>
					</div>
					<input type="text" name="" placeholder="Ad Title...">
				</div>
				<div class="dashboard_show">
					<table>
						<?php

						if (mysqli_num_rows($result_pro)>0) {
							?>
							<thead>
								<tr>
									<th>Date</th>
									<th>Title</th>
									<th>Price</th>
									<th>Messages</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								while ($row=mysqli_fetch_assoc($result_pro)) {

									$d=date_parse($row["up_date"]);
									?>
									<tr>
										<td>From: <?php echo $d["day"]."-".$d["month"]."-".$d["year"];?></td>
										<td><img src="<?php echo $row["pics"];?>"><span> <?php echo $row["title"]?></span>
											<div>
												<a style="color: #26a126;"><i class="fas fa-location-arrow"></i> Preview</a>
												<a style="color: #2ba4dd;"><i class="far fa-edit"></i> Edit</a>
												<a style="color: #db4919;" onclick="del_pro_dashboard(this);"><i class="fas fa-times"></i> Delete</a>
												<span class="pro_id_del no_display"><?php echo $row["pid"];?></span>
											</div>
										</td>
										<td><i class="fas fa-rupee-sign"></i> <?php echo $row["price"];?></td>
										<td><i class="fas fa-envelope"></i> 0</td>
										<td><span class="pro_id_del no_display"><?php echo $row["pid"];?></span><a onclick="activate_ad(this);" class="activate_ad"><i class="fas fa-arrow-up"></i> Activate Ad</a></td>
									</tr>
									<?php
								}

								?>							
							</tbody>
							<?php
						}else{
							?>
							<div class="no_post_dashboard">
								<img src="img/pin.png">
								<p>You don&#39;t have Ads. Place an ad now!</p>
								<a href="posting.php"><i class="fas fa-plus"></i> Submit a Free Ad</a>
							</div>
							<?php
						}
						?>
					</table>
				</div>
			</div>
		</section>
	</div>
	<?php include 'footer.php';?>
</body>
<script src="js/custom.js"></script>
</html>
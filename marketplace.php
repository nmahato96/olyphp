<?php
session_start();
if (!isset($_SESSION["id"])) {
	session_destroy();
	header("Location: http://localhost/oly/olyphp/login.php");
}

require('db_details.php');

$cat=$_REQUEST["category"];
$sql="SELECT * FROM product WHERE category='".$cat."'";
$result_mkplace=mysqli_query($conn,$sql);

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
			<h1 class="category"><?php echo $cat;?></h1>
			<div class="marketplace_container">
				<table>
					<?php

						if (mysqli_num_rows($result_mkplace)>0) {
							?>
					<tbody>
						<?php
								while ($row=mysqli_fetch_assoc($result_mkplace)) {
 
									?>
						<tr>
							<td class="td_marketplace_image">
								<img src="<?php echo $row["pics"]?>">
							</td>
							<td class="td_marketplace_title">
								<a href="product_details.php?pid=<?php echo $row["pid"];?>" class="title_marketplace"><?php echo $row["title"];?></a>
								<p class="city_marketplace">
									<i class="fas fa-map-marker-alt"></i> <?php echo $row["city"];?>
								</p>
							</td>
							<td class="marketplace_price">
								<i class="fas fa-rupee-sign"></i> <?php echo $row["price"];?>
							</td>
						</tr>
						<?php
}

						?>

					</tbody>
					<?php
}else{
					?>
					<p class="no_pro_marketplace">No Ads in this category!</p>
					<?php
}
					?>
				</table>
			</div>
		</section>
	</div>
	<?php include 'footer.php';?>
</body>
<script src="js/custom.js"></script>
</html>
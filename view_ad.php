<?php
session_start();
if (!isset($_SESSION["id"])) {
	session_destroy();
	header("Location: http://localhost/oly/olyphp/login.php");
}

// $servername="localhost";
	// $username="root";
	// $password="aapna@123";
	// $dbname="olyphp";

$servername="localhost";
$username="root";
$password="";
$dbname="oly";

	// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 $sql="SELECT * FROM product WHERE uid='".$_SESSION["id"]."' ORDER BY pid DESC LIMIT 1";
 $view_ad_result=mysqli_query($conn,$sql);
 if (mysqli_num_rows($view_ad_result) > 0) {
    // output data of each row
 	while($row = mysqli_fetch_assoc($view_ad_result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
 		$ptitle=$row["title"];
 		$pid=$row["pid"];
 		$pcategory=$row["category"];
 		$pdescription=$row["description"];
 		$ppic=$row["pics"];
 		$pcity=$row["city"];
 		$pprice=$row["price"];
 	}
 } else {
 	echo "Submit an ad to view this page!";
 	header("Refresh:2; url= http://localhost/oly/olyphp/index.php");
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
				<div class="ad_view_container">
					<p id="ad_view_id" class="no_display"><?php echo $pid;?></p>
					<p class="ad_view_title"><?php echo $ptitle;?></p>
					<p class="ad_view_place"><i class="fas fa-map-marker-alt"></i>&nbsp;<?php echo $pcity;?></p>
					<div class="ad_view_img_container">
						<img src="<?php echo $ppic;?>">
					</div>
					<p class="ad_view_price"><i class="fas fa-rupee-sign"></i> <?php echo $pprice;?></p>
					<input type="button" name="edit" value="Edit">
					<input type="button" name="delete" value="Delete" onclick="del_ad();">
					<p class="description"><?php echo $pdescription?></p>
				</div>
			</section>
		</div>
		<?php include 'footer.php';?>
	</body>
	<script src="js/custom.js"></script>
</html>
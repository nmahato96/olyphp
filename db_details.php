<?php
#credentials for server
	// $servername="localhost";
	// $username="root";
	// $password="aapna@123";
	// $dbname="olyphp";
	
#credentials for localhost
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
?>
<?php
session_start();
require('db_details.php');

$title=$_REQUEST["p_title"];
$category=$_REQUEST["p_category"];
$description=$_REQUEST["p_description"];
$uname=$_SESSION["name"];
$uid=$_SESSION["id"];
$city=$_REQUEST["city"];
$price=$_REQUEST["p_price"];

#UPLOAD IMAGE START

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["p_img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

$check = getimagesize($_FILES["p_img"]["tmp_name"]);
if($check !== false) {
   /* echo "File is an image - " . $check["mime"] . ".";*/
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size(here its 500kb)
if ($_FILES["p_img"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["p_img"]["tmp_name"], $target_file)) {
        $sql="INSERT into product (title, category, description, price, pics, city, uid) VALUES ('".$title."','".$category."','".$description."','".$price."','".$target_file."','".$city."','".$uid."')";
        if(mysqli_query($conn,$sql)){

            header("Location: http://localhost/oly/olyphp/confirmAd.php");
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

#UPLOAD IMAGE END






mysqli_close($conn);
?>
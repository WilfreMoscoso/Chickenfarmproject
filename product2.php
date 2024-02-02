<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {


 $product=$_POST['product'];
 $price=$_POST['price'];
	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image/" . $filename;

	
$server="fdb1034.awardspace.net";
$user="4435869_chicken";
$pass="Chicken123(*)";
$database="4435869_chicken";
$db=mysqli_connect($server,$user,$pass,$database);

	// Get all the submitted data from the form
	$sql = "INSERT INTO image (filename,product,price) VALUES ('$filename','$product','$price')";

	// Execute query
	mysqli_query($db, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Image uploaded successfully!</h3>";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}
}
?>

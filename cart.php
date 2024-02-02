<?php

$server="localhost";
$user="root";
$pass="";
$database="chicken";
$conn=mysqli_connect($server,$user,$pass,$database);

if (isset($_POST['add'])) {



	
$a=$amount= $_POST['amount'];
	$name=$_POST['name'];
        $address=$_POST['address'];
         $phone=$_POST['phone'];
			$email=$_POST['email'];
				$product=$_POST['product'];
					$price=$_POST['price']*$a;
						$id=$_POST['u_id'];
                         $num=$_POST['num'];
	$insert=mysqli_query($conn,"INSERT INTO cart (name,address,email,phone,product,price,u_id,num,amount) VALUES ('$name','$address','$email','$phone','$product','$price','$id','$num','$a')");
	if ($insert==true) {
		echo "data inserted";
	}else{
echo "fail";
	}
}
else if (isset($_POST['cancel'])) {
	
$id=$_POST['id'];

$cancel=mysqli_query($conn,"delete from cart where id ='$id'");
if ($cancel==true) {
	echo '<script>window.location.href="home.php";alert("Item cancelled successfully");</script>';
}else{
	echo "something went wrong";
}




}


else if (isset($_POST['edit'])) {
		
		$id=$_POST['id'];
		$name=$_POST['name'];
		$address=$_POST['address'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];

    $filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image/" . $filename;

$update=mysqli_query($conn,"UPDATE auth set name='$name', address='$address', phone='$phone', email='$email',filename='$filename' where id='$id'");

if ($update) {

	if (move_uploaded_file($tempname, $folder)) {
echo '<script>window.location.href="home.php";alert("Profile change successfully");</script>';	
}
}else{
echo "failed";
}

	}






?>
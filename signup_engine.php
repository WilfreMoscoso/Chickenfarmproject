<?php


if (isset($_POST['insert'])) {
    # code...

$con =mysqli_connect("fdb1034.awardspace.net","4435869_chicken","Chicken123(*)","4435869_chicken");

$name=$_POST['user'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];


$filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;

function isPasswordStrong($password) {
// Define the minimum requirements for a strong password
    $minLength = 8;
    $minUpperCase = 1;
    $minLowerCase = 1;
    $minDigit = 1;
    $minSpecialChar = 1;
 
    // Check if the password meets the minimum length requirement
    if (strlen($password) < $minLength) {
        return false;
    }
 
    // Check if the password contains the minimum number of uppercase letters, lowercase letters, digits, and special characters
    $uppercaseCount = preg_match_all('/[A-Z]/', $password);
    $lowercaseCount = preg_match_all('/[a-z]/', $password);
    $digitCount = preg_match_all('/\d/', $password);
    $specialCharCount = preg_match_all('/[^A-Za-z0-9]/', $password);
 
    // Return true if all criteria are met, otherwise return false
    return ($uppercaseCount >= $minUpperCase) && ($lowercaseCount >= $minLowerCase) && ($digitCount >= $minDigit) && ($specialCharCount >= $minSpecialChar);

 }

if (isPasswordStrong($password)) {
    

$sql=mysqli_query($con,"SELECT * FROM auth WHERE name='$name'");
if ($sql->num_rows>0) {
echo '<script>window.location.href="signup.php";alert("username already exist");</script>'; 
}else{
    $password=password_hash($password, PASSWORD_DEFAULT);
$query=mysqli_query($con,"INSERT INTO auth (name,address,phone,email,password,filename) VALUES ('$name','$address','$phone','$email','$password','$filename')");

if ($query==true) {


    if (move_uploaded_file($tempname, $folder)) {
    
  echo '<script>window.location.href="index.php";alert("You are registered successfully");</script>';
}
    
    
}else{
        echo "faild";
    }}
} else {
   
         echo '<script>window.location.href="index.php";alert("The password you have entered was not acceptable. The password must contain a minimum of 8 characters with digits, the first letter must be capitalize and include any symbols example Wilfredo1234*(*);");</script>';

  ;
}
}
echo "hi";
?>




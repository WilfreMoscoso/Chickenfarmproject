<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>



<div class="navbar">
  <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a> 
 
 
</div>
<center>
	<div class="container"><br>
<center><h3 style="color: orange">
<?php
if (isset($_GET['msg'])) {
	echo $_GET['msg'];
}else{
	echo "Sign-up";
}
?>



</h3></center>
	<form action="signup_engine.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
		<input required="required" type="file" name="uploadfile"><br><br>
		<input class="input" type="text" name="user" placeholder="  username" required="required">
		<input class="input" type="text" name="address" placeholder="  address" required="required">
		<input class="input" type="number" name="phone" placeholder="  phone" required="required">

			<input class="input" type="email" name="email" placeholder="  email" required="required">

				<input class="input" type="password" id="password" name="password" placeholder="  password" required="required">
					
					<input class="input" type="password" name="" id="confirm-password" placeholder="  confirm password" required
					="required">

<br><input style="width: 20px;" type="checkbox" onclick="myFunction()">Show Password<br><br>
						<button  name="insert" >Submit</button>

	</form>
 
</div>

<br><br>






















</center>
</body>
</html>
<script> 
function validateForm() {
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirm-password").value;
 
  if (password != confirmPassword) {
    alert("Passwords do not match!");
    return false;
  }
 
  // Form submission
  // Uncomment the line below if you want the form to submit
  // return true;
}



function myFunction() {
  var x = document.getElementById("confirm-password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<style type="text/css">
	body{
		background-color: whitesmoke;
	}
	.container{

		 box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
  width: 50%;
		width: 30%;
		height: 700px;
		background-color: white;
		position: relative;
		top:10px;
	}



body {font-family: Arial, Helvetica, sans-serif;}


button{
	transition: 0.2s ease;
	width: 100px;
	height: 40px;
	background-color: white;
	border: solid 1px;
	border-radius: 10px;
}
button:hover{
	transform: scale(1.1);
}


.input{
	font-size: 15px;
	width: 90%;
	height: 40px;
	margin-bottom: 2rem;
	border-radius: none;
	background-color: whitesmoke;
	border:none;
	border-radius: 20px;
}
.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: #04AA6D;
}

@media screen and (max-width: 600px) {
  .navbar a {
    float: none;
    display: block;
  }
  .container{

		 box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
  width: 50%;
		width: 500px;
		height: 650px;
		background-color: white;
		position: relative;
		top:10px;
	}

}
</style>

<!DOCTYPE html>
<html>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<div id="content">
		<form method="POST" action="product2.php" enctype="multipart/form-data">
			<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" />
				<input class="form-control" type="text" placeholder=" product name" name="product"  />
				<input class="form-control" type="number" placeholder=" price" name="price"  />
				
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
			</div>
		</form>
	</div>
<div class="container">
	<table>
          <tr>
				<th>image</th>
				<th>name</th>
				<th>price</th>
				</tr>
	

		<?php
		$server="fdb1034.awardspace.net";
$user="4435869_chicken";
$pass="Chicken123(*)";
$database="4435869_chicken";
		$db=mysqli_connect($server,$user,$pass,$database);
		$query = " select * from image ";
		$result = mysqli_query($db, $query);

		while ($data = mysqli_fetch_assoc($result)) {
		?>
		
				<tr>
			<td><img style="width: 300px;height: 100px; " src="./image/<?php echo $data['filename']; ?>">
            <td><input type="text" value="<?php echo $data['product'];  ?>" name="">
           <td> <input value="<?php echo $data['price'];  ?>" name="">
            </tr>
            </table>
		<?php
		}
		?>
		</div>

  
</body>

</html>
<style type="text/css">
	input{
		border: none;
		width: 300px;
	}
	th{
		text-align: center;
		background-color: green;
		color: white;
	}
	input{
		text-align: center;
	}
	.container{
		background-color: white;
		
		border: 1px solid;
		
	}
</style>
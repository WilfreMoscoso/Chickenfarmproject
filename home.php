<?php
session_start();

if (!isset($_SESSION['login'])) {
  echo'<script>window.location.href="index.php";</script>';
}
?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
   <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
     <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="style6.css">
<body>





<div class="top">
  <center><h1 style="font-family: 'Segoe Print', Times, serif">Farm Store</h1></center>
  <form method="post"  onsubmit="return confirm('Do you want to logout?')">
    <button name="logout" style="border-radius: 0px;position: relative;left: 10px;background-color: white;color: red;font-size: 20px;">logout</button>
  </form>
</div>

<?php
if (isset($_POST['logout'])) {
  session_destroy();

  echo'<script>window.location.href="index.php";</script>';

}
?>

<?php

$id= $_SESSION['U_email'];
$server="fdb1034.awardspace.net";
$user="4435869_chicken";
$pass="Chicken123(*)";
$database="4435869_chicken";
    $conn=mysqli_connect($server,$user,$pass,$database);



$query=mysqli_query($conn,"SELECT * from auth where id ='$id'");
if ($query->num_rows >0) {

while($row=mysqli_fetch_assoc($query)){


?>
<br>

<center>

<img style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;width: 100px;height: 100px; border-radius: 100%" src="./image/<?php echo $row['filename']; ?>"><br><br>
<a href="" style="color: red;font-size: 20px;text-decoration: none">
 <?php echo $row['name'];

 $name =$row['name'];
  $address =$row['address'];
$Id =$row['id'];
$email =$row['email'];
$phone =$row['phone'];
}?><br>
 <a href="#div6" id="toggle-link2"  style="color: black;text-decoration: none"><p class="a1">Edit profile</p></a>

<style type="text/css">
  .a1{
transition: 0.1s ease;
  }
  .a1:hover{
    transform: scale(1.1);
  }
</style>


</a></center>
<form method="POST">
  <center>
   
  <input class="input1" type="text" placeholder=" scroll down for results" required="required" name="product"> 
<button name="search" class="div5"><i class="fas fa-search"></i></button>

 </center>
  </form>

  <br><br>







<div class="navbar">
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a> 
 
  <a href="#div4"><i class="fas fa-phone"></i> Contact</a> 
  <a href="#div7"  id="toggle-link"><i class=" fa fa-cart-plus"></i> Cart</a>

    <a href=""><i class="fa fa-fw fa-user"></i> User account</a>
 <?php   
}
?>
</a>
</div>
<center>

  <br>
<?php 
   // connecting to the database.
   $mysqli = new mysqli('fdb1034.awardspace.net', '4435869_chicken', 'Chicken123(*)', '4435869_chicken');
   if($mysqli->connect_errno != 0){
      echo $mysqli->connect_error;
      exit();
   }else{
      $mysqli->set_charset("utf8mb4");  
   }
?>

   <?php
   // get the total nr of rows.
   $records = $mysqli->query("select * from image");
   $nr_of_rows = $records->num_rows;
   
   // Setting the number of rows to display in a page.
   $rows_per_page = 1;
 
   // calculating the nr of pages.
   $pages = ceil($nr_of_rows / $rows_per_page);
 
   // Setting the start from, value.
   $start = 0;


if(isset($_GET['page-nr'])){
      $page = $_GET['page-nr'] - 1;
      $start = $page * $rows_per_page;
   }
 
   // Query the database based on the calculated $start value, 
   // and the fixed $rows_per_page value.
   $result = $mysqli->query("SELECT * FROM image LIMIT $start, $rows_per_page");
?>


      <?php 
         while($data = $result->fetch_assoc()){
            ?>
               <img class="pagimg"   src="./image/<?php echo $data['filename']; ?>"><br>
    
      <form action="cart.php" method="post" onsubmit="return confirm('Final decission?')">
      
         <input type="" disabled="disabled" class="in3" value="<?php echo $data['product']; ?>" >
          <input type="" disabled="disabled" class="in4" value="<?php echo "₱ ".$data['price']; ?>"><br>
          <input type="hidden"   class="in1" name="product" value="<?php echo $data['product']; ?>" >
          <input type="hidden"  name="price" value="<?php echo $data['price']; ?>" >
           <input type="hidden" class="in1" name="name" value="<?php echo $name; ?>" >
            <input type="hidden"  class="in1" name="phone" value="<?php echo $phone; ?>" >
           <input type="hidden"  class="in1" name="address" value="<?php echo $address; ?>" >
            <input type="hidden"  class="in1" name="email" value="<?php echo $email; ?>" >
            <input type="hidden"  class="in1" name="num" value="1" >
           <input type="hidden"  class="in1" name="u_id" value="<?php echo $Id; ?>" >
          <label style="position: relative;top: 60px;background-color: white;color:black;width: 30%;height:30px;text-align: center;border-bottom-right-radius:0px;" for="Amount">Quantity</label><br>
          <select name="amount" style="text-align:center;border-radius:20px;position: relative;top: 65px;width: 100px;height: 40px;background-color:white;color:black;border:solid white 2px;">
            
              <option>1</option>
               <option>2</option>
                <option>3</option>
                 <option>4</option>
          </select>
         <br>
       
         
         <button class="btn1" name="add" style="position: relative;top: 100px;width: 300px;height: 50px;border:none;">buy now!</button><br><br><br><br><br>
                   
          </form>
         <?php
         }
      ?>
 

    <div class="page-info">
      <?php 
         if(!isset($_GET['page-nr'])){
            $page = 1;
         }else{
            $page = $_GET['page-nr'];
         }
      ?>
      Showing  <?php echo $page ?> of <?php echo $pages; ?> pages
   </div>
<br>



    <a class="a" href="?page-nr=1">First</a>
     <?php 
         if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
            ?> <a class="a" href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">Previous</a> <?php
         }else{
            ?> <a>Previous</a>  <?php
         }
      ?>

     <div class="page-numbers">
         <?php 
            if(!isset($_GET['page-nr'])){
               ?> <a class="active a" href="?page-nr=1">1</a> <?php
               $count_from = 2;
            }else{
               $count_from = 1;
            }
         ?>
         
         <?php
            for ($num = $count_from; $num <= $pages; $num++) {
               if($num == @$_GET['page-nr']) {
                  ?> <a class="active a" href="?page-nr=<?php echo $num ?>"><?php echo $num ?></a> <?php
               }else{
                  ?> <a class="a" href="?page-nr=<?php echo $num ?>"><?php echo $num ?></a> <?php
               }
            }
         ?>
      </div>


 <?php 
      if(!isset($_GET['page-nr'])){
         ?> <a class="active a" href="?page-nr=1">1</a> <?php
         $count_from = 2;
      }else{
         $count_from = 1;
      }
   ?>
    

    <?php 
      if(isset($_GET['page-nr'])){
         if($_GET['page-nr'] >= $pages){
            ?> <a>Next</a> <?php
         }else{
            ?> <a class="a" href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a> <?php
         }
      }else{
         ?> <a class="a" href="?page-nr=2">Next</a> <?php
      }
   ?><a class="a" href="?page-nr=<?php echo $pages ?>">Last</a>

<br><br><br>





<br>
 <center> 
<div class="profile" id="myDiv2" style="display: none;height: 750px;" >
  <div id="div6"></div>



<?php

$id= $_SESSION['U_email'];
$server="fdb1034.awardspace.net";
$user="4435869_chicken";
$pass="Chicken123(*)";
$database="4435869_chicken";
    $conn=mysqli_connect($server,$user,$pass,$database);



$query=mysqli_query($conn,"SELECT * from auth where id ='$id'");

if ($query->num_rows >0) {

($row=mysqli_fetch_assoc($query));


?>
<br>
<h1><center>Edit profile</center></h1><br>
<center><img style="width: 150px;height: 100px; border-radius: 100%" src="./image/<?php echo $row['filename']; ?>"></center>
<form action="cart.php" method="post" enctype="multipart/form-data">
 
<input  style="width: 50%;border-radius: 0px;text-align: center;" type="text" value="<?php echo $row['name'];?> " name="name">
 
 <input  style="width: 50%;border-radius: 0px;text-align: center;" type="text" value="<?php echo $row['address'];?>" name="address"><br>
  <input  style="width: 50%;border-radius: 0px;text-align: center;" type="email" value="<?php echo $row['email'];?>" name="email"><br>
   <input  style="width: 50%;border-radius: 0px;text-align: center;" type="number" value="<?php echo $row['phone'];?>" name="phone"><br>
     <input  style="width: 50%;border-radius: 0px;text-align: center;" type="hidden" value="<?php echo $row['id'];?>" name="id"><br><br>
      
      <td><button name="edit" style="position: relative;top: 6px;background-color: #00ff00">Save</button>
        </form>
         </tr>

<?php
}else{
  echo "<p style='color:orange'>something went wrong!</p>";
}


?>
</table>









</div>
<style type="text/css">
  .profile{
    width: 50%;
    height: 600px;
     box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
  
    position: relative;
    background-color: white;
    top: -900px;
  }
</style>

<div class="cart" id="myDiv" style="display: none">
  <div id="div7"></div>
  <center><img src="cart.jpg" width="100px" height="100px"></center>
  <br>

<br>
<table>
 <tr> 
<th>Username</th>
<th>Address</th>
<th>email</th>
<th>Phone</th>
<th>Product</th>
<th>Total payment</th>
<th>Amount</th>
<th>Cancel Order</th>
</tr>
<?php

$id= $_SESSION['U_email'];
$server="fdb1034.awardspace.net";
$user="4435869_chicken";
$pass="Chicken123(*)";
$database="4435869_chicken";
    $conn=mysqli_connect($server,$user,$pass,$database);



$query=mysqli_query($conn,"SELECT * from cart where u_id ='$id'");

if ($query->num_rows >0) {

while($row=mysqli_fetch_assoc($query)){


?>

<tr>
        
 <td><?php echo $row['name'];?> 
<td><?php echo $row['address'];?>
  <td><?php echo $row['email'];?>
    <td><?php echo $row['phone'];?>
      <td><?php echo $row['product'];?>
        <td><?php echo "₱ ".$row['price'];?>
          <td> <?php echo $row['amount'];?>
 
<form action="cart.php" method="post" onsubmit="return confirm('Are you sure that you want to cancel this item?')">
<input type="hidden" value="<?php echo $row['name'];?> " name="">
 <input type="hidden" value="<?php echo $row['address'];?>" name="">
  <input type="hidden" value="<?php echo $row['email'];?>" name="">
   <input type="hidden" value="<?php echo $row['phone'];?>" name="">
    <input type="hidden" value="<?php echo $row['product'];?>" name="">
     <input type="hidden" value="<?php echo "₱ ".$row['price'];?>" name="">
      <input type="hidden" value="<?php echo $row['amount'];?>" name="">
      <input type="hidden" value="<?php echo $row['id'];?>" name="id">
      
      <td><button name="cancel" style="position: relative;top: 6px;background-color: red">Cancel</button>
        </form>
         </tr>

<?php
}}else{
  echo "<p style='color:orange'>You dont have any purchase!</p>";
}


?>
</table>
</div>



<style type="text/css">
  th{
    text-align: center;
    width: 200px;
    color: gray;
  }
td{
height: 50px;
  text-align: center;
}

table{
  height: 100px;
}

</style>


</center>
<script> 
document.getElementById("toggle-link").addEventListener("click", function(e)
{
  e.preventDefault();
  var div =document.getElementById("myDiv");

  if(div.style.display=="none"){
    div.style.display="block";
  }else{
    div.style.display="none";
  }
})
</script>

<script> 
document.getElementById("toggle-link2").addEventListener("click", function(e)
{
  e.preventDefault();
  var div =document.getElementById("myDiv2");

  if(div.style.display=="none"){
    div.style.display="block";
  }else{
    div.style.display="none";
  }
})
</script>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
  var scrollLinks = document.querySelectorAll('[href^="#"]');
  
  scrollLinks.forEach(function(link) {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      
      var targetId = this.getAttribute('href');
      var targetElement = document.querySelector(targetId);
      
      if (targetElement) {
        targetElement.scrollIntoView({
          behavior: 'smooth'
        });
      }
    });
  });
});
</script>

<br><br><br>
  
<div class="container5">

<?php
if (isset($_POST['search'])) {
 $product=$_POST['product'];

 $id= $_SESSION['U_email'];
$server="fdb1034.awardspace.net";
$user="4435869_chicken";
$pass="Chicken123(*)";
$database="4435869_chicken";
    $conn=mysqli_connect($server,$user,$pass,$database);

$sql = "SELECT * FROM image WHERE product LIKE '%$product%'";
$result = $conn->query($sql);
 
// Display the results
echo '<div class="recommended"><br><br><br><br><center><h1 style="color:dodgerblue">Search results!</h1></center></div>';
if ($result->num_rows > 0) {
  while($data = $result->fetch_assoc()) {
  
 

?>


     <img class="img2" src="./image/<?php echo $data['filename']; ?>"><br>
    
      <form action="cart.php" method="post" onsubmit="return confirm('Final decission?')">
       <div class="nameprice">
         <input type="" disabled="disabled" class="in1" value="<?php echo $data['product']; ?>" >
          <input type="" disabled="disabled" class="in2" value="<?php echo "₱ ".$data['price']; ?>"><br>
          <input type="hidden"   class="in1" name="product" value="<?php echo $data['product']; ?>" >
          <input type="hidden"  name="price" value="<?php echo $data['price']; ?>" >
           <input type="hidden" class="in1" name="name" value="<?php echo $name; ?>" >
            <input type="hidden"  class="in1" name="phone" value="<?php echo $phone; ?>" >
           <input type="hidden"  class="in1" name="address" value="<?php echo $address; ?>" >
            <input type="hidden"  class="in1" name="email" value="<?php echo $email; ?>" >
            <input type="hidden"  class="in1" name="num" value="1" >
           <input type="hidden"  class="in1" name="u_id" value="<?php echo $Id; ?>" >
          <label style="position: relative;top: 60px;background-color: blue;color:white;width: 30%;height:30px;text-align: center;border-bottom-right-radius:0px;" for="Amount">Quantity</label><br>
          <select name="amount" style="text-align:center;border-radius:20px;position: relative;top: 65px;width: 100px;height: 40px;background-color:blue;color:white;border:solid white 2px;">
            
              <option>1</option>
               <option>2</option>
                <option>3</option>
                 <option>4</option>
          </select>
         <br>
         </div>
           <div class="btnbuy">
         <button name="add">buy now!</button></div><br><br><br><br><br>
                   
          </form>


    <?php
    
   }
} else {
?>
</div>
 <h1 style="position: relative;top: -50px;color: red"><center><?php echo "No results found!";?></center></h1>
  <?php
}}
 
// Close the database connection

?>


  <br><br>

<div class="container6">

  
<div class="recommended"><br><br><br><br><br><center><h1>Recommended</h1></center>

</div>
  <?php
$id= $_SESSION['U_email'];
$server="fdb1034.awardspace.net";
$user="4435869_chicken";
$pass="Chicken123(*)";
$database="4435869_chicken";
    $conn=mysqli_connect($server,$user,$pass,$database);
$query=mysqli_query($conn,"SELECT * FROM image");

while ($data=mysqli_fetch_assoc($query)) {

  ?>
<img class="img2" src="./image/<?php echo $data['filename']; ?>"><br>
    
      <form action="cart.php" method="post" onsubmit="return confirm('Final decission?')">
       <div class="nameprice">
         <input type="" disabled="disabled" class="in1" value="<?php echo $data['product']; ?>" >
          <input type="" disabled="disabled" class="in2" value="<?php echo "₱ ".$data['price']; ?>"><br>
          <input type="hidden"   class="in1" name="product" value="<?php echo $data['product']; ?>" >
          <input type="hidden"  name="price" value="<?php echo $data['price']; ?>" >
           <input type="hidden" class="in1" name="name" value="<?php echo $name; ?>" >
            <input type="hidden"  class="in1" name="phone" value="<?php echo $phone; ?>" >
           <input type="hidden"  class="in1" name="address" value="<?php echo $address; ?>" >
            <input type="hidden"  class="in1" name="email" value="<?php echo $email; ?>" >
            <input type="hidden"  class="in1" name="num" value="1" >
           <input type="hidden"  class="in1" name="u_id" value="<?php echo $Id; ?>" >
          <label class="quantity" style="position: relative;top: 60px;background-color: blue;color:white;width: 30%;height:30px;text-align: center;border-bottom-right-radius:0px;" for="Amount">Quantity</label><br>
          <select name="amount" style="text-align:center;border-radius:20px;position: relative;top: 65px;width: 100px;height: 40px;background-color:blue;color:white;border:solid white 2px;">
            
              <option>1</option>
               <option>2</option>
                <option>3</option>
                 <option>4</option>
          </select>
         <br>
         </div>
           <div class="btnbuy">
         <button name="add">buy now!</button></div><br><br><br><br><br>
                   
          </form>


  <?php
  # code...
}?>
</div>

</div>

<div class="pagination2">
   <div class="wilfre">
     <p style="color: white;font-size: 20px;font-family: Cursive, Times, serif;background-color: black">Shara Vergara<br> Database Administrator</p>
   </div>
 <div class="sha">
   
     <p style="color: white;font-size: 20px;font-family: Cursive, Times, serif;background-color: black">Wilfre Moscoso<br> poor programmer</p>
 </div>
  <div class="dayuday">
     <p style="color: white;font-size: 20px;font-family: Cursive, Times, serif;background-color: black">Dayuday Generose<br> CEO</p>
  </div>
  
</div>
<div class="contact" id="div4" >
<center>
<br><br>

      <br><h1 style="color: white">Contact us</h1></center>
    <center>
   
    <br>
<a  style="color: skyblue" href=""><p class="fb">visit us on facebook.com</p></a>
</center>
</div>
  
</body>
</html>
<style type="text/css">
 .contact{
position: relative;
top: 0px;
 }
.sha{
  background-image: url('wilfre.jpg');
  background-size: cover;
  background-repeat: no-repeat;
width: 33.2%;
height: 600px;
}
.dayuday{
  background-image: url('dayuday.jpg');
  background-size: cover;
  background-repeat: no-repeat;
 width: 33.2%;
height: 600px; 
}
.wilfre{
  background-image: url('sha.jpg');
  background-size: cover;
  background-repeat: no-repeat;
 width: 33.2%;
height: 600px; 
}

.pagimg{
  height: 400px;
}

   a.active{
   background-color: #0d81cd;
   color: #fff;
}

*{
   margin: 0;
   padding: 0;
   box-sizing: border-box;
   font-size: 20px;
}
 
body{
  height: 100vh;
  }
 
.a{
   display: inline-block;
   text-decoration: none;
   color: #006cb3;
   padding: 10px 20px;
   border: thin solid #d4d4d4;
   transition: all 0.3s;
   font-size: 18px;
}
 
a.active{
   background-color: #0d81cd;
   color: #fff;
}
.page-info{
   margin-top: 90px;
   font-size: 18px;
   font-weight: bold;
}
 
.pagination{
   margin-top: 20px;
}
.content p{
   margin-bottom: 15px;
}
.page-numbers{
   display: inline-block;
}

.in4,.in3{
    width: 25%;
    height: 50px;
    text-align: center;
}

.btn1{
    background-color: dodgerblue;
    transition: 0.1s ease;
    color: white;
}
.btn1:hover{
    transform: scale(1.1);

}
.pagination2{
box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.20) 0px 0px 0px 1px;
width: 100%;
height: 600px;
position: relative;
display: flex;
flex-wrap: wrap;
}
  
  .cart{
   box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    width: 90%;
    height: 400px;
    position: relative;
    overflow: auto;
    background-color: white;
top: -1530px;
border-radius: 20px;
background-color: white;
  }
.top{
  width: 100%;
  height: 170px;
color: white;
  border-bottom-right-radius: 100%;
  background: linear-gradient(to bottom,dodgerblue,skyblue);
}
  .recommended{
  box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
  top: 30px;
  height: 300px; 
left: 200px;
color: orange;
margin-right: 4rem;
margin-bottom: 5rem;
width: 430px;
position: relative;
border-radius: 10px;  
 border: solid white 1px;
 position: ab
  }
.in1,.in2{
border-radius: 0px;
background-color: blue;
color: white;

text-align: center;
margin-bottom: -10px;
}

.nameprice{
  position: absolute;
  transform: translate(-42%,190%);
}

.container5{
  top: -150px;
box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
 position: relative;
  display:flex;
  flex-wrap: wrap;
background-color:white;

}
.container6{
  top: 100px;
 box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
 position: relative;
  display:flex;
  flex-wrap: wrap;
background-color: blue;
        height: 150vh;
        overflow:auto;
        width: 100%;

}
.container5,.container6{
  margin-bottom: 100px;
}
.img2{
   box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;

  top: 35px;
  height: 300px; 
left: 230px;
margin-right: 0rem;
margin-bottom: 9rem;
width: 400px;
position: relative;

}

.input1{
  border: none;
  border-radius: 10px;
  width: 300px;
}
.btsearch{
  background-color: transparent;
  border: 1px white solid;
  color: white;
  transition: 0.1s ease;
  border-radius: 0px;
}
.btsearch:hover{
  transform: scale(1.1);
}
  body {font-family: Arial, Helvetica, sans-serif;}


.navbar {
  width: 100%;
  background-color: dodgerblue;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 5px;
  color: white;
  text-decoration: none;
  font-size: 17px;
  height: 40px;
}

.navbar a:hover {
  background-color: black;
}

.active {
  background-color: transparent;
}

@media screen and (max-width: 600px) {

        
        
        
        
        
  .container6{
  top: 100px;
 box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
 position: relative;
  display:flex;
  flex-wrap: wrap;
background-color: blue;
        height: 150vh;
        overflow:auto;
        width: 350px;

}      .
        
        
        
        
   .top{
  width: 500px;
  height: 170px;
color: white;
  border-bottom-right-radius: 100%;
  background: linear-gradient(to bottom,dodgerblue,skyblue);
}     
.contact{
  position: relative;
  top: 1200px;
}
 .recommended{
  box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
  top: 30px;
  height: 300px; 
left: 35px;
margin-right: 4rem;
margin-bottom: 5rem;
width: 500px;
position: relative;
border-radius: 10px;  
  }

  .img2{
   box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
 width: 350;
  top: 35px;
  height: 300px; 
left: 30px;
margin-right: 4rem;
margin-bottom: 5rem;
width: 400px;
position: relative;
border-radius: 10px;
}
 .nameprice{
  position: absolute;
  transform: translate(5%,-80%);
}
  .search{
             position: relative;
                left: 50px;
                width: 300px;
                }
        
       .btnbuy{
            
                transform: translate(185%,-420%); 
                }
        .profile{
           
                width: 300px;
                }
                .quantity{
                  width: 600px;
                }
                .input1{
                  width: 200px;
                }
                .Guid{
    position: absolute;
    background-color: dodgerblue;
     width: 100%;
     height: 850px;
     top: 84%;
  }
.pagimg{
  width: 300px;
}

  .pagination2{
box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.20) 0px 0px 0px 1px;
width: 300px;
height: 400px;
position: relative;
display: flex;
flex-wrap: wrap;
}
  .sha{
  background-image: url('wilfre.jpg');
  background-size: cover;
  background-repeat: no-repeat;
width: 300px;
height: 600px;
}
.dayuday{
  background-image: url('dayuday.jpg');
  background-size: cover;
  background-repeat: no-repeat;
 width: 300px;
height: 400px; 
}
.wilfre{
  background-image: url('sha.jpg');
  background-size: cover;
  background-repeat: no-repeat;
 width: 300px;
height: 400px; 
}
.cart{
        
 position:absulote;
        top:-300px;
        }

}

</style>

</body>
</html>
 


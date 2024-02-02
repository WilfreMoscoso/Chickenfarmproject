
<center>
<?php 
   // connecting to the database.
   $mysqli = new mysqli('localhost', 'root', '', 'chicken');
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

<div class="content">
      <?php 
         while($data = $result->fetch_assoc()){
            ?>
               <img style="width: 50%;height: 400px;"  src="./image/<?php echo $data['filename']; ?>"><br>
    
      <form action="cart.php" method="post" onsubmit="return confirm('Final decission?')">
       <div class="nameprice">
         <input type="" disabled="disabled" class="in3" value="<?php echo $data['product']; ?>" >
          <input type="" disabled="disabled" class="in2" value="<?php echo "₱ ".$data['price']; ?>"><br>
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
         </div>
           <div class="btnbuy">
         <button class="btn1" name="add" style="position: relative;top: 100px;width: 300px;height: 50px;border:none;">buy now!</button></div><br><br><br><br><br>
                   
          </form>




            <?php
         }
      ?>
   </div>

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
                  ?> <a href="?page-nr=<?php echo $num ?>"><?php echo $num ?></a> <?php
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


      <style type="text/css">
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
   font-family: sans-serif;
   min-height: 100vh;
   color: #555;
   padding: 30px;
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

.in2,.in3{
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
      </style>

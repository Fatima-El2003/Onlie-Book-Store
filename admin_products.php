<?php

$conn = mysqli_connect('localhost','root','','products_db') or die
('connection failed');

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = $_POST['price'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'product name already added';
   }else{
      $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$name', '$price', '$image')") or die('query failed');

      if($add_product_query){
         if($image_size > 2000000){
            $message[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'product added successfully!';
         }
      }else{
         $message[] = 'product could not be added!';
      }
   }
}
if(isset($_GET['delete'])){
   $delete_name=$_GET['delete'];
   mysqli_query($conn,"DELETE FROM `products` 
   WHERE name='$delete_name'") or die('query failed');
   header('location:admin_products.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
   <link rel="stylesheet" href="admin_style.css">
</head>
<body>
   <?php include'admin_header.php';?>
<section class="add-products">
    <h1 class="title">Shop Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <h3>Add Product</h3>
        <input type="text" name="name" class="box" placeholder="Enter Product Name" requiered>
        <input type="number" name="price" class="box" placeholder="Enter Product Price" requiered>
        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box last" required>
        <input type="submit" name="add_product" value="add Product" class="white-btn">
    </form>
</section>
<section class="show-products">

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
         <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
         <a href="admin_products.php?update=<?php echo $fetch_products['name']; ?>" class="white-btn">update</a>
         <a href="admin_products.php?delete=<?php echo $fetch_products['name']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section>

   <script src="admin_js.js"></script>
</body>
</html>
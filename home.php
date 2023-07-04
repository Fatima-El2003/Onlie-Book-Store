<?php
    include 'configuration.php';
    session_start();
    $user_id=$_SESSION['user_id'];
    if(!isset($user_id)){
        header('location:login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel="stylesheet" href="books.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <section class="home">
        <div class="content">
            <h3>Hand Picked to your door</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="about.php" class="white-btn">Discover More</a>
        </div>
    </section>
    <section class="products">
        <h1 class="title">Latest Products</h1>
        <div class="box-container">
            <?php
               /* $select_products=mysqli_query($conn,"SELECT * FROM `products`")or die('query failed');
                if(mysqli_num_rows($select_products)>0){
                    while($fetch_products=mysqli_fetch_assoc($select_products)){

                    }
                }*/
            ?>
        </div>
    </section>
    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="images/about-img.jpg" alt="">
            </div>
            <div class="content">
                <h3>About us</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, quo.</p>
                <a href="about.php" class="white-btn">Read More</a>
            </div>
        </div>
     </section>
    <section class="home-contact">
        <div class="content">
        <h3>Do you have any Question?</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
        </p>
        <a href="contact.php" class="white-btn">Contact Us</a>
        </div>

    </section>


    <?php include 'footer.php'; ?>
    <script src="bookshop.js"></script>
</body>
</html>
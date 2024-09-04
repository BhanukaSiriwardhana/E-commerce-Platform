<?php
 session_start();
  include('../includes/connect.php');
  include('../functions/common_function.php');
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username']?>"</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">

    <style>
        .edit_image{
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-body-secondary">
  <div class="container-fluid">
    <img src="../images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_items()?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Total Price : Rs.<?php total_cart_price()?></a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!--<button class="btn btn-outline-light" type="submit">Search</button>-->
        <input type="submit" value="search" class="btn btn-outline-danger" name="search_product_data">
      </form>
    </div>
  </div>
</nav>
      <?php
        cart();
      ?>

    <!--Second Child-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
        <?php
        if(!isset($_SESSION['username'])){
              echo" <li class='nav-item'>
            <a class='nav-link' href='#'>Welcome Guest</a>
         </li>";
            }else{
              echo"<li class='nav-item'>
            <a class='nav-link' href='profile.php'>Welcome ".$_SESSION['username']."</a>
         </li>";
            }
          
            if(!isset($_SESSION['username'])){
              echo" <li class='nav-item'>
            <a class='nav-link' href='user_login.php'>Login</a>
         </li>";
            }else{
              echo"<li class='nav-item'>
            <a class='nav-link' href='logout.php'>Logout</a>
         </li>";
            }
          ?>
        </ul>
    </nav>     
    </div>

    <!--Third Child-->
    <div class="bg-light">
        <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">The customer is at the heart of our unique business model, which includes design.</p>
    </div>

    <!--fourth child-->
    <div class="row">
        <div class="col-md-2 p-0 mb-3">
            <ul class="navbar-nav bg-secondary text-center">

            <li class="nav-item">
          <a class="nav-link active  text-light" href="#"><h4>Your Profile</h4></a>
        </li>

            <?php

                $username=$_SESSION['username'];
                $user_image="Select * from `user_table` where username='$username'";
                $user_image=mysqli_query($con, $user_image);
                $row_image=mysqli_fetch_array($user_image);
                $user_image=$row_image['user_image'];
                echo"  <li class='nav-item bg-danger'>
          <img src='./user_images/$user_image' calss='profile_img my-4' style='width: 100%; height: 100%;' alt=''>
        </li>";

            ?>

        <li class="nav-item">
          <a class="nav-link active  text-light" href="profile.php">Pending Orders</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active  text-light" href="profile.php?edit_account">Edit Account</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active  text-light" href="profile.php?my_orders">My Orders</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active  text-light" href="profile.php?delete_account">Delete Account</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active  text-light" href="logout.php">Log Out</a>
        </li>

            </ul>
        </div>
        <div class="col-md-10 text-center">
            <?php get_user_order_details();
            if(isset($_GET['edit_account'])){
                include('edit_account.php');
            }

            if(isset($_GET['my_orders'])){
                include('user_orders.php');
            }

            if(isset($_GET['delete_account'])){
                include('delete_account.php');
            }
            ?>
        </div>
    </div>
       
 <!--last child-->
 <div class="bg-body-secondary p-3 text-center">
<P>All rights reserved @ - Design by Male Fashion - 2024</P>
</div>

    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>






  
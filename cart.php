<?php
  include('includes/connect.php');
  include('functions/common_function.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website - Cart Details</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img{
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
    <img src="./images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="user_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin_area/admin_registration.php">Become an Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_items()?></sup></a>
        </li>
      </ul>
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
            <a class='nav-link' href=''>Welcome ".$_SESSION['username']."</a>
         </li>";
            }
          
            if(!isset($_SESSION['username'])){
              echo" <li class='nav-item'>
            <a class='nav-link' href='./user_area/user_login.php'>Login</a>
         </li>";
            }else{
              echo"<li class='nav-item'>
            <a class='nav-link' href='./user_area/logout.php'>Logout</a>
         </li>";
            }
          ?>
        </ul>
    </nav>     
    </div>

    <!--Third Child-->
    <div class="bg-light">
        <h3 class="text-center">Cart Details</h3>
        <p class="text-center">The customer is at the heart of our unique business model, which includes design.</p>
    </div>

   

    <!--fourth Child-->
    <div class="container">
        <div class="row">
            <form action="" method="post">
            <table class="table table-border text-center">
              
                    <?php
                         global $con;
                         $get_ip_add = getIPAddress();
                         $total_price=0;
                         
                         $cart_query="Select * from `cart_details` where ip_address='$get_ip_add' ";
                         $result=mysqli_query($con, $cart_query );
                         $result_count=mysqli_num_rows($result);
                         if($result_count > 0){
                            echo"  <thead>
                    <tr>
                        <th>Product title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total price</th>
                        <th>Remove</th>
                        <th colspan='2'>Operations</th>
                    </tr>
                </thead>
                <tbody>";
                         while($row=mysqli_fetch_array($result)){
                             $product_id=$row['product_id'];
                             $select_products="Select * from `products` where product_id='$product_id'";
                             $result_products=mysqli_query($con,$select_products);
                             while($row_product_price=mysqli_fetch_array($result_products)){
                               $product_price=array($row_product_price['product_price']);
                               $price_table=$row_product_price['product_price'];
                               $product_title=$row_product_price['product_title'];
                               $product_image1=$row_product_price['product_image1'];
                               $product_values=array_sum($product_price);
                               $total_price+=$product_values;
                           

                    ?>
                    <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin_area/product_imgs/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php
                       $get_ip_add = getIPAddress();
                       if(isset($_POST['update_cart'])){
                        $quantities=$_POST['qty'];
                        $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                        $result_products_quantity=mysqli_query($con,$update_cart);
                        $total_price=$total_price*$quantities;
                       }

                    ?>
                    <td>Rs.<?php echo $price_table ?></td>
                    <td><input type="checkbox" name="removeitems[]" value="<?php  echo$product_id ?>"></td>
                    <td>
                       <!-- <button class="bg-danger px-3 py-2 border-0 mx-3 text-light">Update</button>-->
                        <input type="submit" value="Update Cart" class="bg-danger px-3 py-2 border-0 mx-3 text-light" name="update_cart">
                        <!--<button class="bg-danger px-3 py-2 border-0 mx-3 text-light">Remove</button>-->
                        <input type="submit" value="Remove Cart" class="bg-danger px-3 py-2 border-0 mx-3 text-light" name="remove_cart">
                    </td>
                    </tr>
                    <?php
                             }
                            }
                        }

                        else{
                            echo"<h2 class='text-center text-danger'> Cart is Empty !</h2>";
                        }
                    ?>
                </tbody>
            </table>
            <div class="d-flex mb-5">
                <?php
                    global $con;
                    $get_ip_add = getIPAddress();
                    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add' ";
                    $result=mysqli_query($con, $cart_query );
                    $result_count=mysqli_num_rows($result);
                    if($result_count > 0){
                            echo"  <h4 class='px-3'>SubTotal: <strong class='text-danger'>Rs.$total_price</strong></h4>
               <input type='submit' value='Continue Shopping' class='bg-light-secondary px-3 py-2 border-0 mx-3 ' name='continue_shopping'>
                
                <button class='bg-danger p-3 py-2 border-0'><a href='./user_area/checkout.php' class='text-light'>CheckOut</a></button>";
                    }else{
                        echo" <input type='submit' value='Continue Shopping' class='bg-light-secondary px-3 py-2 border-0 mx-3 ' name='continue_shopping'>";
                    }
                if(isset($_POST['continue_shopping'])){
                    echo"<script>window.open('index.php', '_self')</script>";
                }
                ?>
              
            </div>
        </div>
    </div>
    </form>

    <!-- function to remove item-->
     <?php
     function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitems'] as $remove_id){
            echo $remove_id;
            $delete_query="Delete from `cart_details` where product_id=$remove_id";
            $run_delete=mysqli_query($con, $delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php', '_self')</script>";
            }
        }
    }

}

echo $remove_item=remove_cart_item();
    ?>
    

       
 <!--last child-->
 <div class="bg-body-secondary p-3 text-center">
<P>All rights reserved @ - Design by Male Fashion - 2024</P>
</div>

    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>






  
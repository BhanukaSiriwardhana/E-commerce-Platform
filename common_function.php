<?php

//include('./includes/connect.php');

function getproducts(){
    global $con;

    //condition to check isset or not
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
    $select_query="Select * from `products` order by rand() limit 0,12";
    $result_query=mysqli_query($con, $select_query );
    
    //echo $row['product_title'];
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo"<div class='col-md-3 mb-2'>
      <div class='card'>
<img src='./admin_area/product_imgs/$product_image1' class='card-img-top' alt='...'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<p class='card-text'>Price: Rs.$product_price</p>
<a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View More</a>
<a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
</div>
</div>
      </div>";
    }

}
}
}

//getting all products
function get_all_products(){
  global $con;

  //condition to check isset or not
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
  $select_query="Select * from `products` order by rand()";
  $result_query=mysqli_query($con, $select_query );
  
  //echo $row['product_title'];
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo"<div class='col-md-3 mb-2'>
    <div class='card'>
<img src='./admin_area/product_imgs/$product_image1' class='card-img-top' alt='...'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<p class='card-text'>Price: Rs.$product_price</p>
<a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View More</a>
<a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
</div>
</div>
    </div>";
  }

}
}
}


//getting unique categories
function get_unique_categories(){
  global $con;

  //condition to check isset or not
  if(isset($_GET['category'])){
    $category_id=$_GET['category'];

  $select_query="Select * from `products` where category_id= $category_id";
  $result_query=mysqli_query($con, $select_query );
  $num_of_rows=mysqli_num_rows($result_query);
  if( $num_of_rows == 0){
    echo"<h3 class='text-center text-danger mt-5'>No stock for this category !</h3>";
  }
  
  //echo $row['product_title'];
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo"<div class='col-md-3 mb-2'>
    <div class='card'>
<img src='./admin_area/product_imgs/$product_image1' class='card-img-top' alt='...'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<p class='card-text'>Price: Rs.$product_price</p>
<a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View More</a>
<a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
</div>
</div>
    </div>" ;
  }

}
}



//getting unique categories
function get_unique_brands(){
  global $con;

  //condition to check isset or not
  if(isset($_GET['brand'])){
    $brand_id=$_GET['brand'];

  $select_query="Select * from `products` where brand_id= $brand_id";
  $result_query=mysqli_query($con, $select_query );
  $num_of_rows=mysqli_num_rows($result_query);
  if( $num_of_rows == 0){
    echo"<h3 class='text-center text-danger mt-5'>No stock for this Brand  !</h3>";
  }

  
  //echo $row['product_title'];
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo"<div class='col-md-3 mb-2'>
    <div class='card'>
<img src='./admin_area/product_imgs/$product_image1' class='card-img-top' alt='...'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>Price: Rs.$product_price</p>
<a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View More</a>
<a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
</div>
</div>
    </div>";
  }

}
}

function getbrands(){
    global $con;
    $select_brands="Select * from `brands` ";
    $result_brands=mysqli_query($con, $select_brands);   
    while( $row_data=mysqli_fetch_assoc($result_brands)){
      $brand_title=$row_data['brand_title'];
      $brand_id=$row_data['brand_id'];
      echo" <li class='nav-item'>
   <a href='index.php?brand=$brand_id' class='nav-link text-dark'>$brand_title</a> 
</li>";
    }
}


function getcategories(){
    global $con;
    $select_categories="Select * from `categories` ";
    $result_categories=mysqli_query($con, $select_categories);   
    while( $row_data=mysqli_fetch_assoc($result_categories)){
      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
      echo" <li class='nav-item'>
   <a href='index.php?category=$category_id' class='nav-link text-dark'>$category_title</a> 
</li>";
    }
}


//searching products
function search_products(){
  global $con;
  if(isset($_GET['search_data'])){
    $search_data_value=$_GET['search_data'];
  $search_query="Select * from `products` where product_keywords like'%$search_data_value%'";
  $result_query=mysqli_query($con, $search_query );
  $num_of_rows=mysqli_num_rows($result_query);
  if( $num_of_rows == 0){
    echo"<h3 class='text-center text-danger mt-5'>Sorry, we couldn't find any products matching your search !</h3>";
  }
  
  //echo $row['product_title'];
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo"<div class='col-md-3 mb-2'>
    <div class='card'>
<img src='./admin_area/product_imgs/$product_image1' class='card-img-top' alt='...'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<p class='card-text'>Price: Rs.$product_price</p>
<a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View More</a>
<a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
</div>
</div>
    </div>";
  }

}
}


//view details function
function view_details(){
  global $con;

  //condition to check isset or not
  if(isset($_GET['product_id']))
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
      $product_id=$_GET['product_id'];
  $select_query="Select * from `products` where product_id=$product_id";
  $result_query=mysqli_query($con, $select_query );
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo"<div class='row'>
          <div class='col-md-10 mb-2'>
           <!--Products-->
          <div class='row'>
          <div class='container'>
            <div class='card'>
    <div class='card-body'>
  <h3 class='card-title'>$product_title</h3>
      <div class='row'>
      <div class='col-lg-5 col-md-5 col-sm-6'>
      <div class='white-box text-center'><img src='./admin_area/product_imgs/$product_image1' class='img-responsive'></div>
      </div>
     <div class='col-lg-7 col-md-7 col-sm-6'>
      <h4 class='box-title mt-5'>Product description</h4>
      <p>$product_description</p>
      <h2 class='mt-5'>
      Rs.$product_price<small class='text-success'>(36%off)</small>
      </h2>
        <button class='btn btn-dark btn-rounded mr-1' data-toggle='tooltip' title='' data-original-title='Add to cart'>
        <a href='index.php?add_to_cart=$product_id'><i class='fa fa-shopping-cart'></i></a>
          </button>
          <a href='index.php'><button class='btn btn-primary btn-rounded'>Go home</button></a>
          <h3 class='box-title mt-5'>Key Highlights</h3>
          <ul class='list-unstyled'>
            <li><i class='fa fa-check text-success'></i>Sturdy structure</li>
            <li><i class='fa fa-check text-success'></i>Designed to foster easy portability</li>
             <li><i class='fa fa-check text-success'></i>Perfect furniture to flaunt your wonderful collectibles</li>
            </ul>
            </div>
            </div>
          </div>
        
      </div>
    </div>


<div class='col-md-4  bg-body-light p-0 mb-2'>
<h3 class='text-center text-danger'>Related Products</h3>
<div class='card m-4'>
<img src='./admin_area/product_imgs/$product_image2' class='card-img-top' alt='...'>
</div>

<div class='card m-4'>
<img src='./admin_area/product_imgs/$product_image3' class='card-img-top' alt='...'>
</div>
</div>
    
    
       
  
    ";
  }

}
}
}


//get ip address function
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  


//cart function
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];

    $select_query="Select * from `cart_details` where ip_address='$get_ip_add'  and product_id=$get_product_id";
    $result_query=mysqli_query($con, $select_query );
    $num_of_rows=mysqli_num_rows($result_query);
  if( $num_of_rows > 0){
    echo"<script>alert('This item is already present inside cart !')</script>";
    echo"<script>window.open('../cart.php','self')</script>";
  }else{
    $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
    $result_query=mysqli_query($con, $insert_query );
    echo"<script>alert('This item is added to the cart successfully !')</script>";
    echo"<script>window.open('../cart.php','self')</script>";
  }
  }
  
}


//function to get cart items numbers
function cart_items(){
  
if(isset($_GET['add_to_cart'])){
  global $con;
  $get_ip_add = getIPAddress();
  $select_query="Select * from `cart_details` where ip_address='$get_ip_add' ";
  $result_query=mysqli_query($con, $select_query );
  $count_cart_items=mysqli_num_rows($result_query);
}else
{
global $con;
$get_ip_add = getIPAddress();
$select_query="Select * from `cart_details` where ip_address='$get_ip_add' ";
$result_query=mysqli_query($con, $select_query );
$count_cart_items=mysqli_num_rows($result_query);
}
echo$count_cart_items;
}


//total price function
function total_cart_price(){
  global $con;
  $get_ip_add = getIPAddress();
  $total_price=0;
  
  $cart_query="Select * from `cart_details` where ip_address='$get_ip_add' ";
  $result=mysqli_query($con, $cart_query );
  while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $select_products="Select * from `products` where product_id='$product_id'";
      $result_products=mysqli_query($con,$select_products);
      while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
      }
  }
  echo $total_price;
}


//get user order details
function get_user_order_details(){
  global $con;
  $username=$_SESSION['username'];
  $get_details="Select * from `user_table` where username='$username'";
  $result_query=mysqli_query($con, $get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
          $get_orders="Select * from `user_orders` where user_id=$user_id and
          order_status='pending'";
          $result_orders_query=mysqli_query($con, $get_orders);
          $row_count=mysqli_num_rows($result_orders_query);
          if($row_count>0){
            echo"<h3 class='text-center mt-5'>You have <span class='text-danger'> $row_count </span> pending orders</h3>";
          }
          else{
            echo"<h3 class='text-center mt-5'>You have <span class='text-danger'> ZERO </span> pending orders</h3>";
          }
        }
      }
    }
  }
}
?>
<?php
session_start();
include('../includes/connect.php');

if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php"); // Redirect to login if not logged in
    exit();
}

$admin_username = $_SESSION['admin_username'];

// Query to get the admin data
$query = "SELECT admin_image FROM admin_table WHERE admin_name='$admin_username'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $admin_image = $row['admin_image'];
} else {
    $admin_image = 'default.png'; // Fallback image if no image is found
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
     <!--bootstrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">

    <style>
        .footer{
    position:absolute;

}
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-body-secondary">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <ul class="navbar-nav me-auto">

                            <li class="nav-item mt-3">
                            <h6>Welcome <?php echo htmlspecialchars($admin_username); ?></h6>
                             </li>

                             <li class="nav-item">
                             <img class="rounded-img" src="admin_images/<?php echo htmlspecialchars($admin_image); ?>" alt="Admin Image">
                            </li>
                        </ul>
                           
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        </div>

        <div class="row m-2">

        <div class="col-md-2  bg-body-secondary p-0 ">
    
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-danger">
                   <a href="#" class="nav-link text-light"><h5>Dashboard</h5></a> 
                </li>

                <li class="nav-item ">
                   <button><a href="index.php?insert_products" class="nav-link text-light bg-secondary my-1">Insert Products</a></button>
                </li>

                <li class="nav-item ">
                   <button><a href="" class="nav-link text-light bg-secondary my-1">View Products</a></button>
                </li>

                <li class="nav-item ">
                   <button><a href="index.php?insert_category" class="nav-link text-light bg-secondary my-1">Insert Categories</a></button>
                </li>

                <li class="nav-item ">
                   <button><a href="" class="nav-link text-light bg-secondary my-1">View Categories</a></button>
                </li>

                <li class="nav-item ">
                   <button><a href="index.php?insert_brands" class="nav-link text-light bg-secondary my-1">Insert Brands</a></button>
                </li>

                <li class="nav-item ">
                   <button><a href="" class="nav-link text-light bg-secondary my-1">View Brands</a></button>
                </li>

                <li class="nav-item ">
                   <button><a href="" class="nav-link text-light bg-secondary my-1">All Orders</a></button>
                </li>

                <li class="nav-item ">
                   <button><a href="" class="nav-link text-light bg-secondary my-1">All Payments</a></button>
                </li>

                <li class="nav-item ">
                   <button><a href="" class="nav-link text-light bg-secondary my-1">List of Users</a></button>
                </li>

                <li class="nav-item ">
                   <button><a href="index.php?logout" class="nav-link text-light bg-secondary my-1">Log Out</a></button>
                </li>
                
            </ul>
            
        </div>
           
        <div class="col-md-9">
       
        <div class="container my-5">
            <?php
                if(isset($_GET['insert_category'])){
                    include('insert_categories.php');
                }

                if(isset($_GET['insert_brands'])){
                    include('insert_brands.php');
                }

                if(isset($_GET['insert_products'])){
                    include('insert_products.php');
                }

                if(isset($_GET['logout'])){
                    include('../user_area/logout.php');
                }
            ?>
        </div>
           </div>

        </div>

        
    
        <div class="bg-body-secondary p-3 text-center footer">
<P>All rights reserved @ - Design by Male Fashion - 2024</P>
</div>

    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
session_start();
include('../includes/connect.php');
include('../functions/common_function.php');

if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    // Prepare and execute the query to get user data
    $select_query = "SELECT * FROM `user_table` WHERE username = ?";
    if ($stmt_user = mysqli_prepare($con, $select_query)) {
        mysqli_stmt_bind_param($stmt_user, 's', $user_username);
        mysqli_stmt_execute($stmt_user);
        $result_user = mysqli_stmt_get_result($stmt_user);
        $row_data = mysqli_fetch_assoc($result_user);
        mysqli_stmt_close($stmt_user);
    } else {
        echo "<script>alert('Error preparing user query');</script>";
    }

    // Check if user exists
    if ($row_data) {
        if (password_verify($user_password, $row_data['user_password'])) {
            // Prepare and execute the query to get cart data
            $user_ip = getIPAddress();
            $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address = ?";
            if ($stmt_cart = mysqli_prepare($con, $select_query_cart)) {
                mysqli_stmt_bind_param($stmt_cart, 's', $user_ip);
                mysqli_stmt_execute($stmt_cart);
                $result_cart = mysqli_stmt_get_result($stmt_cart);
                $row_count_cart = mysqli_num_rows($result_cart);
                mysqli_stmt_close($stmt_cart);
            } else {
                echo "<script>alert('Error preparing cart query');</script>";
            }

            // Set session and redirect
            $_SESSION['username'] = $user_username;
            if ($row_count_cart == 0) {
                echo "<script>alert('Login successfully');</script>";
                echo "<script>window.open('../index.php', '_self');</script>";
            } else {
                echo "<script>alert('Login successfully');</script>";
                echo "<script>window.open('payment.php', '_self');</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials');</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid my-3 mt-5 align-items-center justify-content-center">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter Your User Name" autocomplete="off" required="required" name="user_username">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Login" class="bg-danger py-2 px-3 border-0 text-light" name="user_login">
                        <p class="small fw-bold mt-2 pt-1">Don't have an Account? <a href="user_registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

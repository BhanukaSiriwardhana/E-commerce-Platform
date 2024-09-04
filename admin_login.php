<?php
include('../includes/connect.php');
@session_start();

if (isset($_POST['admin_login'])) {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    // Query to select the user
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_username'";
    $result = mysqli_query($con, $select_query);

    if (mysqli_num_rows($result) > 0) {
        // Fetch user data
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['admin_password'];

        // Verify password
        if (password_verify($admin_password, $hashed_password)) {
            // Start session
            session_start();
            $_SESSION['admin_username'] = $admin_username;

            // Redirect to a dashboard or admin panel
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Invalid password.')</script>";
        }
    } else {
        echo "<script>alert('No user found with that username.')</script>";
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
        <h2 class="text-center">Admin Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="admin_username" class="form-label">Username</label>
                        <input type="text" id="admin_username" class="form-control" placeholder="Enter Your User Name" autocomplete="off" required="required" name="admin_username">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="admin_password">
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Login" class="bg-danger py-2 px-3 border-0 text-light" name="admin_login">
                        <p class="small fw-bold mt-2 pt-1">Don't have an Account? <a href="admin_registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
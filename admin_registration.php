<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="container-fluid my-3">
        <h2 class="text-center">Admin Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="admin_username" class="form-label">Username</label>
                        <input type="text" id="admin_username" class="form-control" placeholder="Enter Your User Name" autocomplete="off" required="required" name="admin_username">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label">User Email</label>
                        <input type="email" id="admim_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="admin_email">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="admin_image" class="form-label">User Image</label>
                        <input type="file" id="admin_image" class="form-control" required="required" name="admin_image">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="admin_password">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="conf_admin_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_admin_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required" name="conf_admin_password">
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Register" class="bg-danger py-2 px-3 border-0 text-light" name="admin_register">
                        <p class="small fw-bold mt-2 pt-1">Already have an Account? <a href="admin_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
</body>
</html> 


<?php

if(isset($_POST['admin_register'])){
    $admin_username=$_POST['admin_username'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password, PASSWORD_DEFAULT);
    $conf_admin_password=$_POST['conf_admin_password'];
    $admin_image=$_FILES['admin_image']['name'];
    $admin_image_tmp=$_FILES["admin_image"]['tmp_name'];
    $user_ip=getIPAddress();


$select_query="Select * from `admin_table` where admin_name='$admin_username' or admin_email='$admin_email'";
$result=mysqli_query($con, $select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo"<script>alert('Username or User Email already exist')</script>";
}
else if($admin_password!=$conf_admin_password){
    echo"<script>alert('Passwords Do not match !')</script>";
}
else{
//insert query
move_uploaded_file($admin_image_tmp,"./admin_images/$admin_image");
$insert_query="insert into `admin_table` (admin_name,admin_email,admin_image,admin_password) values ('$admin_username','$admin_email', '$admin_image', '$hash_password' )";
$sql_execute=mysqli_query($con, $insert_query);
if($sql_execute){
    echo"<script>alert('Data inserted Successfully')</script>";
}
else{
    die(mysqli_error($con));
}
}

}
?>
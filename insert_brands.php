<?php
    include('../includes/connect.php');
     if(isset($_POST['insert_brands'])){
        $brand_title=$_POST['brand_title'];

        //select data from database
         $select_query="Select * from `brands` where brand_title='$brand_title'";
         $result_select=mysqli_query($con,$select_query);
         $number=mysqli_num_rows($result_select);
         if($number>0){
            echo "<script>alert('This Brand is already Exist')</script>";
         }
         else{
        $insert_query="insert into `brands` (brand_title) values ('$brand_title')";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('Brand has been inserted successfully')</script>";
        }
     }
    }
?>

<h2 class="text-danger text-center m-2">Insert Brands</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-3" >
  <div class="input-group-prepend">
    <span class="input-group-text bg-danger m-1" id="basic-addon1"><i class="fa fa-plus-square" aria-hidden="true"></i></span>
  </div>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-2 " >
<input type="submit" class="bg-danger border-0 p-2 my-3 text-light" name="insert_brands" placeholder="Insert Brands" value="Insert Brands" >

</div>

</form>
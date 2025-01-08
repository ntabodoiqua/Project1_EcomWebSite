<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký cho Admin</title>
</head>
<!-- bootstrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
crossorigin="anonymous" 
referrerpolicy="no-referrer" />
<style>
    body{
        overflow: hidden;
    }
</style>
<body>
    <div class="containter-fluid m-3">
<h2 class="text-center mb-5">Đăng ký cho Admin</h2>
<div class="row d-flex justify-content-center">
    <div class="col-lg-6 col-xl-5">
        <img src="../images/admin_login.jpg" alt="admin regis" 
        class="img-fluid">
    </div>
    <div class="col-lg-6 col-xl-4">
        <form action="" method="post">
            <div class="form-outline mb-4">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <input type="text" id="username" name="username"
                placeholder="Nhập tên đăng nhập" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email"
                placeholder="Nhập email của bạn" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" id="password" name="password"
                placeholder="Nhập mật khẩu của bạn" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="conf_password" class="form-label">Xác nhận mật khẩu</label>
                <input type="password" id="conf_password" name="conf_password"
                placeholder="Xác nhận mật khẩu của bạn" required="required" class="form-control">
            </div>
            <div>
                <input type="submit" class="bg-success text-light py-2 px-3 border-0"
                name="admin_registration" value="Đăng ký">
                <p class="small fw-bold mt-2 pt-1">Đã có tài khoản Admin? <a href="admin_login.php" class="link-danger">Đăng nhập</a></p>
            </div>
        </form>
    </div>
</div>
    </div>
</body>
</html>

<!-- php -->
<?php

if(isset($_POST['admin_registration'])){
    $admin_name=$_POST['username'];
    $admin_email=$_POST['email'];
    $admin_password=$_POST['password'];
    $hash_password=password_hash($admin_password, PASSWORD_DEFAULT);
    $conf_admin_password=$_POST['conf_password'];
    // select query
    $select_query="select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0) {
        echo "<script>alert('Admin name hoặc email đã tồn tại!')</script>";
    }
    else if($admin_password!=$conf_admin_password){
        echo "<script>alert('Mật khẩu xác nhận không chính xác!')</script>";
    }
    else{
        // insert query
    $insert_query="insert into `admin_table` (admin_name, admin_email, admin_password)
    values ('$admin_name', '$admin_email', '$hash_password')";
    $sql_exec=mysqli_query($con,$insert_query);
    if($sql_exec){
        echo "<script>alert('Đăng ký thành công! Hãy đăng nhập để sử dụng')</script>
        <script>window.open('admin_login.php','_self')</script>";
       
    }else{
        die(mysqli_error($con));
    }
    }
    
}
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký người dùng mới</title>
    <!-- bootstrap CSS link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center my-3">Đăng ký người dùng mới</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!-- usermame -->
                        <label for="user_username" class="form-label">Tên đăng nhập:</label>
                        <input type="text" id="user_username" class="form-control"  placeholder="Điền tên đăng nhập" autocomplete="off" required="required" name="user_username"/>
                    </div>
                    <div class="form-outline mb-4">
                        <!-- email -->
                        <label for="user_email" class="form-label">Email:</label>
                        <input type="text" id="user_email" class="form-control"  placeholder="Điền email của bạn" autocomplete="off" required="required" name="user_email"/>
                    </div>
                    <div class="form-outline mb-4">
                        <!-- avatar -->
                        <label for="user_avatar" class="form-label">Ảnh đại diện:</label>
                        <input type="file" id="user_avatar" class="form-control" required="required" name="user_avatar"/>
                    </div>
                    <div class="form-outline mb-4">
                        <!-- password -->
                        <label for="user_password" class="form-label">Mật khẩu:</label>
                        <input type="password" id="user_password" class="form-control"  placeholder="Nhập mật khẩu" autocomplete="off" required="required" name="user_password"/>
                    </div>
                    <div class="form-outline mb-4">
                        <!-- confirm password -->
                        <label for="conf_user_password" class="form-label">Xác nhận mật khẩu:</label>
                        <input type="password" id="conf_user_password" class="form-control"  placeholder="Xác nhận mật khẩu của bạn" autocomplete="off" required="required" name="conf_user_password"/>
                    </div>
                    <div class="form-outline mb-4">
                        <!-- adđress -->
                        <label for="user_address" class="form-label">Địa chỉ:</label>
                        <input type="text" id="user_address" class="form-control"  placeholder="Điền địa chỉ" autocomplete="off" required="required" name="user_address"/>
                    </div>
                    <div class="form-outline mb-4">
                        <!-- phone -->
                        <label for="user_phone" class="form-label">Số điện thoại liên hệ:</label>
                        <input type="text" id="user_phone" class="form-control"  placeholder="Nhập SĐT của bạn" autocomplete="off" required="required" name="user_phone"/>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Đăng ký" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 mt-2 pt-1">Đã có tài khoản? <a href="user_login.php" class="text-danger">Đăng nhập</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!--  -->
<?php

if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_avatar=$_FILES['user_avatar']['name'];
    $user_avatar_temp=$_FILES['user_avatar']['tmp_name'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_phone=$_POST['user_phone'];
    $user_ip=getIPAddress();
    // select query
    $select_query="select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0) {
        echo "<script>alert('Người dùng hoặc email đã tồn tại!')</script>";
    }
    else if($user_password!=$conf_user_password){
        echo "<script>alert('Mật khẩu xác nhận không chính xác!')</script>";
    }
    else{
        // insert query
    move_uploaded_file($user_avatar_temp, "./user_images/$user_avatar");
    $insert_query="insert into `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_phone)
    values ('$user_username', '$user_email', '$hash_password', '$user_avatar', '$user_ip', '$user_address', '$user_phone')";
    $sql_exec=mysqli_query($con,$insert_query);
    if($sql_exec){
        echo "<script>alert('Đăng ký thành công! Hãy đăng nhập để sử dụng')</script>
        <script>window.open('user_login.php','_self')</script>";
       
    }else{
        die(mysqli_error($con));
    }
    }
    
}

// select cart items
// $select_cart_item="select * from `cart_details` where ip_address = '$user_ip'";
// $result_cart=mysqli_query($con,$select_cart_item);
// $rows_count2=mysqli_num_rows($result_cart);
// if ($rows_count2>0) {
//     $_SESSION['username']=$user_username;
//     echo "<script>alert('Bạn có hàng trong giỏ')</script>";
//     echo "<script>window.open('check_out.php','_self')</script>";
// } else {
//     echo "<script>window.open('../index.php','_self')</script>";
// }

?>
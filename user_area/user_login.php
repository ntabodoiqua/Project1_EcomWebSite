<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <!-- bootstrap CSS link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center my-3">Đăng nhập</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <!-- usermame -->
                        <label for="user_username" class="form-label">Tên đăng nhập:</label>
                        <input type="text" id="user_username" class="form-control"  placeholder="Điền tên đăng nhập" autocomplete="off" required="required" name="user_username"/>
                    </div>
                    <div class="form-outline mb-4">
                        <!-- password -->
                        <label for="user_password" class="form-label">Mật khẩu:</label>
                        <input type="password" id="user_password" class="form-control"  placeholder="Nhập mật khẩu" autocomplete="off" required="required" name="user_password"/>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Đăng nhập" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 mt-2 pt-1">Chưa có tài khoản? <a href="user_registration.php" class="text-danger">Đăng ký</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $select_query="select * from `user_table` where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    // cart item
    $select_query_cart="select * from `cart_details` where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);

    if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password, $row_data['user_password'])){
            // echo "<script>alert('Đăng nhập thành công!')</script>";
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Đăng nhập thành công!')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            } else{    
                $_SESSION['username']=$user_username;
                echo "<script>alert('Đăng nhập thành công!')</script>";
                echo "<script>window.open('check_out.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Sai mật khẩu!')</script>";
        }
    } else {
        echo "<script>alert('Không tồn tại tên đăng nhập!')</script>";
    }
}

?>
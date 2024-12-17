<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập cho Admin</title>
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
<h2 class="text-center mb-5">Đăng nhập cho Admin</h2>
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
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" id="password" name="password"
                placeholder="Nhập mật khẩu của bạn" required="required" class="form-control">
            </div>
            <div>
                <input type="submit" class="bg-success text-light py-2 px-3 border-0"
                name="admin_login" value="Đăng nhập">
                <p class="small fw-bold mt-2 pt-1">Chưa có tài khoản Admin? <a href="admin_registration.php" class="link-danger">Đăng ký</a></p>
            </div>
        </form>
    </div>
</div>
    </div>
</body>
</html>

<?php
if(isset($_POST['admin_login'])){
    $admin_name=$_POST['username'];
    $admin_password=$_POST['password'];
    $select_query="select * from `admin_table` where admin_name='$admin_name'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    // cart item
    if($row_count>0){
        $_SESSION['username']=$admin_name;
        if(password_verify($admin_password, $row_data['admin_password'])){
                $_SESSION['username']=$admin_name;
                echo "<script>alert('Đăng nhập thành công!')</script>";
                echo "<script>window.open('index.php','_self')</script>";
        }else{
            echo "<script>alert('Sai mật khẩu!')</script>";
        }
    } else {
        echo "<script>alert('Không tồn tại tên đăng nhập!')</script>";
    }
}

?>
<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang cá nhân</title>
<!-- bootstrap CSS link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
crossorigin="anonymous">
<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
crossorigin="anonymous" 
referrerpolicy="no-referrer" />

<!-- css file -->
 <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="../images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Tài khoản của tôi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contact_us.php">Liên hệ chúng tôi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup> Giỏ hàng </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php">Tổng cần thanh toán: <?php echo total_cart_price()?> VNĐ</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
         <input type="submit" value="Tìm kiếm" class="btn btn-outline" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
<!-- call cart func -->
<?php
cart();
?>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
        <?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest!</a>
        </li>";
        } else {
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."!</a>
        </li>";
        }
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/user_login.php'>Đăng nhập</a>
        </li>";
        } else {
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/user_logout.php'>Đăng xuất</a>
        </li>";
        }
        ?>
    </ul>
</nav>

<!-- third child -->
 <div class="bg-light">
    <h3 class="text-center">Laptop Thế Anh</h3>
    <p class="text-center">Define your style</p>
 </div>

<!-- fourth child -->
 <div class="row">
  <div class="col-md-2 p-0">
        <ul class="navbar-nav bg-secondary text-center">
        <li class="nav-item bg-info">
          <a class="nav-link text-light" href="#"><h4>Tài khoản của bạn</h4></a>
        </li>
        <?php
        $username=$_SESSION['username'];
        $user_image="select * from `user_table` where username='$username'";
        $result_image=mysqli_query($con,$user_image);
        $row_image=mysqli_fetch_array($result_image);
        $user_image=$row_image['user_image'];
        echo "<li class='image_container'>
          <img src='./user_images/$user_image' class='profile_image my-4' alt='Profile'>
        </li>"
        ?>
        
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php">Đơn hàng chờ thanh toán</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?edit_account">Chỉnh sửa thông tin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?my_orders">Đơn hàng của tôi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?delete_account">Xóa tài khoản</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="user_logout.php">Đăng xuất</a>
        </li>
        </ul>
  </div>
  <div class="col-md-10 text-center">
    <?php get_user_order_details();
    if (isset(($_GET['edit_account']))){
      include('edit_account.php');
    }
    if (isset(($_GET['my_orders']))){
      include('user_orders.php');
    }
    if (isset(($_GET['delete_account']))){
      include('delete_account.php');
    }
    ?>
  </div>
 </div>

<!-- last child -->
<?php
include("../includes/footer.php");
?>
     </div>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
crossorigin="anonymous"></script>
</body>
</html>
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
if(!isset($_SESSION['username'])){
    echo "<script>window.open('../index.php', '_self')</script>";
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
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
<!-- css file -->  
 <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg navbar-light bg-info">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a href="" class="nav-link"><?php echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."!</a>
        </li>"?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>


        <!-- second child -->
         <div class="bg-light">
            <h3 class="text-center p-2">Quản lý chi tiết</h3>
         </div>

         <!-- third child -->
         <div class="row">
    <div class="col-md-12 bg-secondary p-3 d-flex align-items-center justify-content-between">
        <!-- Admin Avatar and Name -->
        <div class="d-flex align-items-center">
            <a href="#" class="d-block">
                <img src="../images/hacker-nga.webp" alt="Admin Avatar" class="admin_ava rounded-circle border border-light" style="width: 70px; height: 70px;">
            </a>
            <div class="ms-3">
                <p class="text-light mb-0"><?php echo "<li class='nav-item'>
          <a class='nav-link' href='#'>".$_SESSION['username']."</a>
        </li>"?></p>
                <small class="text-danger">Quản trị viên</small>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="button text-center">
            <div class="d-flex flex-wrap gap-2">
                <a href="index.php?insert_product" class="btn btn-info text-light px-4 py-2">Thêm sản phẩm</a>
                <a href="index.php?view_products" class="btn btn-info text-light px-4 py-2">Xem sản phẩm</a>
                <a href="index.php?insert_categories" class="btn btn-info text-light px-4 py-2">Thêm danh mục</a>
                <a href="index.php?view_categories" class="btn btn-info text-light px-4 py-2">Xem danh mục</a>
                <a href="index.php?insert_brands" class="btn btn-info text-light px-4 py-2">Thêm hãng</a>
                <a href="index.php?view_brands" class="btn btn-info text-light px-4 py-2">Xem hãng</a>
                <a href="index.php?list_orders" class="btn btn-info text-light px-4 py-2">Đơn đặt hàng hiện tại</a>
                <a href="index.php?list_payments" class="btn btn-info text-light px-4 py-2">Đơn đã giao</a>
                <a href="index.php?list_users" class="btn btn-info text-light px-4 py-2">Danh sách người dùng</a>
                <a href="index.php?log_out" class="btn btn-danger text-light px-4 py-2">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>



     <!-- fourth child -->
<div class="container my-3">
    <?php
    if(isset($_GET['insert_product'])) {
        include('insert_product.php');
    }
    if(isset($_GET['insert_categories'])) {
        include('insert_categories.php');
    }
    if(isset($_GET['insert_brands'])) {
        include('insert_brands.php');
    }
    if(isset($_GET['view_products'])) {
        include('view_products.php');
    }
    if(isset($_GET['edit_products'])) {
        include('edit_products.php');
    }
    if(isset($_GET['delete_products'])) {
        include('delete_products.php');
    }
    if(isset($_GET['view_categories'])) {
        include('view_categories.php');
    }
    if(isset($_GET['view_brands'])) {
        include('view_brands.php');
    }
    if(isset($_GET['edit_category'])) {
        include('edit_category.php');
    }
    if(isset($_GET['edit_brand'])) {
        include('edit_brand.php');
    }
    if(isset($_GET['delete_category'])) {
        include('delete_category.php');
    }
    if(isset($_GET['delete_brand'])) {
        include('delete_brand.php');
    }
    if(isset($_GET['list_orders'])) {
        include('list_orders.php');
    }
    if(isset($_GET['list_payments'])) {
        include('list_payments.php');
    }
    if(isset($_GET['delete_order'])) {
        include('delete_order.php');
    }
    if(isset($_GET['delete_payment'])) {
        include('delete_payment.php');
    }
    if(isset($_GET['list_users'])) {
        include('list_users.php');
    }
    if(isset($_GET['delete_user'])) {
        include('delete_user.php');
    }
    if(isset($_GET['log_out'])) {
        include('admin_logout.php');
    }
    ?>
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
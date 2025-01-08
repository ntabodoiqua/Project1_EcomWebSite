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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
        <div class="d-flex align-items-center w-100">
            <img src="../images/logo.png" alt="" class="logo me-3">
            <ul class="navbar-nav mb-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <?php echo "Welcome " . $_SESSION['username'] . "!"; ?>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>




        <!-- second child -->
         <div class="bg-light">
            <h3 class="text-center p-2">Quản lý chi tiết</h3>
         </div>

         <!-- third child -->
         <div class="row">
    <div class="col-md-12 bg-secondary p-3 d-flex align-items-center gap-3">
        <!-- Thông tin quản trị viên -->
        <div class="admin-info d-flex align-items-center gap-3">
            <a href="#">
                <img src="../images/hacker-nga.webp" alt="Admin Avatar" class="admin-avatar rounded-circle border border-light" style="width: 70px; height: 70px;">
            </a>
            <div>
                <p class="text-light fw-bold mb-0">
                    <?php echo "<a class='text-light text-decoration-none' href='#'>".$_SESSION['username']."</a>"; ?>
                </p>
                <small class="text-danger">Quản trị viên</small>
            </div>
        </div>

        <!-- Thanh điều hướng dạng dropdown -->
        <nav class="admin-nav d-flex align-items-center gap-3 flex-grow-1">
            <div class="dropdown">
                <button class="btn btn-info text-light px-4 py-2 dropdown-toggle" type="button" id="productMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    Quản lý sản phẩm
                </button>
                <ul class="dropdown-menu" aria-labelledby="productMenu">
                    <li><a class="dropdown-item" href="index.php?insert_product">Thêm sản phẩm</a></li>
                    <li><a class="dropdown-item" href="index.php?view_products">Xem sản phẩm</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <button class="btn btn-info text-light px-4 py-2 dropdown-toggle" type="button" id="categoryMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    Quản lý danh mục
                </button>
                <ul class="dropdown-menu" aria-labelledby="categoryMenu">
                    <li><a class="dropdown-item" href="index.php?insert_categories">Thêm danh mục</a></li>
                    <li><a class="dropdown-item" href="index.php?view_categories">Xem danh mục</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <button class="btn btn-info text-light px-4 py-2 dropdown-toggle" type="button" id="brandMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    Quản lý hãng
                </button>
                <ul class="dropdown-menu" aria-labelledby="brandMenu">
                    <li><a class="dropdown-item" href="index.php?insert_brands">Thêm hãng</a></li>
                    <li><a class="dropdown-item" href="index.php?view_brands">Xem hãng</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <button class="btn btn-info text-light px-4 py-2 dropdown-toggle" type="button" id="orderMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    Quản lý đơn hàng
                </button>
                <ul class="dropdown-menu" aria-labelledby="orderMenu">
                    <li><a class="dropdown-item" href="index.php?list_orders">Đơn đặt hàng</a></li>
                    <li><a class="dropdown-item" href="index.php?list_payments">Đơn đã xác nhận</a></li>
                    <li><a class="dropdown-item" href="index.php?list_cancelled">Đơn đã hủy</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <button class="btn btn-info text-light px-4 py-2 dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    Quản lý người dùng
                </button>
                <ul class="dropdown-menu" aria-labelledby="userMenu">
                    <li><a class="dropdown-item" href="index.php?list_users">Danh sách người dùng</a></li>
                    <li><a class="dropdown-item text-danger" href="index.php?log_out">Đăng xuất</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <button class="btn btn-info text-light px-4 py-2 dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    Hướng dẫn sử dụng
                </button>
                <ul class="dropdown-menu" aria-labelledby="userMenu">
                    <li><a class="dropdown-item" href="https://drive.google.com/file/d/1IRVcYtHEAJbte6PX71yQ5GZoWjzfRmN9/view?usp=sharing" target="_blank">Tải PDF HDSD</a></li>
                    <li><a class="dropdown-item" href="index.php?VIDEO_HDSD">Xem video HDSD</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>



     <!-- fourth child -->
<div class="container my-3">
    <?php
    if(isset($_GET['insert_product'])) {
        include('insert_product.php');
    }
    else if(isset($_GET['insert_categories'])) {
        include('insert_categories.php');
    }
    else if(isset($_GET['insert_brands'])) {
        include('insert_brands.php');
    }
    else if(isset($_GET['view_products'])) {
        include('view_products.php');
    }
    else if(isset($_GET['edit_products'])) {
        include('edit_products.php');
    }
    else if(isset($_GET['delete_products'])) {
        include('delete_products.php');
    }
    else if(isset($_GET['view_categories'])) {
        include('view_categories.php');
    }
    else if(isset($_GET['view_brands'])) {
        include('view_brands.php');
    }
    else if(isset($_GET['edit_category'])) {
        include('edit_category.php');
    }
    else if(isset($_GET['edit_brand'])) {
        include('edit_brand.php');
    }
    else if(isset($_GET['delete_category'])) {
        include('delete_category.php');
    }
    else if(isset($_GET['delete_brand'])) {
        include('delete_brand.php');
    }
    else if(isset($_GET['list_orders'])) {
        include('list_orders.php');
    }
    else if(isset($_GET['list_payments'])) {
        include('list_payments.php');
    }
    else if(isset($_GET['delete_order'])) {
        include('delete_order.php');
    }
    else if(isset($_GET['delete_payment'])) {
        include('delete_payment.php');
    }
    else if(isset($_GET['list_users'])) {
        include('list_users.php');
    }
    else if(isset($_GET['delete_user'])) {
        include('delete_user.php');
    }
    else if(isset($_GET['log_out'])) {
        include('admin_logout.php');
    }
    else if(isset($_GET['VIDEO_HDSD'])) {
        include('VIDEO_HDSD.php');
    }
    else if(isset($_GET['list_cancelled'])) {
        include('list_cancelled.php');
    }
    else if(isset($_GET['delete_cancel'])) {
        include('delete_cancel.php');
    }
    else {
        include('sale_statistics.php');
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
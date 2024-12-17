<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop chính hãng Thế Anh</title>
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
 <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="./images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Sản phẩm</a>
        </li>
        <?php
        if(!isset($_SESSION['username'])){
          echo
        "<li class='nav-item'>
        <a class='nav-link' href='./user_area/user_registration.php'>Đăng ký</a>
        </li>";
        } else {
          echo
          "<li class='nav-item'>
          <a class='nav-link' href='./user_area/profile.php'>Tài khoản của tôi</a>
        </li>";
        }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="contact_us.php">Liên hệ chúng tôi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup> Giỏ hàng </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Tổng tiền trong giỏ: <?php echo total_cart_price()?> VNĐ</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <ul class="navbar-nav me-auto">
        <?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link text-white' href='#'>Welcome Guest!</a>
        </li>";
        } else {
          echo "<li class='nav-item'>
          <a class='nav-link text-white' href='#'>Welcome ".$_SESSION['username']."!</a>
        </li>";
        }
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link text-white' href='./user_area/user_login.php'>Đăng nhập</a>
        </li>";
        } else {
          echo "<li class='nav-item'>
          <a class='nav-link text-white' href='./user_area/user_logout.php'>Đăng xuất</a>
        </li>";
        }
        ?>
    </ul>
</nav>

<!-- Web intro third child -->
<div class="container my-5 p-4 bg-light rounded shadow-sm">
    <!-- Phần giới thiệu -->
    <div class="row mb-4">
    <!-- Cột Giới thiệu về Laptop Thế Anh -->
    <div class="col-md-6">
        <h2 class="text-dark">Chào mừng đến với Laptop Thế Anh</h2>
        <p class="lead">
            Laptop Thế Anh cung cấp các sản phẩm công nghệ chính hãng với giá cả cạnh tranh. 
            Chúng tôi cam kết mang đến trải nghiệm mua sắm tốt nhất cho khách hàng với các dòng 
            sản phẩm laptop cao cấp từ các thương hiệu hàng đầu.
        </p>
        <a href="display_all.php" class="btn btn-success mt-3">Khám phá sản phẩm ngay</a>
    </div>
    
    <!-- Cột Hình ảnh -->
    <div class="col-md-6 text-center">
        <img src="./images/poster.jpg" alt="Giới thiệu Laptop Thế Anh" class="img-fluid img-intro">
    </div>
</div>

<!-- Thông báo Ủy quyền chính thức của Apple -->
<div class="row mb-4">
    <div class="col-12">
        <div class="authorization bg-light py-4 mt-5 text-center">
            <h3 class="authorization-title">Ủy quyền chính thức của Apple tại Việt Nam</h3>
            <p class="authorization-description">
                Chúng tôi tự hào là đối tác ủy quyền chính thức của Apple, cung cấp sản phẩm chính hãng 
                và dịch vụ bảo hành tuyệt vời.
            </p>
            <!-- Logo Apple -->
            <img src="./images/apple-logo.png" alt="Apple Official Partner" class="authorization-logo mt-3">
        </div>
    </div>
</div>


    <div id="highlightCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <img src="./images/slide1.jpg" class="d-block w-100 rounded" alt="Mục nổi bật 1">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
            <img src="./images/slide2.jpg" class="d-block w-100 rounded" alt="Mục nổi bật 2">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item">
            <img src="./images/slide3.jpg" class="d-block w-100 rounded" alt="Mục nổi bật 3">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <!-- Slide 4 -->
        <div class="carousel-item">
            <img src="./images/slide4.jpg" class="d-block w-100 rounded" alt="Mục nổi bật 3">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <!-- Slide 5 -->
        <div class="carousel-item">
            <img src="./images/slide5.jpg" class="d-block w-100 rounded" alt="Mục nổi bật 3">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <!-- Slide 6 -->
        <div class="carousel-item">
            <img src="./images/slide6.jpg" class="d-block w-100 rounded" alt="Mục nổi bật 3">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <!-- Slide 7 -->
        <div class="carousel-item">
            <img src="./images/slide7.jpg" class="d-block w-100 rounded" alt="Mục nổi bật 3">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
    </div>
    <!-- Nút điều hướng -->
    <button class="carousel-control-prev" type="button" data-bs-target="#highlightCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#highlightCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
      </div>
 <!-- fourth child -->
  <div class="row">
  <div class="col-md-10">
        <!-- products -->
        <div class="row">
<!-- fetch products -->
 <?php
getproducts();
get_chosen_categories();
get_chosen_brands();

 ?>
            
<!-- row end -->
            
  </div>
<!-- column end -->
</div>
<div class="col-md-2 apple-style-sidebar">
    <!-- brands to be displayed -->
    <div class="sidebar-section-brands">
        <h5 class="section-title text-center">Hãng sản xuất</h5>
        <ul class="sidebar-list text-center">
            <?php getbrands(); ?>
        </ul>
    </div>

    <!-- categories to be displayed -->
    <div class="sidebar-section-categories">
        <h5 class="section-title text-center">Danh mục sản phẩm</h5>
        <ul class="sidebar-list text-center">
            <?php getcategories(); ?>
        </ul>
    </div>
</div>



    
  </div>

  <div class="container text-center my-5">
    <h2 class="section-title">Khách hàng nghĩ gì về chúng tôi?</h2>
    <p class="section-description">Đọc những chia sẻ từ khách hàng của chúng tôi để biết lý do vì sao chúng tôi là lựa chọn hàng đầu cho nhu cầu laptop của bạn!</p>
</div>
<!-- review child -->
<div id="customerReviewCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <!-- Slide 1 -->
    <div class="carousel-item active">
      <div class="d-flex justify-content-center align-items-center">
        <div class="carousel-content text-center">
          <img src="./images/customer1.jpg" class="rounded-circle customer-img" alt="Customer 1">
          <h5 class="mt-3">Lionel Messi</h5>
          <p class="text-muted">"Thứ quý giá thứ hai của tôi sau chiếc cúp World Cup chính là chiếc laptop tôi đã mua tại đây!"</p>
        </div>
      </div>
    </div>
    <!-- Slide 2 -->
    <div class="carousel-item">
      <div class="d-flex justify-content-center align-items-center">
        <div class="carousel-content text-center">
          <img src="./images/customer2.jpg" class="rounded-circle customer-img" alt="Customer 2">
          <h5 class="mt-3">Cristiana Ronalty</h5>
          <p class="text-muted">"Chất lượng sản phẩm rất tốt, xem các video vấp cỏ, sút điện thoại fan nhí của tôi rất đẹp!"</p>
        </div>
      </div>
    </div>
    <!-- Slide 3 -->
    <div class="carousel-item">
      <div class="d-flex justify-content-center align-items-center">
        <div class="carousel-content text-center">
          <img src="./images/customer3.jpg" class="rounded-circle customer-img" alt="Customer 3">
          <h5 class="mt-3">Anh Chây 97</h5>
          <p class="text-muted">"Chỉ cần được chu cấp 5 triệu mỗi tháng, bạn đã có thể mua được một chiếc laptop sịn sò ở đây!"</p>
        </div>
      </div>
    </div>
    <!-- Slide 4 -->
    <div class="carousel-item">
      <div class="d-flex justify-content-center align-items-center">
        <div class="carousel-content text-center">
          <img src="./images/sontung.jpg" class="rounded-circle customer-img" alt="Customer 3">
          <h5 class="mt-3">Sơn Tùng MTP</h5>
          <p class="text-muted">"Các hôm mê có thắc mắc tôi mua Laptop ở đâu để làm nhạc khonggg. Chính là ở đây đóo!"</p>
        </div>
      </div>
    </div>
    <!-- Slide 5 -->
    <div class="carousel-item">
      <div class="d-flex justify-content-center align-items-center">
        <div class="carousel-content text-center">
          <img src="./images/elon.jpg" class="rounded-circle customer-img" alt="Customer 3">
          <h5 class="mt-3">Elon Musk</h5>
          <p class="text-muted">"Tên lửa Starship và xe Tesla của tôi cũng không xịn bằng các sản phẩm của NTA Laptop!"</p>
        </div>
      </div>
    </div>
    <!-- Slide 6 -->
    <div class="carousel-item">
      <div class="d-flex justify-content-center align-items-center">
        <div class="carousel-content text-center">
          <img src="./images/ceonvdia.jpg" class="rounded-circle customer-img" alt="Customer 3">
          <h5 class="mt-3">Jensen Huang (CEO NVIDIA)</h5>
          <p class="text-muted">"NTA Laptop là sự lựa chọn số một của tôi để gửi gắm các sản phẩm của mình!"</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#customerReviewCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#customerReviewCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Phần Cam kết của Laptop Thế Anh -->
<div class="row mb-5">
    <div class="col-12 text-center">
        <h2 class="commitment-title">Những cam kết của chúng tôi</h2>
        <p class="commitment-description">Chúng tôi cam kết mang đến cho bạn trải nghiệm mua sắm tuyệt vời và sản phẩm chất lượng cao nhất.</p>
    </div>
</div>

<div class="row">
    <!-- Cam kết 1 -->
    <div class="col-md-4 text-center mb-4">
        <div class="commitment-box">
            <i class="fas fa-laptop fa-3x commitment-icon"></i>
            <h4 class="commitment-heading">Sản phẩm chính hãng</h4>
            <p class="commitment-text">Chúng tôi cung cấp các sản phẩm chính hãng từ các thương hiệu hàng đầu, bảo đảm chất lượng và độ bền vượt trội.</p>
        </div>
    </div>

    <!-- Cam kết 2 -->
    <div class="col-md-4 text-center mb-4">
        <div class="commitment-box">
            <i class="fas fa-headset fa-3x commitment-icon"></i>
            <h4 class="commitment-heading">Hỗ trợ khách hàng 24/7</h4>
            <p class="commitment-text">Chúng tôi luôn sẵn sàng hỗ trợ bạn mọi lúc, đảm bảo giúp bạn giải quyết mọi vấn đề nhanh chóng và hiệu quả.</p>
        </div>
    </div>

    <!-- Cam kết 3 -->
    <div class="col-md-4 text-center mb-4">
        <div class="commitment-box">
            <i class="fas fa-truck fa-3x commitment-icon"></i>
            <h4 class="commitment-heading">Giao hàng nhanh chóng</h4>
            <p class="commitment-text">Chúng tôi cam kết giao hàng nhanh chóng, an toàn, và đúng thời gian, giúp bạn có trải nghiệm mua sắm dễ dàng hơn bao giờ hết.</p>
        </div>
    </div>
</div>



<!-- last child -->
     </div>


     <div class="footer bg-dark text-light py-4 mt-5">
    <div class="container">
        <div class="row">
            <!-- Địa chỉ quán Laptop -->
            <div class="col-md-4">
                <h5>Địa chỉ:</h5>
                <p>123 Đường ABC, Quận XYZ, Thành phố Hà Nội</p>
            </div>
            
            <!-- Số điện thoại và Email -->
            <div class="col-md-4">
                <h5>Liên hệ:</h5>
                <p><strong>Điện thoại:</strong> <a href="tel:+84987654321" class="text-light">0987 654 321</a></p>
                <p><strong>Email:</strong> <a href="mailto:contact@laptopstore.com" class="text-light">anhnta2004@gmail.com</a></p>
            </div>

            <!-- Liên kết đến các mạng xã hội -->
            <div class="col-md-4 text-center">
                <h5>Theo dõi chúng tôi:</h5>
                <a href="https://www.facebook.com/ntabodoiqua2004" target="_blank" class="text-light mx-2">
                    <i class="fab fa-facebook fa-2x"></i>
                </a>
                <a href="https://github.com/ntabodoiqua/Project1_EcomWebSite" target="_blank" class="text-light mx-2">
                    <i class="fab fa-github fa-2x"></i>
                </a>
            </div>
        </div>
        
        <!-- Dòng chữ "All Rights Reserved" -->
        <div class="text-center mt-3">
            <p>&copy;2024 Laptop NTA. All Rights Reserved.</p>
        </div>
    </div>
</div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
crossorigin="anonymous"></script>
</body>
</html>
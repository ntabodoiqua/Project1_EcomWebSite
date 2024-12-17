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
    <title>Liên hệ chúng tôi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <img src="./images/logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="index.php">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="display_all.php">Sản phẩm</a></li>
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo "<li class='nav-item'><a class='nav-link' href='./user_area/user_registration.php'>Đăng ký</a></li>";
                        } else {
                            echo "<li class='nav-item'><a class='nav-link' href='./user_area/profile.php'>Tài khoản của tôi</a></li>";
                        }
                        ?>
                        <li class="nav-item"><a class="nav-link" href="contact_us.php">Liên hệ chúng tôi</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <sup><?php cart_item(); ?></sup> Giỏ hàng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">Tổng tiền trong giỏ: <?php echo total_cart_price(); ?> VNĐ</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Tìm kiếm" class="btn btn-outline" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <!-- Main Section -->
    <div class="container my-5">
        <h1 class="text-center mb-4">Liên hệ chúng tôi</h1>
        <div class="row">
            <!-- Thông tin cá nhân -->
            <div class="col-md-4">
                <div class="card text-center border-0 shadow-sm">
                    <img src="./images/TheAnh.JPG" class="card-img-top rounded-circle p-3" alt="The Anh">
                    <div class="card-body">
                        <h4 class="card-title">Nguyễn Thế Anh</h4>
                        <p class="card-text">Khoa học Máy tính 02 - K67</p>
                        <p>MSSV: 20224921</p>
                        <div>
                            <a href="https://www.facebook.com/ntabodoiqua2004/" target="_blank" class="btn btn-primary btn-sm me-2"><i class="fa-brands fa-facebook"></i> Facebook</a>
                            <a href="https://github.com/ntabodoiqua" target="_blank" class="btn btn-dark btn-sm"><i class="fa-brands fa-github"></i> GitHub</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Nội dung -->
            <div class="col-md-8">
                <div class="mb-4">
                    <h2>Về chúng tôi</h2>
                    <p>Chào mừng bạn đến với <strong>Laptop NTA</strong>! Sứ mệnh của chúng tôi là cung cấp các dòng laptop chất lượng với giá cả phải chăng nhất.</p>
                    <ul>
                        <li>Đa dạng sản phẩm laptop</li>
                        <li>Giá cả cạnh tranh</li>
                        <li>Cam kết chất lượng</li>
                        <li>Dịch vụ khách hàng tuyệt vời</li>
                    </ul>
                </div>
                <div>
                    <h2>Liên hệ</h2>
                    <p>Chúng tôi luôn sẵn sàng lắng nghe bạn! Hãy gửi câu hỏi hoặc góp ý của bạn qua:</p>
                    <ul>
                        <li>Email: <a href="mailto:anh.nt224921@sis.hust.edu.vn">anh.nt224921@sis.hust.edu.vn</a></li>
                        <li>Email: <a href="mailto:anhnta2004@gmail.com">anhnta2004@gmail.com</a></li>
                    </ul>
                    <div class="d-flex justify-content-start mt-3">
                        <a href="mailto:anh.nt224921@sis.hust.edu.vn" class="btn btn-outline-primary me-2"><i class="fa-solid fa-envelope"></i> Gửi Email (Outlook)</a>
                        <a href="mailto:anhnta2004@gmail.com" class="btn btn-outline-danger"><i class="fa-solid fa-envelope"></i> Gửi Email (Gmail)</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <div class="container">
            <p class="mb-0">© 2024 Laptop NTA. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

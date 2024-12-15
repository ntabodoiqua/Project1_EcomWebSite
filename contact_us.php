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
    <title>Về tôi</title>
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
          <a class="nav-link" href="cart.php">Tổng cần thanh toán: <?php echo total_cart_price()?> VNĐ</a>
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
  <div class="col-md-10">
        
        <div class="row">


<div class='col-md-4 mb-2'>
  <div class='card' >
    <img src='./images/TheAnh.JPG' class='' alt='Admin_TheAnh'>
    <div class='card-body'>
      <h5 class='card-title'>Nguyễn Thế Anh</h5>
      <p class='card-text'>Khoa học máy tính 02 - K67</p>
      <p class='card-text'>MSSV: 20224921.</p>
    </div>
  </div>
</div>
<div class='col-md-8'>
                <!-- related images -->
                 <div class='row'>
        <p>Chào mừng bạn đến với <strong>Laptop NTA</strong>, điểm đến tin cậy của bạn để mua laptop uy tín với giá cả phải chăng. Sứ mệnh của chúng tôi là mang đến những chiếc laptop chất lượng tốt nhất với mức giá hấp dẫn, đáp ứng mọi nhu cầu của bạn.</p>

        <h2>Tôi là ai?</h2>
        <p>Tôi là một người đam mê công nghệ, tận tâm giúp bạn tìm được chiếc laptop hoàn hảo. Dù bạn cần một thiết bị cho công việc, học tập, chơi game hay sử dụng hằng ngày, chúng tôi đều có giải pháp dành cho bạn. Với nhiều năm kinh nghiệm trong ngành công nghệ, tôi hiểu rõ điều khách hàng cần nhất.</p>

        <h2>Tại sao chọn chúng tôi?</h2>
        <ul>
            <li><strong>Đa dạng sản phẩm Laptop</strong></li>
            <li><strong>Giá cả cạnh tranh</strong> </li>
            <li><strong>Cam kết chất lượng</strong> </li>
            <li><strong>Dịch vụ khách hàng tuyệt vời</strong></li>
        </ul>

        <h2>Tầm nhìn</h2>
        <p>Tại <strong>Laptop NTA</strong>, chúng tôi mong muốn thu hẹp khoảng cách giữa công nghệ và giá cả. Chúng tôi tin rằng mọi người đều xứng đáng được tiếp cận các dòng laptop phù hợp mà không lo ngại về giá.</p>

        <h2>Hãy đồng hành cùng chúng tôi</h2>
        <p>Hãy trở thành một phần của cộng đồng khách hàng hài lòng, những người luôn tin tưởng chúng tôi cho nhu cầu công nghệ của họ. Khám phá bộ sưu tập của chúng tôi, tận hưởng các ưu đãi độc quyền và để chúng tôi giúp bạn tìm được chiếc laptop phù hợp nhất.</p>

        <p>Cảm ơn bạn đã chọn <strong>Laptop NTA</strong>. Cùng nhau, chúng ta sẽ làm cho công nghệ trở nên đơn giản và dễ tiếp cận hơn bao giờ hết!</p>

        <hr>
        <p>Cần hỗ trợ hoặc có thắc mắc? Đừng ngần ngại gửi email tới <a href="mailto:anh.nt224921@sis.hust.edu.vn">Outlook</a>, <a href="mailto:anhnta2004@gmail.com">Gmail</a> hoặc liên hệ mạng xã hội:</p>

                    <div class="col-md-6 social-link">
                    <a href="https://www.facebook.com/ntabodoiqua2004/" target="_blank" style='margin-left: 20px' id='xemSanPham'>Facebook cá nhân</a>
                    </div>
                    <div class="col-md-6 social-link">
                    <a href="https://github.com/ntabodoiqua" target="_blank" style='margin-left: 20px' id='xemSanPham'>Github</a>
                    </div>
                 </div>
            </div>
 <?php
get_chosen_categories();
get_chosen_brands();
 ?>
<!-- row end -->
            
  </div>
<!-- column end -->
</div>
    <div class="col-md-2 bg-secondary p-0">
        <!-- brands to be displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Hãng sản xuất
                </h4></a>
            </li>

            <?php
            getbrands();
            ?>
            
        </ul>

        <!-- categories to be displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Danh mục sản phẩm
                </h4></a>
            </li>

            <?php
            getcategories();
            ?>
        </ul>
    </div>
    
  </div>
<!-- last child -->
<?php
include("./includes/footer.php");
?>
     </div>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
crossorigin="anonymous"></script>
</body>
</html>
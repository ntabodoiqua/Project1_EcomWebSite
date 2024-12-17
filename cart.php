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
    <title>Giỏ hàng</title>
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
      </ul>
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


<!-- third child -->
<div class="container my-5 p-4 bg-light rounded shadow-sm">
 <div class="hero-minimalist">
    <h3 class="hero-minimalist-title">
        <i class="fas fa-laptop"></i> Laptop Thế Anh
    </h3>
    <p class="hero-minimalist-subtitle">
        <i class="fas fa-quote-left"></i> Define your style
    </p>
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
 <div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
                <!-- display data for table-->
                 <?php
                 $ip = getIPAddress();
                 $total=0;
                 $cart_query="select * from `cart_details` where ip_address='$ip'";
                 $result=mysqli_query($con,$cart_query);
                 $result_count=mysqli_num_rows($result);
                 if($result_count>0){
                  echo "<thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <td>SL hiện tại</th>
                    <th>Sửa SL</th>
                    <th>Giá</th>
                    <th>Xóa</th>
                    <th colspan='2'>Thao tác</th>
                </tr>
            </thead>
            <tbody>";
                 while($row=mysqli_fetch_array($result)){
                     $product_quantity=$row['quantity'];
                     $product_id=$row['product_id'];
                     $select_products="select * from `products` where product_id='$product_id'";
                     $result_products=mysqli_query($con,$select_products);
                     while($row_product_price=mysqli_fetch_array($result_products)){
                         $product_price=array($row_product_price['product_price']);
                         $price_table=$row_product_price['product_price'];
                         $product_title=$row_product_price['product_title'];
                         $product_image1=$row_product_price['product_image1'];
                         $product_num=$row_product_price['number_available'] - $row_product_price['number_sold'];
                         $product_values=array_sum($product_price);
                    

                 ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                    <td><?php echo $product_quantity ?></td>
                    <td> 
                      <div>
                      <input type="text" name="qty[<?php echo $product_id ?>]" class="form-input w-50"></td>
                    <?php
                        if (isset($_POST['cart_update'])) {
                          foreach ($_POST['qty'] as $product_id => $quantity) {
                              // check condition
                              if (!empty($quantity) && $quantity > 0 && $quantity <= $product_num) {
                                  $update_cart = "UPDATE `cart_details` SET quantity = $quantity 
                                                  WHERE ip_address = '$ip' AND product_id = '$product_id'";
                                  mysqli_query($con, $update_cart);
                                  //reload to update currNumber
                                  header("Location: cart.php");
                                  exit();
                              }
                              else {
                                echo "<script>alert('Số lượng không hợp lệ hoặc nhiều hơn số hàng trong kho')</script>";
                              }
                          }
                          
                      }
                    ?>
                    </div>
                    <td><?php echo number_format($price_table, 0, ',', '.') ?>đ</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                    <td>
                        <input type="submit" value="Cập nhật SL" class="bg-info px-3 py-2 border-0 mx-3" name="cart_update">
                        <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Xóa sản phẩm</button> -->
                        <input type="submit" value="Xóa sản phẩm" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                    </td>
                </tr>
                <?php
                 }
                }
              }
              else {
                echo "<h2 class='text-center text-danger'>Giỏ hàng trống</h2>";
              }
                ?>
            </tbody>
        </table>
        <!-- subtotal -->
         <?php
         $ip = getIPAddress();
         $cart_query="select * from `cart_details` where ip_address='$ip'";
         $result=mysqli_query($con,$cart_query);
         $result_count=mysqli_num_rows($result);
         $num=total_cart_price();
         if($result_count>0){
          echo "<div class='d-flex mb-3'> 
            <h4 class='px-3'>Tổng tiền: <strong class='text-info'>$num đ</strong><h4>
            <input type='submit' value='Tiếp tục mua sắm' id='xemSanPham' name='continue_shopping'>
            <input type='submit' value='Thanh toán hóa đơn' id='checkOutButton' name='check_out'>";
         }
         else{
          echo "<input type='submit' value='Tiếp tục mua sắm' id='xemSanPham' name='continue_shopping'>";
         }
         if(isset($_POST['continue_shopping'])){
            echo "<script>window.open('index.php','_self')</script>";
         }
         if(isset($_POST['check_out'])){
            echo "<script>window.open('./user_area/check_out.php','_self')</script>";
         }
         ?>
         
         </div>
    </div>
 </div>
</form>            
<!-- funct to remove item -->
<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="delete from `cart_details` where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}
echo $remove_item=remove_cart_item();
?>
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
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
crossorigin="anonymous"></script>
</body>
</html>
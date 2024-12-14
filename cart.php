<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">
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
        <li class="nav-item">
          <a class="nav-link" href="#">Đăng ký</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Liên hệ chúng tôi</a>
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
<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <ul class="navbar-nav me-auto">
    <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest!</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Đăng nhập</a>
        </li>
    </ul>
</nav>

<!-- third child -->
 <div class="bg-light">
    <h3 class="text-center">Laptop Thế Anh</h3>
    <p class="text-center">Define your style</p>
 </div>

<!-- fourth child -->
 <div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Xóa</th>
                    <th colspan="2">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <!-- display data for table-->
                 <?php
                 $ip = getIPAddress();
                 $total=0;
                 $cart_query="select * from `cart_details` where ip_address='$ip'";
                 $result=mysqli_query($con,$cart_query);
                 while($row=mysqli_fetch_array($result)){
                     $product_id=$row['product_id'];
                     $select_products="select * from `products` where product_id='$product_id'";
                     $result_products=mysqli_query($con,$select_products);
                     while($row_product_price=mysqli_fetch_array($result_products)){
                         $product_price=array($row_product_price['product_price']);
                         $price_table=$row_product_price['product_price'];
                         $product_title=$row_product_price['product_title'];
                         $product_image1=$row_product_price['product_image1'];
                         $product_values=array_sum($product_price);
                         $total+=$product_values;
                
                 ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                    <td><input type="number" name="qty" class="form-input w-50"></td>
                    <?php
                        $get_ip = getIPAddress();
                        if(isset($_POST['update_cart'])){
                            $quantities=$_POST['qty'];
                            $update_cart="update `cart_details` set quantity = '$quantities' where 
                            	ip_address = '$get_ip'";
                              // lỗi
                        $result_products_quantity=mysqli_query($con,$update_cart);
                        $total=$total*(int)$quantities;
                        }
                    ?>
                    <td><?php echo number_format($price_table, 0, ',', '.') ?>đ</td>
                    <td><input type="checkbox"></td>
                    <td>
                        <input type="submit" value="Cập nhật số lượng" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                        <button class="bg-info px-3 py-2 border-0 mx-3">Xóa sản phẩm</button>
                    </td>
                </tr>
                <?php
                 }
                }
                ?>
            </tbody>
        </table>
        <!-- subtotal -->
         <div class="d-flex mb-3"> 
            <h4 class="px-3">Tổng tiền: <strong class="text-info"><?php echo number_format($total, 0, ',', '.') ?>đ</strong><h4>
            <a href="index.php"><button class="bg-info px-3 py-2 border-0 mx-3">Tiếp tục mua sắm</button></a>
            <a href="#"><button class="bg-secondary px-3 py-2 border-0 text-light">Thanh toán</button></a>
         </div>
    </div>
 </div>
</form>            

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
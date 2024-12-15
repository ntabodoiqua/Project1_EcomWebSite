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
                              if (!empty($quantity) && $quantity > 0) {
                                  $update_cart = "UPDATE `cart_details` SET quantity = $quantity 
                                                  WHERE ip_address = '$ip' AND product_id = '$product_id'";
                                  mysqli_query($con, $update_cart);
                                  //reload to update currNumber
                                  header("Location: cart.php");
                                  exit();
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
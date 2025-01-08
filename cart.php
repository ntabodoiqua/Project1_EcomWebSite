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
 <style>
        .cart-container {
            margin-top: 20px;
        }
        .cart-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
        }
        .btn-custom {
            margin: 5px;
        }
    </style>
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
</div>
      </div>
      <?php
      if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
          // Nếu người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
          echo "<script>alert('Vui lòng đăng nhập!')</script>";
          echo "<script>window.open('./user_area/user_login.php','_self')</script>";
      }
      ?>
<!-- fourth child -->
<div class="container cart-container">
    <h3 class="text-center text-success my-4">Giỏ hàng của bạn</h3>
    <form action="" method="post" onsubmit="return validateQuantities()">
        <table class="table table-bordered text-center align-middle">
            <?php
            $user_id = get_user_id();
            $cart_query = "SELECT * FROM `cart_details` WHERE user_id = $user_id";
            $result = mysqli_query($con, $cart_query);
            $result_count = mysqli_num_rows($result);

            if ($result_count > 0) {
                echo "
                <thead class='table-dark'>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Số lượng còn lại</th>
                        <th>Tổng cộng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>";

                $total_price = 0;

                while ($row = mysqli_fetch_array($result)) {
                    $product_id = $row['product_id'];
                    $quantity = $row['quantity'];

                    $product_query = "SELECT * FROM `products` WHERE product_id = '$product_id'";
                    $product_result = mysqli_query($con, $product_query);

                    while ($product = mysqli_fetch_array($product_result)) {
                        $product_title = $product['product_title'];
                        $product_image = $product['product_image1'];
                        $product_price = $product['product_price'];
                        $product_number_available = $product['total_number'] - $product['number_sold']; // Lấy số lượng còn lại
                        $subtotal = $product_price * $quantity;
                        $total_price += $subtotal;
            ?>
                        <tr>
                            <td><img src="./admin_area/product_images/<?php echo $product_image ?>" class="cart-img"></td>
                            <td><?php echo $product_title ?></td>
                            <td><?php echo number_format($product_price, 0, ',', '.') ?>đ</td>
                            <td>
                                <input type="number" id="qty_<?php echo $product_id ?>" name="qty[<?php echo $product_id ?>]" value="<?php echo $quantity ?>" min="1" class="form-control text-center" style="width: 80px;" data-max="<?php echo $product_number_available ?>" oninput="checkQuantity(<?php echo $product_id ?>, <?php echo $product_number_available ?>)">
                            </td>
                            <td><?php echo $product_number_available ?> sản phẩm</td> <!-- Hiển thị số lượng còn lại -->
                            <td><?php echo number_format($subtotal, 0, ',', '.') ?>đ</td>
                            <td>
                                <input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"> Xóa
                            </td>
                        </tr>
            <?php
                    }
                }

                echo "
                <tr class='table-light'>
                    <td colspan='5' class='text-end'><strong>Tổng tiền:</strong></td>
                    <td colspan='2'><strong class='text-danger'>" . number_format($total_price, 0, ',', '.') . "đ</strong></td>
                </tr>
                </tbody>";
            } else {
                echo "<h4 class='text-center text-danger'>Giỏ hàng của bạn đang trống!</h4>";
            }
            ?>
        </table>

        <!-- Buttons -->
        <div class="text-center">
            <button type="submit" name="cart_update" class="btn btn-info btn-custom">Cập nhật giỏ hàng</button>
            <button type="submit" name="remove_cart" class="btn btn-danger btn-custom">Xóa sản phẩm</button>
            <a href="index.php" class="btn btn-primary btn-custom">Tiếp tục mua sắm</a>
            <?php if ($result_count > 0): ?>
                <a href="./user_area/check_out.php" class="btn btn-success btn-custom">Thanh toán</a>
            <?php endif; ?>
        </div>
    </form>
</div>

<!-- JavaScript kiểm tra số lượng -->
<script>
    // Kiểm tra số lượng nhập vào có hợp lệ không
    function checkQuantity(productId, maxQuantity) {
        const qtyInput = document.getElementById('qty_' + productId);
        const qtyValue = qtyInput.value;

        // Kiểm tra nếu giá trị nhỏ hơn 1 hoặc lớn hơn số lượng có sẵn
        if (qtyValue < 1) {
            qtyInput.setCustomValidity("Số lượng không thể nhỏ hơn 1.");
        } else if (qtyValue > maxQuantity) {
            qtyInput.setCustomValidity("Số lượng không thể vượt quá số lượng còn lại trong kho.");
        } else {
            qtyInput.setCustomValidity("");  // Reset thông báo lỗi
        }
    }

    // Hàm kiểm tra trước khi gửi form
    function validateQuantities() {
        let valid = true;
        const qtyInputs = document.querySelectorAll('input[type="number"]');
        qtyInputs.forEach(input => {
            if (!input.checkValidity()) {
                valid = false;
                alert(input.validationMessage);  // Hiển thị thông báo lỗi
            }
        });
        return valid;
    }
</script>


<!-- funct to remove item -->
<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      $delete_query="delete from `cart_details` where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>alert('Xóa thành công sản phẩm khỏi giỏ hàng!'); window.open('cart.php','_self');</script>";
      } else {
        echo "<script>alert('Lỗi khi xóa sản phẩm!');</script>";
      }
    }
  }
}
echo $remove_item = remove_cart_item();

function update_cart_quantity(){
  global $con;
  if(isset($_POST['cart_update'])){
      foreach($_POST['qty'] as $product_id => $new_quantity){
          // Lấy số lượng còn lại từ bảng products
          $product_query = "SELECT total_number, number_sold FROM `products` WHERE product_id = '$product_id'";
          $product_result = mysqli_query($con, $product_query);
          $product = mysqli_fetch_array($product_result);
          $available_quantity = $product['total_number'] - $product['number_sold'];

          // Kiểm tra xem số lượng cập nhật có vượt quá số lượng có sẵn không
          if ($new_quantity > $available_quantity) {
              echo "<script>alert('Số lượng yêu cầu vượt quá số lượng có sẵn trong kho!')</script>";
          } else {
              // Chỉ cập nhật nếu số lượng hợp lệ
              if ($new_quantity > 0) {
                  $update_query = "UPDATE `cart_details` SET quantity = $new_quantity WHERE product_id = $product_id";
                  $run_update = mysqli_query($con, $update_query);
                  if(!$run_update){
                      echo "<script>alert('Lỗi khi cập nhật số lượng!')</script>";
                  }
              }
          }
      }
      // Hiển thị thông báo cập nhật thành công
      echo "<script>alert('Cập nhật giỏ hàng thành công!'); window.open('cart.php','_self');</script>";
  }
}
update_cart_quantity();
?>


<!-- last child -->
     </div>
     <!-- footer -->
     <?php include('includes/footer.php'); ?>

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
<script>
    // Xử lý sự kiện khi nhấn nút Xóa sản phẩm
    document.addEventListener("DOMContentLoaded", function() {
        const removeCartBtn = document.querySelector("button[name='remove_cart']");
        const form = removeCartBtn.closest("form");

        removeCartBtn.addEventListener("click", function(event) {
            // Lấy danh sách tất cả các checkbox
            const checkboxes = form.querySelectorAll("input[name='removeitem[]']:checked");

            // Nếu không có checkbox nào được tick
            if (checkboxes.length === 0) {
                event.preventDefault(); // Ngăn không cho gửi form
                alert("Vui lòng chọn ít nhất một sản phẩm để xóa!");
            }
        });
    });
</script>
</body>
</html>

<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang thanh toán</title>
    <!-- bootstrap CSS link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
crossorigin="anonymous">
</head>

<body style="background-color: #f8f9fa; font-family: Arial, sans-serif;">
    <?php
    $user_ip=getIPAddress();
    $get_user="select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    $money=total_cart_price();
    ?>
    <div class="container mt-5 py-4 rounded shadow" style="background-color: #ffffff;">
        <h2 class="text-center text-info mb-4">Phương thức thanh toán</h2>
        <div class="row g-4 align-items-center">
            <!-- Cột 1: Chuyển khoản ngân hàng -->
            <div class="col-md-6 text-center">
                <h5 class="text-primary mb-3">Chuyển khoản ngân hàng</h5>
                <img src="../images/QR_code.jpg" alt="QR Code" class="img-fluid rounded shadow-sm" style="max-width: 250px;">
                <p class="mt-3 text-muted">Chức năng này hiện chưa hoàn thiện. Tuy nhiên bạn có thể donate tại đây.</p>
            </div>
            <!-- Cột 2: Thanh toán khi nhận hàng -->
            <div class="col-md-6 text-center">
                <a href="order.php?user_id=<?php echo $user_id ?>" class="btn btn-success btn-lg px-4 py-2" style="text-decoration: none; font-weight: bold;">
                    Thanh toán khi nhận hàng
                </a>
                <p class="mt-3 text-muted">Chọn phương thức này nếu bạn muốn thanh toán trực tiếp khi nhận hàng.</p>
            </div>
        </div>
        <!-- total money -->
        <div class="text-center mt-4">
            <div class="alert alert-info" role="alert" style="font-size: 1.2rem; font-weight: bold;">
                Tổng tiền: <span style="color: #17a2b8;"><?php echo $money ?> VNĐ</span>
            </div>
        </div>
        <!-- Back to homepage and Edit Cart button -->
        <div class="text-center mt-5">
            <div class="btn-group" role="group" aria-label="Payment buttons">
                <!-- back to home page -->
                <a href="../index.php" class="btn btn-info btn-lg px-4 py-2 text-white" style="text-decoration: none; font-weight: bold;">
                    Về trang chủ
                </a>
                <!-- Edit Cart -->
                <a href="../cart.php" class="btn btn-secondary btn-lg px-4 py-2 text-white" style="text-decoration: none; font-weight: bold;">
                    Chỉnh sửa giỏ hàng
                </a>
            </div>
        </div>
    </div>
</body>

</html>
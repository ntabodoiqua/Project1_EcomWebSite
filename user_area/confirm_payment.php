<?php
include('../includes/connect.php');
session_start();
if (isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}

if (isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $deli_address=$_POST['deli_address'];
    $insert_query="insert into `user_confirm` (order_id, invoice_number, date, 	deli_address)
                    values ($order_id, $invoice_number, NOW(), '$deli_address')";
    $result=mysqli_query($con,$insert_query);
    $update_query="UPDATE `products`
                    inner join `products_sold` on products.product_id = products_sold.product_id
                    SET products.number_sold = products_sold.number_sold
                    where not products.number_sold = products_sold.number_sold";
    $exect_update=mysqli_query($con, $update_query);
    if($result){
        echo "<script><h3 class='text-center text-light'>Xác nhận thành công!</h3></script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders="update `user_orders` set order_status='Complete' where order_id=$order_id";
    $result_orders=mysqli_query($con,$update_orders);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <!-- bootstrap CSS link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
crossorigin="anonymous">
<style>
    body {
        background-image: url('../images/bg.jpg');
        background-size: cover;
        background-position: center; 
        background-repeat: no-repeat; 
    }
</style>
</head>
<body class="bg-secondary">
    <h1 class="text-center text-light">Xác nhận đơn hàng</h1>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Số hóa đơn</label>
                <input type="text" class="form-control w-50 m-auto text-center" name="invoice_number"
                value="<?php echo $invoice_number?>" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Số tiền</label>
                <input type="text" class="form-control w-50 m-auto text-center" name="amount"
                value="<?php echo number_format($amount_due, 0, ',', '.')?> VNĐ" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Địa chỉ giao hàng</label>
                <input type="text" class="form-control w-50 m-auto" name="deli_address" required="required">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Xác nhận" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>
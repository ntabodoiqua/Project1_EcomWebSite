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

if (isset($_POST['confirm_cancel'])){
    $invoice_number=$_POST['invoice_number'];
    $cancel_reason=$_POST['cancel_reason'];
    $insert_query="insert into `user_cancel` (order_id, invoice_number, date, cancel_reason)
                    values ($order_id, $invoice_number, NOW(), '$cancel_reason')";
    $result=mysqli_query($con,$insert_query);
    $delete_query_1="DELETE FROM `user_orders` WHERE order_id=$order_id";
    $delete_query_2="DELETE FROM `orders_pending` WHERE order_id=$order_id";
    $result_1=mysqli_query($con,$delete_query_1);
    $result_2=mysqli_query($con,$delete_query_2);
    if($result_1 != 0 and $result_2 != 0){
        echo "<script><h3 class='text-center text-light'>Hủy đơn thành công!</h3></script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hủy đơn hàng</title>
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
    <h1 class="text-center text-light">Hủy đơn hàng</h1>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="invoice_number" class="text-light">Số hóa đơn</label>
                <input type="text" id="invoice_number" class="form-control w-50 m-auto text-center" name="invoice_number"
                value="<?php echo $invoice_number ?>" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="amount" class="text-light">Số tiền</label>
                <input type="text" id="amount" class="form-control w-50 m-auto text-center" name="amount"
                value="<?php echo number_format($amount_due, 0, ',', '.') ?> VNĐ" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Lý do hủy đơn</label>
                <input type="text" class="form-control w-50 m-auto" name="cancel_reason" required="required">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-danger text-light py-2 px-3 border-0" value="Xác nhận hủy" name="confirm_cancel">
            </div>
        </form>
    </div>
</body>


</html>
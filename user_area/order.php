<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
if (isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}
// get total items and total price
$ip=getIPAddress();
$total_price=total_cart_price_num();
$invoice_number=mt_rand();
$status='pending';
$cart_query_numpro="select * from `cart_details` where ip_address='$ip'";
$result_numpro=mysqli_query($con, $cart_query_numpro);
$count_products=mysqli_num_rows($result_numpro);
while($row_price=mysqli_fetch_array($result_numpro)){
    $product_id=$row_price['product_id'];
}
// get quantity from cart
$get_cart="select * from `cart_details`";
$run_cart=mysqli_query($con, $get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];


// insert
$insert_orders="insert into `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status)
                values ($user_id, $total_price, $invoice_number, $count_products, NOW(), '$status')";
$result_query=mysqli_query($con,$insert_orders);
if($result_query){
    echo "<script>alert('Đơn hàng được xác nhận thành công')</script>";
    echo "<script>window.open('profile.php', '_self')</script>";
}

// order pending
$insert_pending_orders="insert into `orders_pending`
 (user_id, invoice_number, product_id, quantity, order_status)
                values ($user_id, $invoice_number, $product_id, $quantity, '$status')";
$result_pending_orders=mysqli_query($con,$insert_pending_orders);


// delete items from cart
$empty_cart="delete from `cart_details` where ip_address='$ip'";
$result_delete=mysqli_query($con,$empty_cart);
?>

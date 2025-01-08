<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
if (isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];

// get total items and total price
$total = 0;
$cart_query="select * from `cart_details` where user_id='$user_id'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $product_qty=$row['quantity'];
      $select_products="select * from `products` where product_id='$product_id'";
      $result_products=mysqli_query($con,$select_products);
      while($row_product_price=mysqli_fetch_array($result_products)){
          $product_price=array($row_product_price['product_price']);
          $product_values=array_sum($product_price);
          $total+=$product_values*$product_qty;
      }
    }
$total_price=$total;
$invoice_number=mt_rand();
$status='pending';
$cart_query_numpro="select * from `cart_details` where user_id=$user_id";
$result_numpro=mysqli_query($con, $cart_query_numpro);

$sql_sum = "SELECT SUM(quantity) AS total_quantity FROM `cart_details` WHERE user_id=$user_id";
$res_sql = mysqli_query($con, $sql_sum);
$row = mysqli_fetch_assoc($res_sql);
$count_products = $row['total_quantity'];

while($row_price=mysqli_fetch_array($result_numpro)){
    $product_id=$row_price['product_id'];
    $number_sold=$row_price['quantity'];
    $update_product_sold = "
    UPDATE `products` 
    SET number_sold = number_sold + $number_sold
    WHERE product_id = $product_id
    ";
    $exec_query=mysqli_query($con, $update_product_sold);
    $update_temp_sold = "
    INSERT INTO `temp_product_sold` (invoice_number, product_id, temp_sold)
    VALUES ($invoice_number, $product_id, $number_sold)";
    $exec_query2=mysqli_query($con, $update_temp_sold);
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
    $empty_cart="delete from `cart_details` where user_id=$user_id";
    $result_delete=mysqli_query($con,$empty_cart);
    echo "<script>alert('Thêm thành công đơn hàng. Hãy xác nhận tại trang cá nhân.')</script>";
    echo "<script>window.open('profile.php', '_self')</script>";
}
else{
    echo "<script>alert('Đã xảy ra lỗi!')</script>";
}
// delete items from cart
}
?>

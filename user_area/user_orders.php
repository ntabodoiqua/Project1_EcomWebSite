<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php   
$username=$_SESSION['username'];
$get_user="select * from `user_table` where username='$username'";
$result=mysqli_query($con,$get_user);
$row_fetch=mysqli_fetch_assoc($result);
$user_id=$row_fetch['user_id'];
?>

    <h3 class="text-success">Tất cả đơn hàng</h3>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>STT</th>
                <th>Số tiền</th>
                <th>Số mặt hàng</th>
                <th>Số hóa đơn</th>
                <th>Thời gian</th>
                <th>Xác nhận/Chưa xác nhận</th>
                <th>Trạng thái</th>
                <th>Hủy đơn</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $get_order_details="select * from `user_orders` where user_id=$user_id";
            $result_orders=mysqli_query($con,$get_order_details);
            $number = 1;
            while($row_orders=mysqli_fetch_assoc($result_orders)){
                $order_id=$row_orders['order_id'];
                $amount_due=$row_orders['amount_due'];
                $amount_due=number_format($amount_due, 0, ',', '.');
                $total_products=$row_orders['total_products'];
                $invoice_number=$row_orders['invoice_number'];
                $order_date=$row_orders['order_date'];
                $order_status=$row_orders['order_status'];
                if($order_status=='pending'){
                    $order_status='Chưa xác nhận';
                } else {
                    $order_status='Đã xác nhận';
                }
                echo "<tr>
                <td>$number</td>
                <td>$amount_due VNĐ</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>";
                ?>
                <?php
                if($order_status=='Đã xác nhận'){
                    echo "<td>Hoàn thành</td>";
                } else {
                    echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-success'>Xác nhận</a></td>
                    ";
                }
                if($order_status=='Đã xác nhận'){
                    echo "<td>Không thể hủy</td>";
                } else {
                    echo "<td><a href='confirm_cancel.php?order_id=$order_id' class='text-danger'>Hủy</a></td>";
                }
                
                $number++;
                }
            ?>
            
            </tr>
        </tbody>
    </table>
</body>
</html>


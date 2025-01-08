<?php
if(isset($_GET['delete_order'])){
    $delete_order=$_GET['delete_order'];
    $delete_query_2="delete from `user_orders` where order_id=$delete_order";
    $result=mysqli_query($con,$delete_query_2);
    if($result){
        echo "<script>alert('Đơn hàng được xóa thành công!')</script>";
        echo "<script>window.open('./index.php?list_orders','_self')</script>";
    }
}
?>
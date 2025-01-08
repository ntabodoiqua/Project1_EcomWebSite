<?php
if(isset($_GET['delete_payment'])){
    $delete_payment=$_GET['delete_payment'];
    $delete_query_2="delete from `user_confirm` where confirm_id=$delete_payment";
    $result=mysqli_query($con,$delete_query_2);
    if($result){
        echo "<script>alert('Đơn hàng được xóa thành công!')</script>";
        echo "<script>window.open('./index.php?list_payments','_self')</script>";
    }
}
?>
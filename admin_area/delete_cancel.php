<?php
if(isset($_GET['delete_cancel'])){
    $delete_cancel=$_GET['delete_cancel'];
    $delete_query_2="delete from `user_cancel` where cancel_id=$delete_cancel";
    $result=mysqli_query($con,$delete_query_2);
    if($result){
        echo "<script>alert('Đơn hàng được xóa thành công!')</script>";
        echo "<script>window.open('./index.php?list_cancelled','_self')</script>";
    }
}
?>
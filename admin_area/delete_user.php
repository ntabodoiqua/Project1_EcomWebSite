<?php
if(isset($_GET['delete_user'])){
    $delete_user=$_GET['delete_user'];
    $delete_query_2="delete from `user_table` where user_id=$delete_user";
    $result=mysqli_query($con,$delete_query_2);
    if($result){
        echo "<script>alert('Người dùng được xóa thành công!')</script>";
        echo "<script>window.open('./index.php?list_users','_self')</script>";
    }
}
?>
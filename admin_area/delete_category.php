<?php
if(isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];
    $delete_query_2="delete from `categories` where category_id=$delete_category";
    $result=mysqli_query($con,$delete_query_2);
    if($result){
        echo "<script>alert('Danh mục được xóa thành công!')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}
?>
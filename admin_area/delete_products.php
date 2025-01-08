<?php
if (isset($_GET['delete_products'])){
    $delete_id=$_GET['delete_products'];
    // delete query
    $delete_products="delete from `products` where product_id = $delete_id";
    $result_delete=mysqli_query($con,$delete_products);
    if($result_delete){
        echo "<script>alert('Xóa thành công sản phẩm!')</script>;
        <script>window.open('index.php','_self')</script>";
    }
}
?>
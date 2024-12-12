<?php
include('../includes/connect.php');
if (isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_title'];

    //select data from database
    $select_query="select * from `categories` where category_title='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('Danh mục đã tồn tại!') </script>";
    }else {

    $insert_query="insert into `categories` (category_title) value('$category_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Danh mục được thêm thành công!') </script>";
    }
}
}
?>

<h2 class="text-center">Thêm danh mục</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name = "cat_title" placeholder="Thêm danh mục"  aria-label="Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
    
    <input type="submit" class="bg-info border-0 p-2" name = "insert_cat" value="Xác nhận" aria-describedby="basic-addon1">
    </div>
</form>
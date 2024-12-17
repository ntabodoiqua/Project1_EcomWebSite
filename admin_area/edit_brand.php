<?php
if(isset($_GET['edit_brand'])){
    $edit_brand=$_GET['edit_brand'];
    $get_brand="select * from `brands` where brand_id=$edit_brand";
    $result=mysqli_query($con,$get_brand);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title']; 
}

if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['brand_title'];
    
    $update_query="update `brands` set brand_title = '$cat_title'
                    where brand_id=$edit_brand";
    $result_cat=mysqli_query($con, $update_query);
    if($result){
        echo "<script>alert('Hãng được cập nhật thành công!')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}
?>


<div class="container mt-3">
    <h1 class="text-center text-success">Chỉnh sửa hãng sản xuất</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">Tên hãng</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" value="<?php echo $brand_title ?>">
        </div>
        <input type="submit" value="Cập nhật danh mục" class="btn btn-info px-3" name="edit_cat">
    </form>
</div>
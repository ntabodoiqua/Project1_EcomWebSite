<?php
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
    $get_category="select * from `categories` where category_id=$edit_category";
    $result=mysqli_query($con,$get_category);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title']; 
}

if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['category_title'];
    
    $update_query="update `categories` set category_title = '$cat_title'
                    where category_id=$edit_category";
    $result_cat=mysqli_query($con, $update_query);
    if($result){
        echo "<script>alert('Danh mục được cập nhật thành công!')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}
?>


<div class="container mt-3">
    <h1 class="text-center text-success">Chỉnh sửa danh mục</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Tên danh mục</label>
            <input type="text" name="category_title" id="category_title" class="form-control" value="<?php echo $category_title ?>">
        </div>
        <input type="submit" value="Cập nhật danh mục" class="btn btn-info px-3" name="edit_cat">
    </form>
</div>
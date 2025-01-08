<?php
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
    $get_category="select * from `categories` where category_id=$edit_category";
    $result=mysqli_query($con,$get_category);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title']; 
    $category_logo=$row['category_logo']; 
}

if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['category_title'];
    $cat_logo=$_FILES['category_logo']['name'];
    $temp_logo=$_FILES['category_logo']['tmp_name'];
    move_uploaded_file($temp_logo,"category_images/$cat_logo");
    $update_query="update `categories` set category_title = '$cat_title', category_logo = '$cat_logo'
                    where category_id=$edit_category";
    $result_cat=mysqli_query($con, $update_query);
    if($result_cat){
        echo "<script>alert('Danh mục được cập nhật thành công!')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}
?>


<div class="container mt-3">
    <h3 class="text-center text-success">Chỉnh sửa danh mục</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <table class="table table-bordered w-50 m-auto">
            <thead class="table-dark">
                <tr>
                    <th>Thông tin</th>
                    <th>Nhập dữ liệu</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><label for="category_title" class="form-label">Tên danh mục</label></td>
                    <td><input type="text" name="category_title" id="category_title" class="form-control" value="<?php echo $category_title ?>"></td>
                </tr>
                <tr>
                    <td><label for="category_logo" class="form-label">Logo danh mục</label></td>
                    <td>
                        <div class="d-flex">
                            <input type="file" id="category_logo" name="category_logo" class="form-control w-90">
                            <img src="category_images/<?php echo $category_logo ?>" alt="Logo danh mục" class="product_img">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <input type="submit" value="Cập nhật danh mục" class="btn btn-info px-3" name="edit_cat">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

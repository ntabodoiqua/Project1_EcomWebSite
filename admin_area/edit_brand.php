<?php
if(isset($_GET['edit_brand'])){
    $edit_brand=$_GET['edit_brand'];
    $get_brand="select * from `brands` where brand_id=$edit_brand";
    $result=mysqli_query($con,$get_brand);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title']; 
    $brand_logo=$row['brand_logo']; 
}

if(isset($_POST['edit_bra'])){
    $bra_title=$_POST['brand_title'];
    $bra_logo=$_FILES['brand_logo']['name'];
    $temp_logo=$_FILES['brand_logo']['tmp_name'];
    move_uploaded_file($temp_logo,"brand_images/$bra_logo");
    $update_query="update `brands` set brand_title = '$bra_title', brand_logo = '$bra_logo'
                    where brand_id=$edit_brand";
    $result=mysqli_query($con, $update_query);
    if($result){
        echo "<script>alert('Hãng được cập nhật thành công!')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}
?>


<div class="container mt-3">
    <h3 class="text-center text-success">Chỉnh sửa hãng sản xuất</h3>
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
                    <td><label for="brand_title" class="form-label">Tên hãng</label></td>
                    <td><input type="text" name="brand_title" id="brand_title" class="form-control" value="<?php echo $brand_title ?>"></td>
                </tr>
                <tr>
                    <td><label for="brand_logo" class="form-label">Logo hãng</label></td>
                    <td>
                        <div class="d-flex">
                            <input type="file" id="brand_logo" name="brand_logo" class="form-control w-90">
                            <img src="brand_images/<?php echo $brand_logo ?>" alt="Logo hãng" class="product_img">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <input type="submit" value="Cập nhật hãng" class="btn btn-info px-3" name="edit_bra">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

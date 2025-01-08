<?php
include('../includes/connect.php');
if (isset($_POST['insert_brands'])) {
    $brand_title = trim($_POST['brand_title']);
    $brand_logo=$_FILES['brand_logo']['name'];
    $temp_logo=$_FILES['brand_logo']['tmp_name'];
    // Kiểm tra tên hãng
    if (empty($brand_title)) {
        echo "<script>alert('Vui lòng nhập tên hãng sản xuất!')</script>";
    } else {
        // Kiểm tra xem hãng đã tồn tại hay chưa
        $select_query = "SELECT * FROM `brands` WHERE brand_title='$brand_title'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);

        if ($number > 0) {
            echo "<script>alert('Hãng đã tồn tại!')</script>";
        } else {
            move_uploaded_file($temp_logo,"./brand_images/$brand_logo");
            // Thêm hãng vào database
            $insert_query = "INSERT INTO `brands` (brand_title, brand_logo) VALUES ('$brand_title', '$brand_logo')";
            $result = mysqli_query($con, $insert_query);
            if ($result) {
                echo "<script>alert('Hãng được thêm thành công!')</script>";
                echo "<script>window.open('index.php', '_self')</script>";
            } else {
                echo "<script>alert('Đã xảy ra lỗi khi thêm hãng!')</script>";
            }
        }
    }
}
?>

    <div class="container mt-3">
        <h3 class="text-center text-success my-4">Thêm hãng sản xuất</h3>
        <form action="" method="post" class="mx-auto" enctype="multipart/form-data" style="max-width: 500px;">
            <div class="mb-3">
                <label for="brand_title" class="form-label">Tên hãng sản xuất</label>
                <div class="input-group">
                    <span class="input-group-text bg-info text-white"><i class="fa-solid fa-receipt"></i></span>
                    <input type="text" name="brand_title" id="brand_title" class="form-control" placeholder="Nhập tên hãng sản xuất" required>
                </div>
            </div>
            <div class="form-outline m-auto mb-4">
            <label for="brand_logo" class="form-label">Logo hãng</label>
            <div class="d-flex">
            <input type="file" id="brand_logo" name="brand_logo" class="form-control w-90 m-auto">
            </div>
        </div>
            <div class="text-center">
                <button type="submit" name="insert_brands" class="btn btn-info px-4">Xác nhận</button>
            </div>
        </form>
    </div>
</div>
</div>



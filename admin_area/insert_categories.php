<?php
include('../includes/connect.php');

if (isset($_POST['insert_cat'])) {
    $category_title = trim($_POST['cat_title']); // Loại bỏ khoảng trắng
    $category_logo=$_FILES['cat_logo']['name'];
    $temp_cat_logo=$_FILES['cat_logo']['tmp_name'];
    // Kiểm tra tên danh mục
    if (empty($category_title)) {
        echo "<script>alert('Vui lòng nhập tên danh mục!')</script>";
    } else {
        // Kiểm tra xem danh mục đã tồn tại hay chưa
        $select_query = "SELECT * FROM `categories` WHERE category_title='$category_title'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);

        if ($number > 0) {
            echo "<script>alert('Danh mục đã tồn tại!')</script>";
        } else {
            // Thêm danh mục vào database
            move_uploaded_file($temp_cat_logo,"./category_images/$category_logo");
            $insert_query = "INSERT INTO `categories` (category_title, category_logo) VALUES ('$category_title', '$category_logo')";
            $result = mysqli_query($con, $insert_query);
            if ($result) {
                echo "<script>alert('Danh mục được thêm thành công!')</script>";
                echo "<script>window.open('index.php', '_self')</script>";
            } else {
                echo "<script>alert('Đã xảy ra lỗi khi thêm danh mục!')</script>";
            }
        }
    }
}
?>
    <div class="container mt-3">
        <h3 class="text-center text-success my-4">Thêm danh mục</h3>
        <form action="" method="post" class="mx-auto" style="max-width: 500px;" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="cat_title" class="form-label">Tên danh mục</label>
                <div class="input-group">
                    <span class="input-group-text bg-info text-white"><i class="fa-solid fa-receipt"></i></span>
                    <input type="text" name="cat_title" id="cat_title" class="form-control" placeholder="Nhập tên danh mục" required>
                </div>
            </div>
            <div class="form-outline m-auto mb-4">
            <label for="cat_logo" class="form-label">Logo danh mục</label>
            <div class="d-flex">
            <input type="file" id="cat_logo" name="cat_logo" class="form-control w-90 m-auto">
            </div>
            <div class="text-center">
                <button type="submit" name="insert_cat" class="btn btn-info px-4">Xác nhận</button>
            </div>
        </form>
    </div>
</div>



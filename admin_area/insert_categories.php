<?php
include('../includes/connect.php');

if (isset($_POST['insert_cat'])) {
    $category_title = trim($_POST['cat_title']); // Loại bỏ khoảng trắng

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
            $insert_query = "INSERT INTO `categories` (category_title) VALUES ('$category_title')";
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

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục - Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
          integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4p889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
          crossorigin="anonymous" 
          referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h3 class="text-center text-success my-4">Thêm danh mục</h3>
        <form action="" method="post" class="mx-auto" style="max-width: 500px;">
            <div class="mb-3">
                <label for="cat_title" class="form-label">Tên danh mục</label>
                <div class="input-group">
                    <span class="input-group-text bg-info text-white"><i class="fa-solid fa-receipt"></i></span>
                    <input type="text" name="cat_title" id="cat_title" class="form-control" placeholder="Nhập tên danh mục" required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="insert_cat" class="btn btn-info px-4">Xác nhận</button>
            </div>
        </form>
    </div>
</body>
</html>

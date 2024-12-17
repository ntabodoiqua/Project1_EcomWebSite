<?php
include('../includes/connect.php');
if (isset($_POST['insert_brands'])) {
    $brand_title = trim($_POST['brand_title']);

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
            // Thêm hãng vào database
            $insert_query = "INSERT INTO `brands` (brand_title) VALUES ('$brand_title')";
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

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm hãng sản xuất - Admin Dashboard</title>
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
        <h3 class="text-center text-success my-4">Thêm hãng sản xuất</h3>
        <form action="" method="post" class="mx-auto" style="max-width: 500px;">
            <div class="mb-3">
                <label for="brand_title" class="form-label">Tên hãng sản xuất</label>
                <div class="input-group">
                    <span class="input-group-text bg-info text-white"><i class="fa-solid fa-receipt"></i></span>
                    <input type="text" name="brand_title" id="brand_title" class="form-control" placeholder="Nhập tên hãng sản xuất" required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="insert_brands" class="btn btn-info px-4">Xác nhận</button>
            </div>
        </form>
    </div>
</body>
</html>

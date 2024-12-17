<?php
include('../includes/connect.php'); // Kết nối database
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_status='true';
    $product_link=$_POST['product_link'];
    $num_pro_avail=$_POST['product_num'];
    // Hình ảnh
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    // Đường dẫn tạm của ảnh
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    // Kiểm tra điều kiện trống
    if($product_title =='' || $description == '' || $product_keywords == '' || $product_price == '' || 
    $product_image1 == '' || $product_image2 == '' || $product_image3 == '' || $product_link == ''){
        echo "<script>alert('Hãy điền hết các ô trống!')</script>";
        exit();
    } else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");
        // Câu truy vấn thêm sản phẩm
        $insert_products="insert into `products` (product_title, product_description, product_keyword, category_id, brand_id,
                            product_image1, product_image2, product_image3, product_price, date, status, product_link, number_available) 
                            values ('$product_title', '$description', '$product_keywords', '$product_category', '$product_brands', 
                            '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status', '$product_link', '$num_pro_avail')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Đã thêm thành công sản phẩm!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm - Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h3 class="text-center text-success my-4">Thêm sản phẩm</h3>
        <table class="table table-bordered table-hover table-striped mt-5">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>Thông tin</th>
                    <th>Nhập dữ liệu</th>
                </tr>
            </thead>
            <tbody>
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Tên sản phẩm -->
                    <tr>
                        <td><label for="product_title">Tên sản phẩm</label></td>
                        <td><input type="text" name="product_title" id="product_title" class="form-control" placeholder="Nhập tên sản phẩm" required></td>
                    </tr>
                    <!-- Mô tả -->
                    <tr>
                        <td><label for="description">Mô tả sản phẩm</label></td>
                        <td><input type="text" name="description" id="description" class="form-control" placeholder="Mô tả sản phẩm" required></td>
                    </tr>
                    <!-- Từ khóa -->
                    <tr>
                        <td><label for="product_keywords">Từ khóa</label></td>
                        <td><input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Từ khóa sản phẩm" required></td>
                    </tr>
                    <!-- Danh mục -->
                    <tr>
                        <td>Chọn danh mục</td>
                        <td>
                            <select name="product_category" id="" class="form-select">
                                <option value="">Chọn danh mục</option>
                                <?php
                                $select_query="select * from `categories`";
                                $result_query=mysqli_query($con,$select_query);         
                                while($row=mysqli_fetch_assoc($result_query)){
                                    $category_title=$row['category_title'];
                                    $category_id=$row['category_id'];
                                    echo "<option value='$category_id'>$category_title</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <!-- Hãng -->
                    <tr>
                        <td>Chọn hãng</td>
                        <td>
                            <select name="product_brand" id="" class="form-select">
                                <option value="">Chọn hãng</option>
                                <?php
                                $select_query="select * from `brands`";
                                $result_query=mysqli_query($con,$select_query);         
                                while($row=mysqli_fetch_assoc($result_query)){
                                    $brand_title=$row['brand_title'];
                                    $brand_id=$row['brand_id'];
                                    echo "<option value='$brand_id'>$brand_title</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <!-- Ảnh -->
                    <tr>
                        <td>Ảnh 1</td>
                        <td><input type="file" name="product_image1" id="product_image1" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td>Ảnh 2</td>
                        <td><input type="file" name="product_image2" id="product_image2" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td>Ảnh 3</td>
                        <td><input type="file" name="product_image3" id="product_image3" class="form-control" required></td>
                    </tr>
                    <!-- Giá -->
                    <tr>
                        <td><label for="product_price">Giá sản phẩm</label></td>
                        <td><input type="text" name="product_price" id="product_price" class="form-control" placeholder="Nhập giá sản phẩm" required></td>
                    </tr>
                    <!-- Link -->
                    <tr>
                        <td><label for="product_link">Link sản phẩm</label></td>
                        <td><input type="text" name="product_link" id="product_link" class="form-control" placeholder="Liên kết nhà sản xuất" required></td>
                    </tr>
                    <!-- Số lượng -->
                    <tr>
                        <td><label for="product_num">Số lượng</label></td>
                        <td><input type="text" name="product_num" id="product_num" class="form-control" placeholder="Nhập số lượng" required></td>
                    </tr>
                    <!-- Nút gửi -->
                    <tr>
                        <td colspan="2" class="text-center">
                            <input type="submit" name="insert_product" class="btn btn-info px-4" value="Thêm sản phẩm">
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
</body>
</html>

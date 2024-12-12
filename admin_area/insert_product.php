<?php
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm - Admin Dashboard</title>

<!-- bootstrap CSS link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
crossorigin="anonymous">
<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
crossorigin="anonymous" 
referrerpolicy="no-referrer" />
<!-- css file -->
<link rel="stylesheet" href="style.css">
</head>
<body class=bg-light>
    <div class="container mt-3">
        <h1 class="text-center">Thêm sản phẩm</h1>
        <!-- form -->
         <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-lable">Tên sản phẩm</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Nhập tên sản phẩm" autocomplete="off" require=reqired>
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-lable">Mô tả sản phẩm</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Mô tả sản phẩm" autocomplete="off" require=reqired>
            </div>
            <!-- keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-lable">Từ khóa</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Từ khóa cho sản phẩm" autocomplete="off" require=reqired>
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Chọn một danh mục cho sản phẩm</option>
                    <?php
                        $select_query="select * from `categories`";
                        $result_query=mysqli_query($con,$select_query);         
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value=''>$category_title</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Chọn một hãng sản xuất cho sản phẩm</option>
                    <?php
                        $select_query="select * from `brands`";
                        $result_query=mysqli_query($con,$select_query);         
                        while($row=mysqli_fetch_assoc($result_query)){
                            $brand_title=$row['brand_title'];
                            $brand_id=$row['brand_id'];
                            echo "<option value=''>$brand_title</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-lable">Ảnh mô tả 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" require=reqired>
            </div>
            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-lable">Ảnh mô tả 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" require=reqired>
            </div>
            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-lable">Ảnh mô tả 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" require=reqired>
            </div>

            <!-- prices -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-lable">Giá sản phẩm</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Nhập giá sản phẩm" autocomplete="off" require=reqired>
            </div>

            <!-- prices -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Thêm sản phẩm">
            </div>
         </form>
    </div>
    
</body>
</html>
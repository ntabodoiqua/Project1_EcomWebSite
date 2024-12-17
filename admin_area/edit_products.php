<?php
if (isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="select * from `products` where product_id = $edit_id";
    $result_data=mysqli_query($con, $get_data);
    $row=mysqli_fetch_assoc($result_data);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keyword=$row['product_keyword'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2	=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
    $product_link=$row['product_link'];
    $number_available=$row['number_available'];
    // fetch category
    $select_category="select * from `categories` where category_id = $category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
    // fetch brand
    $select_brand="select * from `brands` where brand_id = $brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
}
?>


<div class="container mt-5">
    <h1 class="text-center">Chỉnh sửa sản phẩm</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Tên sản phẩm</label>
            <input type="text" id="product_title" value = "<?php echo $product_title ?>"name="product_title" class="form-control">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Mô tả sản phẩm</label>
            <input type="text" id="product_description" value = "<?php echo $product_description ?>"name="product_description" class="form-control">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keyword" class="form-label">Từ khóa sản phẩm</label>
            <input type="text" id="product_keyword" value = "<?php echo $product_keyword ?>"name="product_keyword" class="form-control">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Chọn danh mục</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_id ?>"><?php echo $category_title ?></option>
                <?php
                $select_category_all="select * from `categories` where not category_id = $category_id";
                $result_category_all=mysqli_query($con,$select_category_all);
                while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                    $category_title_all=$row_category_all['category_title'];
                    $category_id_all=$row_category_all['category_id'];
                    echo "<option value='$category_id_all'>$category_title_all</option>";
                };
                
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_brand" class="form-label">Chọn hãng sản xuất</label>
            <select name="product_brand" class="form-select">
                <option value="<?php echo $brand_id ?>"><?php echo $brand_title ?></option>
                <?php
                $select_brand_all="select * from `brands` where not brand_id = $brand_id";
                $result_brand_all=mysqli_query($con,$select_brand_all);
                while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                    $brand_title_all=$row_brand_all['brand_title'];
                    $brand_id_all=$row_brand_all['brand_id'];
                    echo "<option value='$brand_id_all'>$brand_title_all</option>";
                };
                
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Ảnh sản phẩm 1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto">
            <img src="./product_images/<?php echo $product_image1?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Ảnh sản phẩm 2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto">
            <img src="./product_images/<?php echo $product_image2?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Ảnh sản phẩm 3</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto">
            <img src="./product_images/<?php echo $product_image3?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Giá sản phẩm</label>
            <input type="text" id="product_price" value = "<?php echo $product_price ?>" name="product_price" class="form-control">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_link" class="form-label">Link nhà sản xuất</label>
            <input type="text" id="product_link" value = "<?php echo $product_link ?>" name="product_link" class="form-control">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="number_available" class="form-label">Số sản phẩm trong kho</label>
            <input type="text" id="number_available" value = "<?php echo $number_available ?>" name="number_available" class="form-control">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" id="edit_product" value="Cập nhật sản phẩm"
            class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>


<!-- edit -->
 <?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keyword'];
    $product_category = $_POST['product_category'] ?? $category_id;
    $product_brand = $_POST['product_brand'] ?? $brand_id;
    if (isset($_FILES['product_image1']['name']) && !empty($_FILES['product_image1']['name'])) {
        $product_image1 = $_FILES['product_image1']['name'];
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
    } else {
        $product_image1 = $row['product_image1'];
    }
    
    if (isset($_FILES['product_image2']['name']) && !empty($_FILES['product_image2']['name'])) {
        $product_image2 = $_FILES['product_image2']['name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
    } else {
        $product_image2 = $row['product_image2'];
    }
    
    if (isset($_FILES['product_image3']['name']) && !empty($_FILES['product_image3']['name'])) {
        $product_image3 = $_FILES['product_image3']['name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];
        move_uploaded_file($temp_image3, "./product_images/$product_image3");
    } else {
        $product_image3 = $row['product_image3'];
    }    
    $product_price=$_POST['product_price'];
    $product_link=$_POST['product_link'];
    $number_available=$_POST['number_available'];

    // update product
    $update_products="update `products` set 
                      category_id = $product_category,
                      brand_id = $product_brand,
                      product_title = '$product_title',
                      product_description = '$product_description',
                      product_keyword = '$product_keyword',
                      product_image1 = '$product_image1',
                      product_image2 = '$product_image2',
                      product_image3 = '$product_image3',
                      product_price = '$product_price',
                      product_link = '$product_link',
                      number_available = '$number_available',
                      date = NOW() where product_id=$edit_id";
    $result_products=mysqli_query($con,$update_products);
    if($result_products){
        echo "<script>alert('Sửa sản phẩm thành công')</script>";
        echo "<script>window.open('./index.php?view_products', '_self')</script>";
    }
}
 ?>
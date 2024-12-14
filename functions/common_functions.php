<?php

// include connect file
include('./includes/connect.php');

// get products
function getproducts(){
    global $con;

    // check isset
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query="select * from `products` order by rand() LIMIT 0,3";
$result_query=mysqli_query($con,$select_query);
// $row=mysqli_fetch_assoc($result_query);
// echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $temp_price=$row['product_price'];
  $product_price = number_format($temp_price, 0, ',', '.');
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card' >
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Xem thêm</a>
    </div>
  </div>
</div>";
}
}
}
}

// get all products
function get_all_products(){
    global $con;

    // check isset
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query="select * from `products` order by rand()";
$result_query=mysqli_query($con,$select_query);
// $row=mysqli_fetch_assoc($result_query);
// echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $temp_price=$row['product_price'];
  $product_price = number_format($temp_price, 0, ',', '.');
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card' >
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Xem thêm</a>
    </div>
  </div>
</div>";
}
}
}
}

// get chosen categories
function get_chosen_categories(){
    global $con;

    // check isset
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
    $select_query="select * from `products` where category_id=$category_id";
$result_query=mysqli_query($con,$select_query);
$num_rows=mysqli_num_rows($result_query);
if ($num_rows==0){
    echo "<h2 class='text-center text-danger'>Không có mặt hàng nào!</h2>";
}
// $row=mysqli_fetch_assoc($result_query);
// echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $temp_price=$row['product_price'];
  $product_price = number_format($temp_price, 0, ',', '.');
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card' >
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Xem thêm</a>
    </div>
  </div>
</div>";
}
}
}


// get chosen brands
function get_chosen_brands(){
    global $con;

    // check isset
    if(isset($_GET['brand'])){
        $brand_id=$_GET['brand'];
    $select_query="select * from `products` where brand_id=$brand_id";
$result_query=mysqli_query($con,$select_query);
$num_rows=mysqli_num_rows($result_query);
if ($num_rows==0){
    echo "<h2 class='text-center text-danger'>Không có mặt hàng nào!</h2>";
}
// $row=mysqli_fetch_assoc($result_query);
// echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $temp_price=$row['product_price'];
  $product_price = number_format($temp_price, 0, ',', '.');
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card' >
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Xem thêm</a>
    </div>
  </div>
</div>";
}
}
}



// display brands
function getbrands(){
    global $con;
    $select_brands="select * from `brands`";
            $result_brands=mysqli_query($con,$select_brands);
            while($row_data=mysqli_fetch_assoc($result_brands)){
              $brand_title=$row_data['brand_title'];
              $brand_id=$row_data['brand_id'];
              echo "<li class='nav-item'>
                <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
            </li>";
            }
}

// display categories
function getcategories(){
    global $con;
    $select_categories="select * from `categories`";
            $result_categories=mysqli_query($con,$select_categories);
            while($row_data=mysqli_fetch_assoc($result_categories)){
              $category_title=$row_data['category_title'];
              $category_id=$row_data['category_id'];
              echo "<li class='nav-item'>
                <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
            </li>";
            }
}
// search products

function search_products(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
    $search_query="select * from `products` where product_keyword like '%$search_data_value%'";
$result_query=mysqli_query($con,$search_query);
$num_rows=mysqli_num_rows($result_query);
if ($num_rows==0){
    echo "<h2 class='text-center text-danger'>Không có mặt hàng nào! Hãy kiểm tra từ khóa của bạn.</h2>";
}
// $row=mysqli_fetch_assoc($result_query);
// echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $temp_price=$row['product_price'];
  $product_price = number_format($temp_price, 0, ',', '.');
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card' >
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Xem thêm</a>
    </div>
  </div>
</div>";
}
}
}

// view details function
function view_details() {
    global $con;

    // check isset
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
            $product_id=$_GET['product_id'];
    $select_query="select * from `products` where product_id = $product_id";
$result_query=mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_image2=$row['product_image2'];
  $product_image3=$row['product_image3'];
  $temp_price=$row['product_price'];
  $product_price = number_format($temp_price, 0, ',', '.');
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  $product_link=$row['product_link'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card' >
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
      <a href='index.php' class='btn btn-secondary'>Trang chủ</a>
    </div>
  </div>
</div>
<div class='col-md-8'>
                <!-- related images -->
                 <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center'>Hình ảnh bổ sung</h4>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                    </div>
                    <div class='col-md-12'>
                    <a href='$product_link' style='margin-left: 20px' id='xemSanPham'>Nhấp vào đây để đọc chi tiết sản phẩm từ trang nhà sản xuất</a>
                    </div>
                 </div>
            </div>";
}
}
}
}
}

// get ip address function from https://www.javatpoint.com/how-to-get-the-ip-address-in-php
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


//cart function
function cart() {
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $select_query="select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_rows=mysqli_num_rows($result_query);
        if ($num_rows>0){
            echo "<script>alert('Mặt hàng đã tồn tại trong giỏ hàng!')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else{
            $insert_query="insert into `cart_details` (product_id, ip_address, quantity)
                            values ($get_product_id, '$ip', 0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('Sản phẩm được thêm thành công vào giỏ!')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
        
    }
}


// function to get cart item numbers
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress();
        $select_query="select * from `cart_details` where ip_address='$ip'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        } else{
        global $con;
        $ip = getIPAddress();
        $select_query="select * from `cart_details` where ip_address='$ip'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        }
    echo $count_cart_items;
    }



function total_cart_price(){
    global $con;
    $ip = getIPAddress();
    $total=0;
    $cart_query="select * from `cart_details` where ip_address='$ip'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="select * from `products` where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total+=$product_values;
        }
    }
    echo number_format($total, 0, ',', '.');
}
?>



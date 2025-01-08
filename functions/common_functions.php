<?php

// include connect file
// include('./includes/connect.php');

// get products
function getproducts(){
    global $con;

    // check isset
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query="select * from `products` order by number_sold desc LIMIT 0,6";
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
  $product_link=$row['product_link'];
  $number_available=$row['total_number'] - $row['number_sold'];
  if ($number_available>0) {
  echo "<div class='col-md-4 mb-2'>
  <div class='card' >
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
      <p class='card-text'>Còn trong kho: $number_available sản phẩm</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Xem thêm</a>
    </div>
  </div>
</div>";
  } else {
    echo "<div class='col-md-4 mb-2'>
  <div class='card' >
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
      <p class='card-text'>Còn trong kho: $number_available sản phẩm</p>
      <a href='$product_link' class='btn btn-secondary'>Đã hết hàng. Nhấp vào đây để đến trang NSX</a>
    </div>
  </div>
</div>";
  }
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
  $product_link=$row['product_link'];
  $number_available=$row['total_number'] - $row['number_sold'];
  if ($number_available>0) {
    echo "<div class='col-md-4 mb-2'>
    <div class='card' >
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
        <p class='card-text'>Còn trong kho: $number_available sản phẩm</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Xem thêm</a>
      </div>
    </div>
  </div>";
    } else {
      echo "<div class='col-md-4 mb-2'>
    <div class='card' >
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
        <p class='card-text'>Còn trong kho: $number_available sản phẩm</p>
        <a href='$product_link' class='btn btn-secondary'>Đã hết hàng. Nhấp vào đây để đến trang NSX</a>
      </div>
    </div>
  </div>";
    }
}
}
}
}


// get 1 products

function get_one_products($number) {
  global $con;

  // Kiểm tra nếu không có category hoặc brand trong URL
  if (!isset($_GET['category']) && !isset($_GET['brand'])) {
      $select_query = "SELECT * FROM `products` ORDER BY product_price LIMIT 6 offset $number";
      $result_query = mysqli_query($con, $select_query);

      while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $temp_price = $row['product_price'];
          $product_price = number_format($temp_price, 0, ',', '.');
          $product_link = $row['product_link'];
          $number_available = $row['total_number'] - $row['number_sold'];

          // Thiết kế hiển thị sản phẩm theo phong cách Apple
          echo "<div class='col-md-4 mb-4'>
                  <div class='card' style='border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);'>
                      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title' style='width: 100%; height: auto; border-radius: 10px;'>
                      <div class='card-body' style='text-align: center;'>
                          <h5 class='card-title' style='font-weight: 600; font-size: 18px; color: #333;'>$product_title</h5>
                          <p class='card-text' style='font-size: 14px; color: #555; max-height: 50px; overflow: hidden; text-overflow: ellipsis;'>$product_description</p>
                          <p class='card-text' style='font-size: 16px; font-weight: 600; color: #333;'>Giá: $product_price VNĐ</p>
                          <p class='card-text' style='font-size: 14px; color: #888;'>Còn trong kho: $number_available sản phẩm</p>";
          
          // Nút hành động: Thêm vào giỏ hàng hoặc xem thêm
          if ($number_available > 0) {
              echo "<a href='index.php?add_to_cart=$product_id' class='btn btn-dark' style='border-radius: 50px; padding: 10px 20px; font-size: 14px; text-transform: uppercase;'>Thêm vào giỏ hàng</a>";
              echo "<a href='product_details.php?product_id=$product_id' class='btn btn-outline-dark' style='border-radius: 50px; padding: 10px 20px; font-size: 14px; margin-top: 10px;'>Xem chi tiết</a>";
          } else {
              echo "<a href='$product_link' class='btn btn-outline-secondary' style='border-radius: 50px; padding: 10px 20px; font-size: 14px;'>Đã hết hàng</a>";
          }

          echo "  </div>
                  </div>
                </div>";
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
  $product_link=$row['product_link'];
  $number_available=$row['total_number'] - $row['number_sold'];
  if ($number_available>0) {
    echo "<div class='col-md-4 mb-2'>
    <div class='card' >
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
        <p class='card-text'>Còn trong kho: $number_available sản phẩm</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Xem thêm</a>
      </div>
    </div>
  </div>";
    } else {
      echo "<div class='col-md-4 mb-2'>
    <div class='card' >
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
        <p class='card-text'>Còn trong kho: $number_available sản phẩm</p>
        <a href='$product_link' class='btn btn-secondary'>Đã hết hàng. Nhấp vào đây để đến trang NSX</a>
      </div>
    </div>
  </div>";
    }
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
  $product_link=$row['product_link'];
  $number_available=$row['total_number'] - $row['number_sold'];
  if ($number_available>0) {
    echo "<div class='col-md-4 mb-2'>
    <div class='card' >
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
        <p class='card-text'>Còn trong kho: $number_available sản phẩm</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Xem thêm</a>
      </div>
    </div>
  </div>";
    } else {
      echo "<div class='col-md-4 mb-2'>
    <div class='card' >
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
        <p class='card-text'>Còn trong kho: $number_available sản phẩm</p>
        <a href='$product_link' class='btn btn-secondary'>Đã hết hàng. Nhấp vào đây để đến trang NSX</a>
      </div>
    </div>
  </div>";
    }
}
}
}


// display brands
function getbrands() {
  global $con;
  $select_brands = "SELECT * FROM `brands`";
  $result_brands = mysqli_query($con, $select_brands);
  while ($row_data = mysqli_fetch_assoc($result_brands)) {
      $brand_title = $row_data['brand_title'];
      $brand_id = $row_data['brand_id'];
      $brand_logo = $row_data['brand_logo'];
      echo "<li class='sidebar-list-item'>
  <a href='index.php?brand=$brand_id' class='sidebar-link'>
     <img src='./admin_area/brand_images/$brand_logo' alt='brand_image' style='width: 25px'> $brand_title
  </a>
</li>";
  }
}


// display categories
function getcategories() {
  global $con;
  $select_categories = "SELECT * FROM `categories`";
  $result_categories = mysqli_query($con, $select_categories);
  while ($row_data = mysqli_fetch_assoc($result_categories)) {
      $category_title = $row_data['category_title'];
      $category_id = $row_data['category_id'];
      $category_logo = $row_data['category_logo'];
      echo "<li class='sidebar-list-item'>
              <a href='index.php?category=$category_id' class='sidebar-link'>
              <img src='./admin_area/category_images/$category_logo' alt='category_image' style='width: 25px'> $category_title</a>
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
  $product_link=$row['product_link'];
  $number_available=$row['total_number'] - $row['number_sold'];
  if ($number_available>0) {
    echo "<div class='col-md-4 mb-2'>
    <div class='card' >
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
        <p class='card-text'>Còn trong kho: $number_available sản phẩm</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Xem thêm</a>
      </div>
    </div>
  </div>";
    } else {
      echo "<div class='col-md-4 mb-2'>
    <div class='card' >
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
        <p class='card-text'>Còn trong kho: $number_available sản phẩm</p>
        <a href='$product_link' class='btn btn-secondary'>Đã hết hàng. Nhấp vào đây để đến trang NSX</a>
      </div>
    </div>
  </div>";
    }
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
  $product_youtube=$row['product_youtube'];
  $number_available=$row['total_number'] - $row['number_sold'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card' >
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Giá sản phẩm: $product_price VNĐ</p>
      <p class='card-text'>Còn trong kho: $number_available sản phẩm</p>
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
                    <a href='$product_link' style='margin-left: 20px' id='xemSanPham' class='my-3'>Nhấp vào đây để đọc chi tiết sản phẩm từ trang nhà sản xuất</a>
                    </div>
                    <div class='video-container'>
                      <div class='video-title'>
                          Mời bạn xem video <span>giới thiệu sản phẩm của chúng tôi</span>
                      </div>
                      <iframe 
                          src='$product_youtube' 
                          title='YouTube video player' 
                          allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' 
                          allowfullscreen>
                      </iframe>
                  </div>
                 </div>
            </div>";
}
}
}
}
}

// function to get user_id
function get_user_id(){
  global $con;
  $username=$_SESSION['username'];
  $get_user_id="select * from `user_table` where username='$username'";
  $result_query=mysqli_query($con,$get_user_id);
  while($row_query=mysqli_fetch_array($result_query)){
      $user_id=$row_query['user_id'];
  }
  return $user_id;
}
//cart function
function cart() {
  if (isset($_GET['add_to_cart'])) {
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
      
      global $con;

      // Lấy ID sản phẩm từ URL
      $get_product_id = $_GET['add_to_cart'];

      // Kiểm tra nếu người dùng đã đăng nhập
      if (isset($_SESSION['username'])) {
          // Lấy user_id từ phiên đăng nhập
          $user_id = get_user_id(); // Hàm này phải trả về user_id của người dùng hiện tại

          // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
          $select_query = "SELECT * FROM `cart_details` WHERE user_id = '$user_id' AND product_id = $get_product_id";
          $result_query = mysqli_query($con, $select_query);
          $num_rows = mysqli_num_rows($result_query);

          if ($num_rows > 0) {
              echo "<script>alert('Mặt hàng đã tồn tại trong giỏ hàng!')</script>";
              echo "<script>window.open('index.php', '_self')</script>";
          } else {
              // Thêm sản phẩm vào giỏ hàng
              $insert_query = "INSERT INTO `cart_details` (product_id, user_id, quantity) 
                              VALUES ($get_product_id, '$user_id', 1)";
              $result_query = mysqli_query($con, $insert_query);

              echo "<script>alert('Sản phẩm được thêm thành công vào giỏ!')</script>";
              echo "<script>window.open('index.php', '_self')</script>";
          }
      } else {
          // Nếu người dùng chưa đăng nhập, yêu cầu họ đăng nhập
          echo "<script>alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!')</script>";
          echo "<script>window.open('user_area/user_login.php', '_self')</script>";
      }
  }
}


// function to get cart item numbers
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        // ...existing code...
        global $con;
        if (isset($_SESSION['username'])){
        $select_query="select * from `cart_details` where user_id='".get_user_id()."'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        } else {
          $count_cart_items=0;
        }
        } else{
        global $con;
        if (isset($_SESSION['username'])){
          $select_query="select * from `cart_details` where user_id='".get_user_id()."'";
          $result_query=mysqli_query($con,$select_query);
          $count_cart_items=mysqli_num_rows($result_query);
          } else {
            $count_cart_items=0;
          }
        }
    echo $count_cart_items;
    }


// function to get total price of cart
function total_cart_price(){
    global $con;
    $total=0;
    if (isset($_SESSION['username'])) {
      $user_id=get_user_id();
      $cart_query="select * from `cart_details` where user_id='$user_id'";
      $result=mysqli_query($con,$cart_query);
      while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $product_qty=$row['quantity'];
        $select_products="select * from `products` where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total+=$product_values*$product_qty;
        }
      }
    }
    return number_format($total, 0, ',', '.');
}
function total_cart_price_num() {
  global $con;
  $total = 0;
  if (isset($_SESSION['username'])) {
    $user_id=get_user_id();
    $cart_query="select * from `cart_details` where user_id='$user_id'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $product_qty=$row['quantity'];
      $select_products="select * from `products` where product_id='$product_id'";
      $result_products=mysqli_query($con,$select_products);
      while($row_product_price=mysqli_fetch_array($result_products)){
          $product_price=array($row_product_price['product_price']);
          $product_values=array_sum($product_price);
          $total+=$product_values*$product_qty;
      }
    }
  }
  return $total; // Trả về số thực tế, không định dạng
}


// get user order details

function get_user_order_details() {
  global $con;
  $username=$_SESSION['username'];
  $get_details="select * from `user_table` where username='$username'";
  $result_query=mysqli_query($con,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
          $get_orders="select * from `user_orders` where user_id=$user_id and order_status='pending'";
          $result_orders_query=mysqli_query($con,$get_orders);
          $row_count=mysqli_num_rows($result_orders_query);
          if($row_count>0){
            echo "<h3 class='text-center text-success mt-5 mb-2'>Bạn có <span class='text-danger'>$row_count
            </span> đơn hàng đang chờ xác nhận.</h3>
            <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Chi tiết đơn hàng</a></p>";
          } else {
            echo "<h3 class='text-center text-success mt-5 mb-2'>Bạn không có đơn hàng đang chờ xác nhận.</h3>
            <p class='text-center'><a href='../index.php' class='text-dark'>Tới trang chủ</a></p>";
          }
        }
      }
    }
  }
}
?>



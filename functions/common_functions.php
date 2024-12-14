<?php

// include connect file
include('./includes/connect.php');

// get products
function getproducts(){
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
  $product_price=$row['product_price'];
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card' >
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href='#' class='btn btn-info'>Thêm vào giỏ hàng</a>
      <a href='#' class='btn btn-secondary'>Xem thêm</a>
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
  $product_price=$row['product_price'];
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card' >
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href='#' class='btn btn-info'>Thêm vào giỏ hàng</a>
      <a href='#' class='btn btn-secondary'>Xem thêm</a>
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
  $product_price=$row['product_price'];
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card' >
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href='#' class='btn btn-info'>Thêm vào giỏ hàng</a>
      <a href='#' class='btn btn-secondary'>Xem thêm</a>
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
// $row=mysqli_fetch_assoc($result_query);
// echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price'];
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card' >
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href='#' class='btn btn-info'>Thêm vào giỏ hàng</a>
      <a href='#' class='btn btn-secondary'>Xem thêm</a>
    </div>
  </div>
</div>";
}
}
}
?>
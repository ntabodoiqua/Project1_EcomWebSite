<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecomerce Website using PHP and mySQL</title>
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
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="./images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Đăng ký</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Liên hệ chúng tôi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup> Giỏ hàng </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tổng tiền: 100/-</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <ul class="navbar-nav me-auto">
    <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest!</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Đăng nhập</a>
        </li>
    </ul>
</nav>

<!-- third child -->
 <div class="bg-light">
    <h3 class="text-center">Cửa hàng ẩn</h3>
    <p class="text-center">Giao tiếp là trái tim của thương mại điện tử</p>
 </div>


 <!-- fourth child -->
  <div class="row">
    <div class="col-md-10">
        <!-- products -->
        <div class="row">
            <div class="col-md-4 mb-2">
            <div class="card" >
  <img src="./images/hp-15.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Thêm vào giỏ hàng</a>
    <a href="#" class="btn btn-secondary">Xem thêm</a>
  </div>
</div>
            </div>
            <div class="col-md-4 mb-2">
            <div class="card">
  <img src="./images/macbook-air-m1-2020.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Thêm vào giỏ hàng</a>
    <a href="#" class="btn btn-secondary">Xem thêm</a>
  </div>
</div>
            </div>
            <div class="col-md-4 mb-2">
            <div class="card">
  <img src="./images/acer-aspire-lite-14.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Thêm vào giỏ hàng</a>
    <a href="#" class="btn btn-secondary">Xem thêm</a>
  </div>
</div>
            </div>
            <div class="col-md-4 mb-2">
            <div class="card">
  <img src="./images/acer-aspire-lite-14.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Thêm vào giỏ hàng</a>
    <a href="#" class="btn btn-secondary">Xem thêm</a>
  </div>
</div>
            </div>
            <div class="col-md-4 mb-2">
            <div class="card">
  <img src="./images/acer-aspire-lite-14.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Thêm vào giỏ hàng</a>
    <a href="#" class="btn btn-secondary">Xem thêm</a>
  </div>
</div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card">
  <img src="./images/acer-aspire-lite-14.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Thêm vào giỏ hàng</a>
    <a href="#" class="btn btn-secondary">Xem thêm</a>
  </div>
</div>
    </div>
</div>
</div>
    <div class="col-md-2 bg-secondary p-0">
        <!-- brands to be displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Delivery Brands
                </h4></a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link text-light">Brand1</a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link text-light">Brand2</a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link text-light">Brand3</a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link text-light">Brand4</a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link text-light">Brand5</a>
            </li>
        </ul>

        <!-- categories to be displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Categories
                </h4></a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link text-light">Category1</a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link text-light">Category2</a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link text-light">Category3</a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link text-light">Category4</a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link text-light">Category5</a>
            </li>
        </ul>
    </div>
    
  </div>
<!-- last child -->
 <div class="bg-info p-2 text-center">
    <p>All Rights Reserved (©) Designed by NTA - 2024 - SOICT</p>
 </div>
     </div>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
crossorigin="anonymous"></script>
</body>
</html>
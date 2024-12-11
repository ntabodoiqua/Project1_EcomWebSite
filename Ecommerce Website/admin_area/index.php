<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
crossorigin="anonymous">

<!-- css file -->  
 <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg navbar-light bg-info">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest!</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>


        <!-- second child -->
         <div class="bg-light">
            <h3 class="text-center p-2">Quản lý chi tiết</h3>
         </div>

         <!-- third child -->
          <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <a href="#"><img src="../images/hacker-nga.webp" alt="" class="admin_ava"></a>
                    <p class="text-light text-center">NTA</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">Thêm sản phẩm</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Xem sản phẩm</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Thêm danh mục</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Xem danh mục</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Thêm nhãn hàng</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Xem nhãn hàng</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Tất cả đơn đặt hàng</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Tất cả thanh toán</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Danh sách người dùng</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Đăng xuất</a></button>
                </div>
            </div>
          </div>
     </div>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
crossorigin="anonymous"></script>
</body>
</html>
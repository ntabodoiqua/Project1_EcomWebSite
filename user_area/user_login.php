<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <!-- bootstrap CSS link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center my-3">Đăng nhập</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!-- usermame -->
                        <label for="user_username" class="form-label">Tên đăng nhập:</label>
                        <input type="text" id="user_username" class="form-control"  placeholder="Điền tên đăng nhập" autocomplete="off" required="required" name="user_username"/>
                    </div>
                    <div class="form-outline mb-4">
                        <!-- password -->
                        <label for="user_password" class="form-label">Mật khẩu:</label>
                        <input type="password" id="user_password" class="form-control"  placeholder="Nhập mật khẩu" autocomplete="off" required="required" name="user_password"/>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Đăng nhập" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 mt-2 pt-1">Chưa có tài khoản? <a href="user_registration.php" class="text-danger">Đăng ký</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
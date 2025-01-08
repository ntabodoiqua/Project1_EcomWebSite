<?php
if (isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="select * from `user_table` where username='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_phone=$row_fetch['user_phone'];
    
    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_phone=$_POST['user_phone'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");
        // update query
        if(empty($user_image)){
            $user_image = $row_fetch['user_image'];
        }
        $update_data="update `user_table` set username='$username',
        user_email='$user_email', user_image='$user_image', user_address='$user_address', user_phone='$user_phone'
        where user_id=$update_id";
        $result_query_update=mysqli_query($con,$update_data);
        if($result_query_update){
            echo "<script>alert('Cập nhật thành công!')</script>";
            echo "<script>window.open('user_logout.php','_self')</script>";
        }


    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin</title>
    <style>
        .edit_img{
            width:100px;
            height:100px;
            object-fit:contain;
        }
    </style>
</head>
<body>
    <h3 class="text-center text-success mb-4">Sửa thông tin</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username?>" name="user_username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email?>" name="user_email">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control" name="user_image">
            <img src="./user_images/<?php echo $user_image?>" alt="" class="edit_img">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_phone?>" name="user_phone">
        </div>

        <div class="form-outline mb-4">
            <input type="submit" class="bg-info py-2 px-3 border-0" value="Cập nhật" name="user_update">
        </div>
    </form>
</body>
</html>
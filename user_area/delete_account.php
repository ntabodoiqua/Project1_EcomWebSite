
<div class="container mt-5">
        <div class="card border-danger">
            <div class="card-header bg-danger text-white text-center">
                <h3>Xác nhận xóa tài khoản</h3>
            </div>
            <div class="card-body text-center">
                <p class="text-danger">Bạn có muốn xóa tài khoản không? Tài khoản của bạn sẽ không thể được khôi phục sau khi xóa.</p>
                <form action="" method="post">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-danger" name="delete" value="yes">Tôi đồng ý!</button>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-secondary" name="dont_delete" value="no">Không, hãy giữ tài khoản của tôi.</button>
                    </div>
                </form>



                <?php
                $username_session=$_SESSION['username'];
                $select_user="select * from `user_table` where username='$username_session'";
                $result_select=mysqli_query($con,$select_user);
                $row_fetch=mysqli_fetch_assoc($result_select);
                $user_id=$row_fetch['user_id'];
                if(isset($_POST['delete'])){
                    $select_order_query="select * from `user_orders` where user_id=$user_id and order_status='Complete'";
                    $result_order=mysqli_query($con,$select_order_query);
                    $num_rows=mysqli_num_rows($result_order);
                    if($num_rows>0) {
                        echo "<script>alert('Bạn không thể xóa tài khoản vì có đơn hàng đã xác nhận! Bạn chỉ có thể xóa khi đã nhận hàng.')</script>";
                        echo "<script>window.open('profile.php', '_self')</script>";
                    } else {
                    $delete_query="delete FROM user_table
                                    WHERE username = '$username_session'";
                    $result=mysqli_query($con,$delete_query);
                    if ($result){
                        session_destroy();
                        echo "<script>alert('Xóa thành công!')</script>";
                        echo "<script>window.open('../index.php', '_self')</script>";
                    }
                }
            }
                if(isset($_POST['dont_delete'])){
                    echo "<script>window.open('profile.php', '_self')</script>";
                }
            
                ?>
            </div>
        </div>
    </div>

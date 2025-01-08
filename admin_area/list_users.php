<h3 class="text-center text-success my-4">Tất cả người dùng</h3>
<table class="table table-bordered table-hover table-striped mt-5">
    <thead class="table-dark">
        <tr class="text-center">
            <th>STT</th>
            <th>Username</th>
            <th>Email</th>
            <th>Ảnh đại diện</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Xóa người dùng</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_users="SELECT * FROM `user_table`";
        $result=mysqli_query($con,$get_users);
        $row_count=mysqli_num_rows($result);

        if($row_count==0){
            echo "<tr><td colspan='7' class='bg-danger text-center'>Chưa có người dùng nào!</td></tr>";
        } else {
            $number = 0;
            while($row_data=mysqli_fetch_assoc($result)){
                $user_id=$row_data['user_id'];
                $username=$row_data['username'];
                $user_email=$row_data['user_email'];
                $user_image=$row_data['user_image'];
                $user_address=$row_data['user_address'];
                $user_phone=$row_data['user_phone'];
                $number++;
        echo "
        <tr class='text-center'>
            <td>$number</td>
            <td>$username</td>
            <td>$user_email</td>
            <td><img src='../user_area/user_images/$user_image' alt='' class='admin_ava'></td>
            <td>$user_address</td>
            <td>$user_phone</td>
            <td>
            <button class='btn btn-sm btn-danger delete-btn' data-id=$user_id>
                    <i class='fa-solid fa-trash'></i> Xóa
                </button>
            </td>
        </tr>
        ";
        ?>
        <?php
            }
        }
        ?>
    </tbody>
</table>
<!-- Modal Xác nhận Xóa -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Bạn có chắc chắn muốn xóa người dùng này?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_users" class="text-decoration-none text-light">Không</a></button>
                <a href="#" id="confirmDeleteLink" class="btn btn-danger">Có</a>
            </div>
        </div>
    </div>
</div>

<!-- Thêm JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        $('.delete-btn').on('click', function () {
            var userId = $(this).data('id');
            $('#confirmDeleteLink').attr('href', 'index.php?delete_user=' + userId);
            $('#deleteModal').modal('show');
        });
    });
</script>

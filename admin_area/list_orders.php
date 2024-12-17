<h3 class="text-center text-success my-4">Tất cả đơn hàng</h3>
<table class="table table-bordered table-hover table-striped mt-5">
    <thead class="table-dark">
        <tr class="text-center">
            <th>STT</th>
            <th>Mã người dùng</th>
            <th>Số hóa đơn</th>
            <th>Tổng sản phẩm</th>
            <th>Tổng số tiền</th>
            <th>Ngày đặt</th>
            <th>Trạng thái</th>
            <th>Xóa đơn</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_orders="SELECT * FROM `user_orders`";
        $result=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result);

        if($row_count==0){
            echo "<tr><td colspan='8' class='bg-danger text-center'>Chưa có đơn nào!</td></tr>";
        } else {
            $number = 0;
            while($row_data=mysqli_fetch_assoc($result)){
                $order_id=$row_data['order_id'];
                $user_id=$row_data['user_id'];
                $invoice_number=$row_data['invoice_number'];
                $total_money=$row_data['amount_due'];
                $total_products=$row_data['total_products'];
                $order_date=$row_data['order_date'];
                $order_status=$row_data['order_status'];
                $number++;
        ?>
        <tr class="text-center">
            <td><?php echo $number; ?></td>
            <td><?php echo $user_id; ?></td>
            <td><?php echo $invoice_number; ?></td>
            <td><?php echo $total_products; ?></td>
            <td><?php echo number_format($total_money,0,',','.'); ?></td>
            <td><?php echo $order_date; ?></td>
            <td>
                <span class="badge <?php echo $order_status === 'Complete' ? 'bg-success' : 'bg-danger'; ?>">
                    <?php echo ucfirst($order_status); ?>
                </span>
            </td>
            <td>
            <button class="btn btn-sm btn-danger delete-btn" data-id="<?php echo $order_id; ?>">
                    <i class="fa-solid fa-trash"></i> Xóa
                </button>
            </td>
        </tr>
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
                <h4>Bạn có chắc chắn muốn xóa đơn này?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_orders" class="text-decoration-none text-light">Không</a></button>
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
            var orderId = $(this).data('id');
            $('#confirmDeleteLink').attr('href', 'index.php?delete_order=' + orderId);
            $('#deleteModal').modal('show');
        });
    });
</script>

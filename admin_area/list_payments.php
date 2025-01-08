<!-- Thanh tìm kiếm theo số hóa đơn -->
<form method="get" action="index.php" class="mb-4">
    <div class="input-group">
        <!-- Giữ lại giá trị GET để điều hướng đúng -->
        <input type="hidden" name="list_payments" value="1">
        <input type="text" name="search_invoice" class="form-control" placeholder="Nhập số hóa đơn" value="<?php echo isset($_GET['search_invoice']) ? $_GET['search_invoice'] : ''; ?>">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </div>
</form>
<h3 class="text-center text-success my-4">Tất cả đơn hàng đã xác nhận</h3>
<table class="table table-bordered table-hover table-striped mt-5">
    <thead class="table-dark">
        <tr class="text-center">
            <th>STT</th>
            <th>Tổng tiền</th>
            <th>Số hóa đơn</th>
            <th>Ngày đặt</th>
            <th>Địa chỉ</th>
            <th>Xóa đơn</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        // Lấy giá trị tìm kiếm từ GET
        $search_invoice = isset($_GET['search_invoice']) ? $_GET['search_invoice'] : '';

        // Câu truy vấn SQL với điều kiện tìm kiếm
        if ($search_invoice) {
            $get_orders = "SELECT * FROM `user_confirm` WHERE `invoice_number` = '$search_invoice'";
        } else {
            $get_orders = "SELECT * FROM `user_confirm`";
        }

        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<tr><td colspan='6' class='bg-danger text-center'>Chưa có đơn nào!</td></tr>";
        } else {
            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $confirm_id = $row_data['confirm_id'];
                $total_amount = $row_data['amount'];
                $invoice_number = $row_data['invoice_number'];
                $order_date = $row_data['date'];
                $order_address = $row_data['deli_address'];
                $number++;
        ?>
        <tr class="text-center">
            <td><?php echo $number; ?></td>
            <td><?php echo number_format($total_amount, 0, ',', '.'); ?></td>
            <td><?php echo $invoice_number; ?></td>
            <td><?php echo $order_date; ?></td>
            <td><?php echo $order_address; ?></td>
            <td>
                <button class="btn btn-sm btn-danger delete-btn" data-id="<?php echo $confirm_id; ?>">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_payments" class="text-decoration-none text-light">Không</a></button>
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
            var confirm_id = $(this).data('id');
            $('#confirmDeleteLink').attr('href', 'index.php?delete_payment=' + confirm_id);
            $('#deleteModal').modal('show');
        });
    });
</script>

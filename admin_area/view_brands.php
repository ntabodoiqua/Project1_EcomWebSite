<h3 class="text-center text-success my-4">Tất cả nhãn hàng</h3>
<table class="table table-bordered table-hover table-striped mt-5">
    <thead class="table-dark">
        <tr class="text-center">
            <th>STT</th>
            <th>Tên nhãn hàng</th>
            <th>Chỉnh sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_bra = "SELECT * FROM `brands`";
        $result_bra = mysqli_query($con, $select_bra);
        $num = 0;
        while ($row = mysqli_fetch_assoc($result_bra)) {
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            $num++;
        ?>
        <tr class="text-center">
            <td><?php echo $num; ?></td>
            <td><?php echo $brand_title; ?></td>
            <td>
                <a href='index.php?edit_brand=<?php echo $brand_id ?>' class="btn btn-sm btn-warning">
                    <i class="fa-solid fa-pen-to-square"></i> Sửa
                </a>
            </td>
            <td>
                <button class="btn btn-sm btn-danger delete-btn" data-id="<?php echo $brand_id; ?>">
                    <i class="fa-solid fa-trash"></i> Xóa
                </button>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<!-- Modal Xác nhận Xóa -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Bạn có chắc chắn muốn xóa hãng này?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands" class="text-decoration-none text-light">Không</a></button>
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
            var brandId = $(this).data('id');
            $('#confirmDeleteLink').attr('href', 'index.php?delete_brand=' + brandId);
            $('#deleteModal').modal('show');
        });
    });
</script>

<h3 class="text-center text-success my-4">Tất cả danh mục</h3>
<table class="table table-bordered table-hover table-striped mt-5">
    <thead class="table-dark">
        <tr class="text-center">
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Chỉnh sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_cat = "SELECT * FROM `categories`";
        $result_cat = mysqli_query($con, $select_cat);
        $num = 0;
        while ($row = mysqli_fetch_assoc($result_cat)) {
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $num++;
        ?>
        <tr class="text-center">
            <td><?php echo $num; ?></td>
            <td><?php echo $category_title; ?></td>
            <td>
                <a href='index.php?edit_category=<?php echo $category_id ?>' class="btn btn-sm btn-warning">
                    <i class="fa-solid fa-pen-to-square"></i> Sửa
                </a>
            </td>
            <td>
                <button class="btn btn-sm btn-danger delete-btn" data-id="<?php echo $category_id; ?>">
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
                <h4>Bạn có chắc chắn muốn xóa danh mục này?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_categories" class="text-decoration-none text-light">Không</a></button>
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
            var categoryId = $(this).data('id');
            $('#confirmDeleteLink').attr('href', 'index.php?delete_category=' + categoryId);
            $('#deleteModal').modal('show');
        });
    });
</script>

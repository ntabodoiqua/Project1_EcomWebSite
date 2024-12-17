<h3 class="text-center text-success my-4">Xem toàn bộ sản phẩm</h3>
<table class="table table-bordered table-hover table-striped mt-5">
    <thead class="table-dark">
        <tr class="text-center">
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Đã bán được</th>
            <th>Còn lại</th>
            <th>Trạng thái</th>
            <th>Chỉnh sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_products = "SELECT * FROM `products`";
        $result = mysqli_query($con, $get_products);
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $format_price = number_format($product_price, 0, ',', '.');
            $product_status = $row['status'];

            // Fetch sales and availability
            $get_count = "SELECT * FROM `products` WHERE product_id = $product_id";
            $result_count = mysqli_query($con, $get_count);
            $rows_sold = mysqli_fetch_assoc($result_count);
            $num_sold = $rows_sold['number_sold'];
            $num_conlai = $rows_sold['number_available'] - $rows_sold['number_sold'];
        ?>
        <tr class="text-center">
            <td><?php echo $product_id; ?></td>
            <td><?php echo $product_title; ?></td>
            <td><img src="./product_images/<?php echo $product_image1; ?>" class="product_img rounded" alt="Ảnh sản phẩm" style="width: 80px; height: auto;"></td>
            <td><?php echo $format_price; ?> VNĐ</td>
            <td><?php echo $num_sold; ?></td>
            <td><?php echo $num_conlai; ?></td>
            <td>
                <span class="badge <?php echo $product_status === 'true' ? 'bg-success' : 'bg-danger'; ?>">
                    <?php echo ucfirst($product_status); ?>
                </span>
            </td>
            <td>
                <a href="index.php?edit_products=<?php echo $product_id; ?>" class="btn btn-sm btn-warning">
                    <i class="fa-solid fa-pen-to-square"></i> Sửa
                </a>
            </td>
            <td>
                <a href="index.php?delete_products=<?php echo $product_id; ?>" class="btn btn-sm btn-danger">
                    <i class="fa-solid fa-trash"></i> Xóa
                </a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

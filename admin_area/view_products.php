
<h3 class="text-center text-success">Xem toàn bộ sản phẩm</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
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
        $get_products="select * from `products`";
        $result=mysqli_query($con,$get_products);
        while($row=mysqli_fetch_assoc($result)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $format_price=number_format($product_price, 0, ',', '.');
            $product_status=$row['status'];
        ?>
        <tr class='text-center'>
            <td><?php echo $product_id ?></td>
            <td><?php echo $product_title ?></td>
            <td><img src='./product_images/<?php echo $product_image1 ?>' class='product_img'/></td>
            <td><?php echo $format_price ?> VNĐ</td>
            <td><?php
            $get_count="select * from `products` where product_id=$product_id";
            $result_count=mysqli_query($con,$get_count);
            $rows_sold=mysqli_fetch_assoc($result_count);
            $num_sold=$rows_sold['number_sold'];
            echo $num_sold;
            ?></td>
            <td><?php
            $get_count="select * from `products` where product_id=$product_id";
            $result_count=mysqli_query($con,$get_count);
            $rows_sold=mysqli_fetch_assoc($result_count);
            $num_conlai=$rows_sold['number_available'] - $rows_sold['number_sold'];
            echo $num_conlai;
            ?></td>
            <td><?php echo $product_status ?></td>
        
            <td><a href='index.php?edit_products=<?php echo $product_id ?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_products=<?php echo $product_id ?>'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
        ?>
        
    </tbody>
</table>

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 13, 2025 lúc 11:47 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mystore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'ntabodoiqua', 'anhnta2004@gmail.com', '$2y$10$Ixh0RrnRJgXJFizkF.o7pO.jt0R3w0Qmu1dU.1xCbpLZcPK3PVyUm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL,
  `brand_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `brand_logo`) VALUES
(5, 'HP', 'hp logo.webp'),
(8, 'Acer', 'Logo Acer.png'),
(9, 'ASUS', 'asus logo.png'),
(10, 'Lenovo', 'logo lenovo.svg'),
(11, 'Dell', 'logo dell.svg'),
(12, 'Apple', 'logo apple.svg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL,
  `category_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `category_logo`) VALUES
(8, 'Đồ họa - Kĩ thuật', 'dohoa.png'),
(11, 'Gaming', 'games.png'),
(12, 'Học tập', 'hoctap.png'),
(13, 'Văn phòng', 'vanphong.png'),
(15, 'Sinh viên', 'sinhvien.png'),
(18, 'Laptop AI', 'laptopAi.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL,
  `product_link` varchar(255) NOT NULL,
  `product_youtube` varchar(255) NOT NULL,
  `total_number` int(11) NOT NULL,
  `number_sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keyword`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`, `product_link`, `product_youtube`, `total_number`, `number_sold`) VALUES
(34, 'Apple MacBook Air M2 2024 8CPU 8GPU 16GB 256GB', 'Apple Macbook Air M2 2024 16GB 256GB thiết kế siêu mỏng 1.13cm, trang bị chip M2 8 nhân GPU, 16 nhân Neural Engine, RAM khủng 16GB, SSD 256GB, màn hình IPS Liquid Retina Display cùng hệ thống 4 loa cho trải nghiệm đỉnh cao.', 'apple, macbook, m2, 2024', 8, 12, 'sp1_1.webp', 'sp1_2.webp', 'sp1_3.webp', '23590000', '2025-01-07 19:38:02', 'true', 'https://cellphones.com.vn/macbook-air-m2-2022-16gb.html', 'https://www.youtube.com/embed/P7LrsT2MoTY?si=AUTWaYoOQxgC0kpu', 50, 1),
(35, 'Laptop ASUS Vivobook 15 X1504ZA-NJ517W', 'Bạn là học sinh - sinh viên hay dân văn phòng đang tìm mua máy tính xách tay nhỏ gọn nhưng đồng thời phải đáp ứng yêu cầu về mặt hiệu năng? Vậy thì đừng bỏ qua Vivobook 15 X1504ZA-NJ517W - mẫu laptop Asus Vivobook văn phòng đến từ nhà ASUS.', 'asus, vivobook, 15', 15, 9, 'sp2_1.webp', 'sp2_2.webp', 'sp2_3.webp', '13990000', '2025-01-07 19:41:22', 'true', 'https://cellphones.com.vn/laptop-asus-vivobook-15-x1504za-nj517w.html', 'https://www.youtube.com/embed/mxWGSBKWxI4?si=MqSJE7Mdo7S3fwRZ', 45, 0),
(36, 'Laptop Lenovo LOQ 15IAX9 83GS001RVN', 'Nếu bạn đang tìm kiếm mẫu laptop gaming được trang bị CPU tối thiểu Core i5 với thiết kế đẹp mắt thì đừng bỏ qua LOQ 15IAX9 83GS001RVN. Sản phẩm đến từ thương hiệu Lenovo tích hợp nhiều công nghệ tân tiến hứa hẹn sẽ mang lại cho bạn trải nghiệm chiến game', 'lenovo, loq', 11, 10, 'sp3_01.webp', 'sp3_02.webp', 'sp3_03.webp', '20490000', '2025-01-08 02:25:33', 'true', 'https://cellphones.com.vn/laptop-lenovo-loq-15iax9-83gs001rvn.html', 'https://www.youtube.com/embed/K53wm4A2FVE?si=XlM1c1PxHKpf-hp1', 60, 0),
(37, 'Laptop Dell Inspiron 15 3520-5810BLK 102F0', 'Là chiếc laptop Dell Inspiron tầm trung, Dell Inspiron 15 3520-5810BLK 102F0 gây ấn tượng với thiết kế màn hình cảm ứng thời thượng và hiệu năng mạnh mẽ, xử lý tác vụ êm mượt với Core i5-1155G7.', 'dell, inspiron, 15', 13, 11, 'sp4_01.webp', 'sp4_02.webp', 'sp4_03.webp', '13990000', '2025-01-08 02:29:41', 'true', 'https://cellphones.com.vn/laptop-dell-inspiron-15-3520-5810blk-102f0.html', 'https://www.youtube.com/embed/4M3eqSO-PxU?si=uaKT65tomw-IF7dl', 30, 0),
(38, 'Laptop Acer Aspire 3 Spin A3SP14-31PT-387Z', 'Laptop Acer Aspire 3 Spin 14 A3SP14-31PT-387Z là mẫu laptop sở hữu tính linh hoạt khi vừa có thể dễ dàng thay đổi để trở thành một chiếc máy tính bảng Windows khi cần thiết. Acer còn trang bị cấu hình đủ ổn định để laptop có thể xử lý tốt mọi tác vụ liên ', 'acer, aspire, 3, spin', 18, 8, 'sp5_01.webp', 'sp5_02.webp', 'sp5_03.webp', '14990000', '2025-01-08 02:32:49', 'true', 'https://cellphones.com.vn/laptop-acer-aspire-3-spin-14-a3sp14-31pt-387z.html', 'https://www.youtube.com/embed/iYwoWlzelfo?si=eOwjM1k0JE_BnQhK', 10, 0),
(39, 'Laptop HP 15S-FQ5231TU 8U241PA', 'Laptop HP 15S-FQ5231TU 8U241PA sở hữu cấu hình với con chip I3-1215U cùng với bộ nhớ RAM 8GB cùng ổ cứng lưu trữ dung lượng 256GB PCIE giúp hoạt động ổn định. Cùng với đó, mẫu laptop HP này sở hữu hiện đại cùng màn hình hiển thị 15.6 inch rộng rãi.', 'hp, 15s', 12, 5, 'sp6_01.webp', 'sp6_02.webp', 'sp6_03.webp', '11990000', '2025-01-08 02:43:33', 'true', 'https://cellphones.com.vn/laptop-hp-15s-fq5231tu-8u241pa.html', 'https://www.youtube.com/embed/KdB4v9ssdIY?si=w6GOUx8HJwjoCXXH', 90, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `temp_product_sold`
--

CREATE TABLE `temp_product_sold` (
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `temp_sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `temp_product_sold`
--

INSERT INTO `temp_product_sold` (`invoice_number`, `product_id`, `temp_sold`) VALUES
(1425246550, 34, 1),
(988575520, 39, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_cancel`
--

CREATE TABLE `user_cancel` (
  `cancel_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cancel_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_confirm`
--

CREATE TABLE `user_confirm` (
  `confirm_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deli_address` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_confirm`
--

INSERT INTO `user_confirm` (`confirm_id`, `order_id`, `invoice_number`, `date`, `deli_address`, `amount`) VALUES
(2, 19, 1425246550, '2025-01-07 19:40:55', 'Trung tả', '23590000'),
(3, 20, 988575520, '2025-01-08 02:43:41', 'Trung Tả', '11990000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(19, 2, 23590000, 1425246550, 1, '2025-01-08 02:38:02', 'complete'),
(20, 2, 11990000, 988575520, 1, '2025-01-08 09:43:33', 'complete');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_fullname`, `user_email`, `user_password`, `user_image`, `user_address`, `user_phone`) VALUES
(2, 'ntabodoiqua', 'Nguyễn Thế Anh', 'anhnta2004@gmail.com', '$2y$10$2gqSdF6Rh1OGyZEFqBd9rOzQZ/emEtsV44vpS8fgyhNw7Tt/016kS', 'theanh.png', 'Số 58/22 ngõ Trung Tả, phường Thổ Quan, quận Đống Đa, HN', '0966277109'),
(3, 'taikhoandemo', 'Nguyễn Văn A', 'a@gmail.com', '$2y$10$buT6klAsf.RY46LmcMj0zOX9iBdd0Mebu65/5EVbA2yyOtdHstQvS', 'vuhieu.png', 'HN', '0123456789');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Chỉ mục cho bảng `user_cancel`
--
ALTER TABLE `user_cancel`
  ADD PRIMARY KEY (`cancel_id`);

--
-- Chỉ mục cho bảng `user_confirm`
--
ALTER TABLE `user_confirm`
  ADD PRIMARY KEY (`confirm_id`);

--
-- Chỉ mục cho bảng `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `user_cancel`
--
ALTER TABLE `user_cancel`
  MODIFY `cancel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `user_confirm`
--
ALTER TABLE `user_confirm`
  MODIFY `confirm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

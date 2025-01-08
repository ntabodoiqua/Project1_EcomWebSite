<?php
// Include thư viện PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
require '../vendor/autoload.php'; // Đảm bảo đường dẫn chính xác nếu sử dụng Composer

// Kết nối cơ sở dữ liệu
include('../includes/connect.php');

// Kiểm tra nếu người dùng yêu cầu tải về Excel
if (isset($_GET['export_excel'])) {
    // Truy vấn dữ liệu đơn hàng và tên người dùng
    $query = "SELECT uo.*, ut.user_fullname FROM user_orders uo
              LEFT JOIN user_table ut ON uo.user_id = ut.user_id";
    $result = mysqli_query($con, $query);

    // Khởi tạo một Spreadsheet mới
    $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Đặt tiêu đề cho các cột trong file Excel
    $sheet->setCellValue('A1', 'STT');
    $sheet->setCellValue('B1', 'Mã người dùng');
    $sheet->setCellValue('C1', 'Tên người dùng'); // Cột Tên người dùng
    $sheet->setCellValue('D1', 'Số hóa đơn');
    $sheet->setCellValue('E1', 'Tổng sản phẩm');
    $sheet->setCellValue('F1', 'Tổng số tiền');
    $sheet->setCellValue('G1', 'Ngày đặt');
    $sheet->setCellValue('H1', 'Trạng thái');

    // Dữ liệu bắt đầu từ dòng thứ 2
    $rowNumber = 2;
    $number = 1; // STT

    while ($row = mysqli_fetch_assoc($result)) {
        // Lấy dữ liệu từ kết quả truy vấn
        $user_id = $row['user_id'];
        $user_fullname = $row['user_fullname'];
        $invoice_number = $row['invoice_number'];
        $total_products = $row['total_products'];
        $total_money = $row['amount_due'];
        $order_date = $row['order_date'];
        $order_status = ucfirst($row['order_status']); // Chuyển trạng thái đơn hàng thành chữ hoa

        // Điền dữ liệu vào các cột
        $sheet->setCellValue('A' . $rowNumber, $number);
        $sheet->setCellValue('B' . $rowNumber, $user_id);
        $sheet->setCellValue('C' . $rowNumber, $user_fullname); // Thêm tên người dùng
        $sheet->setCellValue('D' . $rowNumber, $invoice_number);
        $sheet->setCellValue('E' . $rowNumber, $total_products);
        $sheet->setCellValue('F' . $rowNumber, number_format($total_money, 0, ',', '.'));
        $sheet->setCellValue('G' . $rowNumber, $order_date);
        $sheet->setCellValue('H' . $rowNumber, $order_status);

        $rowNumber++;
        $number++;
    }

    // Thiết lập kiểu cho các cột (optional)
    // Ví dụ, bạn có thể đặt chiều rộng cho cột
    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);
    $sheet->getColumnDimension('D')->setAutoSize(true);
    $sheet->getColumnDimension('E')->setAutoSize(true);
    $sheet->getColumnDimension('F')->setAutoSize(true);
    $sheet->getColumnDimension('G')->setAutoSize(true);
    $sheet->getColumnDimension('H')->setAutoSize(true);

    // Thiết lập tiêu đề của file xuất Excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="orders.xlsx"');
    header('Cache-Control: max-age=0');

    // Lưu file Excel vào bộ nhớ và xuất ra
    $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}
?>

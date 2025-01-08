<?php
// Lấy dữ liệu tổng doanh thu theo năm
$salesByYearQuery = "SELECT YEAR(date) AS year, SUM(amount) AS total_revenue FROM user_confirm GROUP BY YEAR(date) ORDER BY YEAR(date)";
$salesByYearResult = mysqli_query($con, $salesByYearQuery);
$salesByYearData = [];
while ($row = mysqli_fetch_assoc($salesByYearResult)) {
    $salesByYearData['years'][] = $row['year'];
    $salesByYearData['revenues'][] = $row['total_revenue'];
}

// Lấy dữ liệu tổng doanh thu theo tháng
$salesByMonthQuery = "SELECT YEAR(date) AS year, MONTH(date) AS month, SUM(amount) AS total_revenue FROM user_confirm GROUP BY YEAR(date), MONTH(date) ORDER BY YEAR(date), MONTH(date)";
$salesByMonthResult = mysqli_query($con, $salesByMonthQuery);
$salesByMonthData = [];
while ($row = mysqli_fetch_assoc($salesByMonthResult)) {
    $salesByMonthData['months'][] = $row['month'];
    $salesByMonthData['monthly_revenues'][] = $row['total_revenue'];
}

// Lấy dữ liệu tổng số sản phẩm bán ra theo năm
$productsByYearQuery = "SELECT YEAR(order_date) AS year, SUM(total_products) AS total_sold FROM user_orders WHERE order_status = 'complete' GROUP BY YEAR(order_date) ORDER BY YEAR(order_date)";
$productsByYearResult = mysqli_query($con, $productsByYearQuery);
$productsByYearData = [];
while ($row = mysqli_fetch_assoc($productsByYearResult)) {
    $productsByYearData['years'][] = $row['year'];
    $productsByYearData['products_sold'][] = $row['total_sold'];
}

// Lấy dữ liệu tổng số sản phẩm bán ra theo tháng
$productsByMonthQuery = "SELECT YEAR(order_date) AS year, MONTH(order_date) AS month, SUM(total_products) AS total_sold FROM user_orders WHERE order_status = 'complete' GROUP BY YEAR(order_date), MONTH(order_date) ORDER BY YEAR(order_date), MONTH(order_date)";
$productsByMonthResult = mysqli_query($con, $productsByMonthQuery);
$productsByMonthData = [];
while ($row = mysqli_fetch_assoc($productsByMonthResult)) {
    $productsByMonthData['months'][] = $row['month'];
    $productsByMonthData['monthly_products'][] = $row['total_sold'];
}

// Lấy dữ liệu sản phẩm bán được theo categories
$categoriesQuery = "SELECT c.category_title, SUM(p.number_sold) AS total_sold 
                    FROM products p
                    JOIN categories c ON p.category_id = c.category_id
                    GROUP BY c.category_id
                    ORDER BY total_sold DESC";
$categoriesResult = mysqli_query($con, $categoriesQuery);
$categoriesData = [];
while ($row = mysqli_fetch_assoc($categoriesResult)) {
    $categoriesData['category_titles'][] = $row['category_title'];
    $categoriesData['category_sales'][] = $row['total_sold'];
}

// Lấy dữ liệu sản phẩm bán được theo brands
$brandsQuery = "SELECT b.brand_title, SUM(p.number_sold) AS total_sold 
                FROM products p
                JOIN brands b ON p.brand_id = b.brand_id
                GROUP BY b.brand_id
                ORDER BY total_sold DESC";
$brandsResult = mysqli_query($con, $brandsQuery);
$brandsData = [];
while ($row = mysqli_fetch_assoc($brandsResult)) {
    $brandsData['brand_titles'][] = $row['brand_title'];
    $brandsData['brand_sales'][] = $row['total_sold'];
}
?>




<div class="chart-row">
    <!-- Biểu đồ tổng doanh thu theo năm -->
    <div class="chart-container">
        <h3>Tổng doanh thu theo năm</h3>
        <canvas id="revenueByYearChart" width="400" height="200"></canvas>
    </div>

    <!-- Biểu đồ tổng doanh thu theo tháng -->
    <div class="chart-container">
        <h3>Tổng doanh thu theo tháng</h3>
        <canvas id="revenueByMonthChart" width="400" height="200"></canvas>
    </div>

    <!-- Biểu đồ tổng số sản phẩm bán ra theo năm -->
    <div class="chart-container">
        <h3>Tổng số sản phẩm bán ra theo năm</h3>
        <canvas id="salesByYearChart" width="400" height="200"></canvas>
    </div>

    <!-- Biểu đồ tổng số sản phẩm bán ra theo tháng -->
    <div class="chart-container">
        <h3>Tổng số sản phẩm bán ra theo tháng</h3>
        <canvas id="salesByMonthChart" width="400" height="200"></canvas>
    </div>
</div>
<div class="chart-row">
    <!-- Biểu đồ tròn - Sản phẩm bán được theo categories -->
    <div class="chart-container">
        <h3>Sản phẩm bán được theo Danh mục</h3>
        <canvas id="categoryPieChart" width="700" height="700"></canvas>
    </div>

    <!-- Biểu đồ tròn - Sản phẩm bán được theo brands -->
    <div class="chart-container">
        <h3>Sản phẩm bán được theo Nhãn hàng</h3>
        <canvas id="brandPieChart" width="700" height="700"></canvas>
    </div>
</div>
<script>
// Biểu đồ tổng doanh thu theo năm
var ctx1 = document.getElementById('revenueByYearChart').getContext('2d');
var revenueByYearChart = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($salesByYearData['years']); ?>,
        datasets: [{
            label: 'Tổng doanh thu',
            data: <?php echo json_encode($salesByYearData['revenues']); ?>,
            fill: false,
            borderColor: 'rgba(75, 192, 192, 1)',
            tension: 0.1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        if (Number.isInteger(value)) {
                            return value;
                        }
                        return null;
                    }
                }
            }
        }
    }
});

// Biểu đồ tổng doanh thu theo tháng
var ctx2 = document.getElementById('revenueByMonthChart').getContext('2d');
var revenueByMonthChart = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($salesByMonthData['months']); ?>,
        datasets: [{
            label: 'Tổng doanh thu theo tháng',
            data: <?php echo json_encode($salesByMonthData['monthly_revenues']); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        if (Number.isInteger(value)) {
                            return value;
                        }
                        return null;
                    }
                }
            }
        }
    }
});

// Biểu đồ tổng số sản phẩm bán ra theo năm
var ctx3 = document.getElementById('salesByYearChart').getContext('2d');
var salesByYearChart = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($productsByYearData['years']); ?>,
        datasets: [{
            label: 'Tổng số sản phẩm bán ra',
            data: <?php echo json_encode($productsByYearData['products_sold']); ?>,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1,
                    callback: function(value) {
                        if (Number.isInteger(value)) {
                            return value;
                        }
                        return null;
                    }
                }
            }
        }
    }
});

// Biểu đồ tổng số sản phẩm bán ra theo tháng
var ctx4 = document.getElementById('salesByMonthChart').getContext('2d');
var salesByMonthChart = new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($productsByMonthData['months']); ?>,
        datasets: [{
            label: 'Số sản phẩm bán ra theo tháng',
            data: <?php echo json_encode($productsByMonthData['monthly_products']); ?>,
            backgroundColor: 'rgba(255, 159, 64, 0.2)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1,
                    callback: function(value) {
                        if (Number.isInteger(value)) {
                            return value;
                        }
                        return null;
                    }
                }
            }
        }
    }
});

// Biểu đồ tròn - Sản phẩm bán được theo categories
var ctxCategory = document.getElementById('categoryPieChart').getContext('2d');
var categoryPieChart = new Chart(ctxCategory, {
    type: 'pie',
    data: {
        labels: <?php echo json_encode($categoriesData['category_titles']); ?>,
        datasets: [{
            label: 'Sản phẩm bán được theo categories',
            data: <?php echo json_encode($categoriesData['category_sales']); ?>,
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
        }]
    }
});

// Biểu đồ tròn - Sản phẩm bán được theo brands
var ctxBrand = document.getElementById('brandPieChart').getContext('2d');
var brandPieChart = new Chart(ctxBrand, {
    type: 'pie',
    data: {
        labels: <?php echo json_encode($brandsData['brand_titles']); ?>,
        datasets: [{
            label: 'Sản phẩm bán được theo brands',
            data: <?php echo json_encode($brandsData['brand_sales']); ?>,
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
        }]
    }
});

</script>

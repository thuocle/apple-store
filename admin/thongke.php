<?php
error_reporting(E_ALL);

// Lấy dữ liệu lọc từ form
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';
$type = isset($_POST['type']) ? $_POST['type'] : '';

include('../config/db.php');
print_r($start_date);
if ($link->connect_error) {
    die("Kết nối thất bại: " . $link->connect_error);
}

// Kiểm tra giá trị của type
print_r($type);

// Xây dựng câu truy vấn dựa trên dữ liệu lọc
$query = "SELECT DATE(Ngay) AS month, COUNT(*) AS total_orders
          FROM donhang
          WHERE 1 AND DATE(Ngay) >= '$start_date' AND DATE(Ngay) <= '$end_date' "; // Điều kiện mặc định
    // if ($type == '4' || $type == '5' || $type == '6' || $type == '3') {
    // $query .= " AND TrangThai = '$type' ";
    // }
    // if ($start_date !== '') {
    //     $query .= " AND Ngay >= '$start_date'";
    // }
    // if ($end_date !== '') {
    //     $query .= " AND Ngay <= '$end_date'";
    // }
    //$query .= " GROUP BY month ORDER BY month";
    $result = $link->query($query);
    // Kiểm tra nếu truy vấn thất bại
    if ($result === false) {
        die("Lỗi truy vấn SQL: " . $link->error);
    }
    // Chuyển đổi kết quả thành mảng JSON
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

?>

<script>
// Chuyển đổi dữ liệu PHP thành JSON
var chartData = <?php echo json_encode($data); ?>;
</script>
<canvas id="filteredOrdersChart" width="400" height="200"></canvas>
<script>
// Sử dụng Chart.js để vẽ biểu đồ
document.getElementById('filterForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Ngăn chặn hành động mặc định của form (chuyển hướng)
    var ctx = document.getElementById('filteredOrdersChart').getContext('2d');

    var chart = new Chart(ctx, {
        type: 'bar', // Thay đổi type thành 'bar'
        data: {
            labels: chartData.map(data => data.month),
            datasets: [{
                label: 'Số đơn hàng',
                data: chartData.map(data => data.total_orders * 10),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>

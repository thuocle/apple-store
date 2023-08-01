<?php
 include('../config/db.php');
  // Thực hiện truy vấn lấy số lượng đơn hàng theo tháng
  $result = mysqli_query($link, "SELECT MONTH(Ngay) AS month, COUNT(*) AS total_orders FROM donhang GROUP BY MONTH(Ngay)");
  if (!$result) {
    die("Query failed: " . mysqli_error($link));
  }
  // Tạo một mảng để lưu trữ kết quả truy vấn
  $data = array();

  // Chuyển đổi kết quả truy vấn thành một mảng các giá trị tương ứng với các tháng
  while ($row = mysqli_fetch_assoc($result)) {
    $data[$row['month']] = $row['total_orders'];
  }

  // Chuyển đổi mảng thành chuỗi JSON
  $json_data = json_encode($data);
?>

<canvas id="myChart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var data = <?php echo $json_data; ?>;

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: Object.keys(data),
        datasets: [{
            label: 'Doanh thu theo tháng',
            data: Object.values(data) ,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
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
</script>


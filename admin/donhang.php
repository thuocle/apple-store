<!DOCTYPE html>
<html lang="en">
<head>
<?php include("../admin/assets/title.php");?>
    <?php
    include('../config/db.php');
        if(isset($_GET['id']))
        {
            $ip = $_GET['id'];
            $linq = "UPDATE donhang SET TrangThai = 2 WHERE MaDonHang = '$ip'";
            if(mysqli_query($link,$linq)) {
                echo "<script type='text/javascript'>alert('Sửa trạng thái thành công');</script>";
                header(('Location:../admin/donhang.php'));
                  } else {
                        echo "Error: " . $linq . "<br>" . mysqli_error($link);
                  }
        }
    ?>
</head>

<body class="sb-nav-fixed">
<?php include("../admin/assets/header.php");?>
        <div id="layoutSidenav_content">
        <main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Danh sách đơn hàng</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
      <li class="breadcrumb-item active">Danh sách đơn hàng</li>
    </ol>
    <div class="card mb-4">
      <div class="card-body"></div>
    </div>
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Danh sách đơn hàng
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Ngày lập</th>
                <th>Địa chỉ</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ghi chú</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM donhang";
              if ($result = mysqli_query($link, $sql)) {
                $count = 0;
                while ($row = mysqli_fetch_array($result)) {
                  $count++;
                  $class = ($count % 2 == 0) ? 'even' : 'odd';
                  $temp = $row['TenDangNhap'];
                  $s1ql = "SELECT * FROM users WHERE TenDangNhap = '$temp'";
                  $nam = mysqli_fetch_array(mysqli_query($link, $s1ql));
                  $name = $nam['HoTen'];
                  $dc = $nam['DiaChi'];
              ?>
                  <tr class="<?php echo $class ?>">
                    <td><?php echo $row['MaDonHang'] ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $row['Ngay'] ?></td>
                    <td><?php echo $dc ?></td>
                    <td style="color: red;"><?php echo number_format($row['TongTien'], 0, ',', '.') . ' VNĐ' ?></td>
                    <?php
                    if ($row['TrangThai'] == 2) {
                    ?>
                      <td style="color: green;"><?php echo $row['TrangThai'] == 1 ? 'Đang xử lý' : 'Thành công' ?></td>
                    <?php
                    } else {
                    ?>
                      <td><?php echo $row['TrangThai'] == 1 ? 'Đang xử lý' : 'Thành công'  ?></td>
                    <?php } ?>
                    <td><?php echo $row['GhiChu'] ?></td>
                    <td style="text-align: center;">
                      <?php
                      if ($row['TrangThai'] == 1) {
                        echo '<a href="donhang.php?id=' . $row["MaDonHang"] . ' " class="btn btn-primary" style="text-decoration: none;">Xác nhận</a>';
                      }
                      ?>
                    </td>
                  </tr>
              <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <style>
    .even {
      background-color: #f2f2f2;
    }

    .odd {
      background-color: #ffffff;
    }
  </style>
</main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Apple Store</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
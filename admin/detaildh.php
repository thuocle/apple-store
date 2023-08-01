<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../admin/assets/title.php");?>
</head>

<body class="sb-nav-fixed">
    <?php include("../admin/assets/header.php");?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Chi tiết đơn hàng</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body"></div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Thông tin chi tiết đơn hàng
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
              include('../config/db.php');
              $sql = "SELECT * FROM thongtindonhang";
              if ($result = mysqli_query($link, $sql)) {
                $count = 0;
                while ($row = mysqli_fetch_array($result)) {
                  $count++;
                  $class = ($count % 2 == 0) ? 'even' : 'odd';
                  echo '<tr class="' . $class . '">';
                  echo '<td>' . $row['MaSanPham'] . '</td>';
                  echo '<td style="color:red;">' . $row['MaDonHang'] . '</td>';
                  echo '<td>' . $row['SoLuong'] . '</td>';
                  echo '<td>' . $row['DonGia'] . '</td>';
                  echo '</tr>';
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
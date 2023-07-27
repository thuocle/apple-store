<!DOCTYPE html>
<html lang="en">
<head>
<?php include("../admin/assets/title.php");?>
    <?php
    include('../config/db.php');
        if(isset($_GET['id']))
        {
            $ip = $_GET['id'];
            $linq = "UPDATE donhang SET TrangThai = 'Thành công' WHERE MaDonHang = '$ip'";
            if(mysqli_query($link,$linq)) {
                echo "<script type='text/javascript'>alert('Sửa danh mục thành công');</script>";
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
                    <h1 class="mt-4">Tables</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách đơn hàng </li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                        <!-- <td><a style="text-decoration: none" href="adduser.php">Thêm người dùng</a></td> -->
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Danh sách đơn hàng
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Mã đơn</th>
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
                                        while ($row = mysqli_fetch_array($result)) {
                                            $temp = $row['TenDangNhap'];
                                            $s1ql = "SELECT * FROM users WHERE TenDangNhap = '$temp'";
                                            $nam = mysqli_fetch_array(mysqli_query($link,$s1ql));
                                            $name = $nam['HoTen'];
                                    ?>
                                        <tr>
                                            <td><?php echo $row['MaDonHang'] ?></td>
                                            <td><?php echo $name ?></td>
                                            <td><?php echo $row['Ngay'] ?></td>
                                            <td><?php echo $row['DiaChi'] ?></td>
                                            <td><?php echo $row['TongTien'] ?></td>
                                            <?php
                                                if($row['TrangThai'] == "Thành công") {
                                            ?>
                                            <td style="color: Green;"><?php echo $row['TrangThai'] ?></td>
                                            <?php
                                                }
                                                else {
                                            ?>
                                            <td><?php echo $row['TrangThai'] ?></td>
                                            <?php } ?>
                                            <td><?php echo $row['GhiChu'] ?></td>
                                            <td style="text-align: center;"> <?php
                                            echo '<a href="donhang.php?id='. $row["MaDonHang"] .' " class="filled-button" style="text-decoration: none; ">Xác nhận</a>';
                                            ?>
                                            <!-- <a style="text-decoration: none; " href="addsp.php?id=".<?php ?>."'">Sửa</a> -->
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
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
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
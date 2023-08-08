<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include('../admin/assets/title.php');
    include('../config/db.php');
    if (isset($_GET['id']) && isset($_POST['status'])) {
        $orderId = $_GET['id'];
        $status = $_POST['status'];

        // Lấy trạng thái hiện tại của đơn hàng từ cơ sở dữ liệu
        $currentStatusQuery = "SELECT TrangThai FROM donhang WHERE MaDonHang = '$orderId'";
        $currentStatusResult = mysqli_query($link, $currentStatusQuery);
        $currentStatusRow = mysqli_fetch_assoc($currentStatusResult);
        $currentStatus = $currentStatusRow['TrangThai'];

        // Kiểm tra và cập nhật trạng thái đơn hàng
        $validStatusChange = false;
        $newStatus = 0;

        switch ($currentStatus) {
            case '1':
                if ($status == 2) {
                    $validStatusChange = true;
                    $newStatus = 2;
                }
                break;
            case '2':
                if ($status == 3) {
                    $validStatusChange = true;
                    $newStatus = 3;
                }
                break;
            case '3':
                if ($status == 4) {
                    $validStatusChange = true;
                    $newStatus = 4;
                }
                break;
            case '4':
                if ($status == 6) {
                    $validStatusChange = true;
                    $newStatus = 6;
                }
                break;
            case '8':
                if ($status == 7 || $status == 5)  {
                    $validStatusChange = true;
                    $newStatus = ($status == 7) ? 7 : 5;
                }
                break;
            default:
                // Trạng thái không hợp lệ
                $errorMessage = "Không thể cập nhật trạng thái đơn hàng.";
        }

        // Nếu trạng thái cập nhật hợp lệ, thực hiện cập nhật trong cơ sở dữ liệu
        if ($validStatusChange) {
            $updateStatusQuery = "UPDATE donhang SET TrangThai = $newStatus WHERE MaDonHang = '$orderId'";
            if (mysqli_query($link, $updateStatusQuery)) {
                echo "<script type='text/javascript'>alert('Sửa trạng thái thành công'); window.location.href = '../admin/donhang.php';</script>";
                exit();
            } else {
                echo "Error updating status: " . mysqli_error($link);
            }
        } else {
            echo $errorMessage;
        }
    } else {
        echo "Không thấy thông tin đơn hàng hoặc trạng thái.";
    }
?>
</head>
<body class="sb-nav-fixed"> <?php include("../admin/assets/header.php");?> <div id="layoutSidenav_content">
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
                    <div class="card-header"> <i class="fas fa-table me-1"></i> Danh sách đơn hàng </div>
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
                                <tbody> <?php $sql = "SELECT * FROM donhang JOIN trangthai ON donhang.TrangThai = trangthai.trangthai_id ORDER BY Ngay DESC"; if ($result = mysqli_query($link, $sql)) { $count = 0; while ($row = mysqli_fetch_array($result)) { $count++; $class = ($count % 2 == 0) ? 'even' : 'odd'; $temp = $row['TenDangNhap']; $temp2 = $row['google_id'];
                                    // Lấy thông tin khách hàng
                                    if (!empty($temp)) {
                                        $s1ql = "SELECT * FROM users WHERE TenDangNhap = '$temp'";
                                        $nam = mysqli_fetch_array(mysqli_query($link, $s1ql));
                                        if($nam){
                                          $name = $nam['HoTen'];
                                          $dc = $nam['DiaChi'];
                                        }
                                    } elseif (!empty($temp2)) {
                                        $s2ql = "SELECT * FROM google_users WHERE google_id = '$temp2'";
                                        $nam = mysqli_fetch_array(mysqli_query($link, $s2ql));
                                        if($nam){
                                          $name = $nam['google_name'];
                                          $dc = $nam['DiaChi'];
                                        }
                                        
                                    }
                                    ?>
                                    <tr class="<?php echo $class ?>">
                                        <td><?php echo $row['MaDonHang'] ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $row['Ngay'] ?></td>
                                        <td><?php echo $dc ?></td>
                                        <td style="color: red;font-weight: 600;">
                                            <?php echo number_format($row['TongTien'], 0, ',', '.') . ' VNĐ' ?></td>
                                        <?php
                                        if ($row['ten_trangthai'] == 'Hoàn thành' ) {
                                            ?>
                                        <td style="color: green;"><?php echo  'Hoàn thành' ?></td>
                                        <?php
                                        } else if($row['ten_trangthai'] =='Chờ lấy hàng' ||$row['ten_trangthai'] =='Chờ xác nhận') {
                                            ?>
                                        <td style="color: blue;"><?php echo $row['ten_trangthai']?></td>
                                        <?php
                                        }else if($row['ten_trangthai'] =='Đang giao hàng') {
                                            ?>
                                        <td style="color: orange;"><?php echo $row['ten_trangthai']?></td>
                                        <?php
                                        }else {
                                            ?>
                                        <td style="color: red;"><?php echo $row['ten_trangthai']?></td>
                                        <?php } ?>
                                        <td><?php echo $row['GhiChu'] ?></td>
                                        <td style="text-align: center;">
                                            <form action="donhang.php?id=<?php echo $row["MaDonHang"]; ?>"
                                                method="post">
                                                <select name="status">
                                                    <option value="2">Chờ lấy hàng</option>
                                                    <option value="3">Đang giao</option>
                                                    <!-- <option value="4">Hoàn thành</option> -->
                                                    <option value="5">Đã hủy</option>
                                                    <option value="6">Trả hàng</option>
                                                    <option value="7">Từ chối hủy đơn</option>
                                                </select>
                                                <input type="submit" value="Cập nhật" class="btn btn-success">
                                            </form>
                                        </td>
                                        <td>
                                        <?php if(isset($_GET['huy']) && isset($_POST['submit'] )){
                                            $huyid = $_GET['huy'];
                                            $qr="UPDATE donhang SET TrangThai = 5 WHERE MaDonHang = $huyid"
                                            ?>
                                            <form action="" method="post">
                                            <button class="btn btn-danger" href="" name="submit">Chấp nhận hủy đơn</button>
                                            </form>
                                            </td>
                                            <?php } ?>
                                    </tr> <?php } } ?>
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
            td, th{
                min-width: 50px;
                font-size: 14px;
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
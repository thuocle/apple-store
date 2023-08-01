<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="./assets/fonts/apple.ico" type="image/x-icon">
    <title>Apple Store - Quản lý đơn hàng</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <style>
    /* Use the same font family as the shopping cart page */
    body {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
    }
    section{
        padding: 50px;
    }
    section h1{
        margin-bottom: 30px;
    }
    </style>

</head>
<?php include("header.php"); //session_start()?>

<body>

    <!-- Page Content -->
    <div class="page-heading header-text">
        <div class="text">
            <h1>Thông tin giỏ hàng</h1>
        </div>
    </div>

    <section class="vh-100" style=" height: 500px; margin-top: 100;">
        <!-- <div class="container h-50"> -->
            <!-- <div class="row d-flex justify-content-center align-items-center h-30"> -->
                    <h1>Danh sách đơn hàng của bạn</h1>
                    <?php
include('./config/db.php');
if (isset($_GET['id'])) {
    $username = $_GET['id'];
    $sql = "SELECT donhang.*, trangthai.*
    FROM donhang
    JOIN trangthai ON donhang.TrangThai = trangthai.trangthai_id
    WHERE TenDangNhap='$username'
    ORDER BY Ngay DESC";
    $result = mysqli_query($link, $sql);

    if (!$result) {
        die("Lỗi truy vấn: " . mysqli_error($link));
    }

    mysqli_close($link);
}
?>
                    <div class="table-responsive table-bordered">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['MaDonHang'] ?></td>
                                    <td><?php echo $row['Ngay']; ?></td>
                                    <td><?php echo number_format($row['TongTien'], 0, ',', '.'); ?></td>
                                    <td><?php echo $row['ten_trangthai']; ?></td>
                                    <td><a href="./ServicesProcess.php?id=<?php echo $row['MaDonHang']?>">Xem chi tiết</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <!-- </div> -->
            <!-- </div> -->
    </section>
</body>
<?php include("footer.php");?>

</html>
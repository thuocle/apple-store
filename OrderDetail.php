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
    <title>Apple Store - Chi Tiết Hóa Đơn</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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

    section {
        padding: 50px;
    }

    section h1 {
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white !important;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border: 1px solid black;
    }

    th {
        font-weight: bold;
        background-color: #452c63;
    }

    img {
        max-width: 100px;
        max-height: 100px;
    }
    table.rounded {
        border-radius: 8px !important;
        overflow: hidden;
    }
    table.rounded th,
    table.rounded td {
        border: 1px solid white;
        padding: 8px;
    }
    </style>
</head>
<?php include("header.php"); //session_start()?>

<body>
    <!-- Page Content -->
    <div class="page-heading header-text">
        <div class="text">
            <h1>Thông tin đơn hàng</h1>
        </div>
    </div>
    <section class="vh-100" style="min-height: 500px; margin-top: 100;">
        <div class="container">
            <h1>Chi tiết đơn hàng của bạn</h1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-success rounded">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th colspan="2">Mã đơn hàng</th>
                            <th colspan="2">Ngày đặt hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
            include('./config/db.php');
            if(isset($_GET['id'])){
                $madh = $_GET['id'];
                $sql = "SELECT donhang.MaDonHang, donhang.Ngay, donhang.TongTien, donhang.GhiChu,donhang.TrangThai, thongtindonhang.SoLuong, sanpham.TenSanPham, sanpham.HinhAnh, sanpham.GiaSanPham
                        FROM donhang
                        INNER JOIN thongtindonhang ON donhang.MaDonHang = thongtindonhang.MaDonHang
                        INNER JOIN sanpham ON thongtindonhang.MaSanPham = sanpham.MaSanPham
                        WHERE donhang.MaDonHang='$madh'";
                $result = mysqli_query($link, $sql);
                if (!$result) {
                    die("Lỗi truy vấn: " . mysqli_error($link));
                }
                $row = mysqli_fetch_assoc($result);
            }
            mysqli_close($link);
        ?>
                        <tr>
                            <td colspan="2"><?php echo $row['MaDonHang'] ?></td>
                            <td colspan="2"><?php echo $row['Ngay'] ?></td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr class="bg-primary text-white">
                            <th>Hình ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php mysqli_data_seek($result, 0); // Đưa con trỏ về đầu dữ liệu ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td style="text-align: center;"><img src="img/<?php echo $row['HinhAnh'] ?>" height="100"
                                    width="100"></td>
                            <td><?php echo $row['TenSanPham'] ?>
                            <td><?php echo $row['SoLuong'] ?>
                            <td><?php echo number_format($row['GiaSanPham'], 0, ',', '.') ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <thead>
                        <tr class="bg-primary text-white">
                            <th colspan="2">Tổng tiền</th>
                            <th colspan="2">Hình thức thanh toán</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php mysqli_data_seek($result, 0); 
            $row = mysqli_fetch_assoc($result);
            // Đưa con trỏ về đầu dữ liệu ?>
                        <tr>
                            <td colspan="2"><b><?php echo number_format($row['TongTien'], 0, ',', '.') ?></b></td>
                            <?php mysqli_data_seek($result, 0); // Đưa con trỏ về đầu dữ liệu ?>
                            <td colspan="2"><?php echo $row['GhiChu'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php mysqli_data_seek($result, 0); 
            $row = mysqli_fetch_assoc($result);
            if($row['TrangThai'] == 2) {
            // Đưa con trỏ về đầu dữ liệu ?>
            <button class="btn btn-success d-print-none font-weight-bold" onclick="window.open('PrintInvoice.php?id=<?php echo $row['MaDonHang']?>')">In hóa đơn</button>
            <?php }else{ ?>
                <p style="color:red">Đơn hàng của bạn đang được xử lý</p>
            <?php }?>
        </div>
    </section>
    <?php include("footer.php"); ?>
    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
</body>

</html>
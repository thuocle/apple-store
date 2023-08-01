<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./assets/fonts/apple.ico" type="image/x-icon">
    <title>Apple Store - Chi Tiết đơn hàng</title>
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

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid black;
        }

        th {
            font-weight: bold;
            background-color: black;
        }

        img {
            max-width: 100px;
            max-height: 100px;
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
    <section class="vh-100" style="min-height: 500px; margin-top: 100;">
        <div class="container">
            <h1>Chi tiết đơn hàng của bạn</h1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-success">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include('./config/db.php');
                            if(isset($_GET['id'])){
                                $madh = $_GET['id'];
                                $sql = "SELECT donhang.MaDonHang, donhang.Ngay, donhang.TongTien, donhang.GhiChu, thongtindonhang.SoLuong, sanpham.TenSanPham, sanpham.HinhAnh, sanpham.GiaSanPham
                                        FROM donhang
                                        INNER JOIN thongtindonhang ON donhang.MaDonHang = thongtindonhang.MaDonHang
                                        INNER JOIN sanpham ON thongtindonhang.MaSanPham = sanpham.MaSanPham
                                        WHERE donhang.MaDonHang='$madh'";
                                $result = mysqli_query($link, $sql);
                                if (!$result) {
                                    die("Lỗi truy vấn: " . mysqli_error($link));
                                }
                            }
                            mysqli_close($link);
                        ?>
                        <tr>
                                <td><?php echo mysqli_fetch_assoc($result)['MaDonHang'] ?></td>
                                <td><?php echo mysqli_fetch_assoc($result)['Ngay'] ?></td>
                            </tr>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            
                        <?php } ?>
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
                                <td style="text-align: center;"><img  src="img/<?php echo $row['HinhAnh'] ?>" height="100" width="100"></td>
                                <td><?php echo $row['TenSanPham'] ?>
                                <td><?php echo $row['SoLuong'] ?>
                                <td><?php echo $row['GiaSanPham'] ?>
                    </tbody>
                    <?php } ?>
                    <thead>
                        <tr class="bg-primary text-white">
                            <th>Tổng tiền</th>
                            <th>Hình thức thanh toán</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php mysqli_data_seek($result, 0); // Đưa con trỏ về đầu dữ liệu ?>
                            <tr>
                                <td><b><?php echo number_format(mysqli_fetch_assoc($result)['TongTien'], 0, ',', '.') ?></b></td>
                                <td><?php echo mysqli_fetch_assoc($result)['GhiChu'] ?></td>
                            </tr>
                    </tbody>
                </table>
            </div>
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
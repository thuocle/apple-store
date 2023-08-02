<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Apple Store - Chi Tiết Hóa Đơn">
    <meta name="author" content="Your Name">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="./assets/img/apple.ico" type="image/x-icon">
    <title>Apple Store - Chi Tiết Hóa Đơn</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        color: white;
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

<body>
    <?php include("header.php"); ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 py-5">
                <h1 class="mb-4">Thông tin đơn hàng</h1>
                <div class="table-responsive">
                    <table class="table table-bordered table-success rounded">
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
                                    $sql = "SELECT donhang.MaDonHang, donhang.Ngay, donhang.TongTien, donhang.GhiChu, thongtindonhang.SoLuong, sanpham.TenSanPham, sanpham.HinhAnh, sanpham.GiaSanPham
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
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = "SELECT donhang.MaDonHang, donhang.Ngay, donhang.TongTien, donhang.GhiChu, thongtindonhang.SoLuong, sanpham.TenSanPham, sanpham.HinhAnh, sanpham.GiaSanPham
                                            FROM donhang
                                            INNER JOIN thongtindonhang ON donhang.MaDonHang = thongtindonhang.MaDonHang
                                            INNER JOIN sanpham ON thongtindonhang.MaSanPham = sanpham.MaSanPham
                                            WHERE donhang.MaDonHang='$madh'";
                                $result = mysqli_query($link, $sql);
                                if (!$result) {
                                    die("Lỗi truy vấn: " . mysqli_error($link));
                                }
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><img src="<?php echo $row['HinhAnh'] ?>" alt="<?php echo $row['TenSanPham'] ?>"></td>
                                <td><?php echo $row['TenSanPham'] ?></td>
                                <td><?php echo $row['SoLuong'] ?></td>
                                <td><?php echo number_format($row['GiaSanPham'], 0, ',', '.') ?> đ</td>
                            </tr>
                            <?php 
                                }
                            ?>
                            <tr>
                                <td colspan="3" class="text-end">Tổng tiền:</td>
                                <td><?php echo number_format($row['TongTien'], 0, ',', '.') ?> đ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary" onclick="window.print()">In hóa đơn</button>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
</body>

</html>
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
    <script src="./assets/js/app.js" defer></script>
    <title>Chi tiết sản phẩm</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .product-colors {
        margin-top: 20px;
        margin-left: 140px;
        max-width: 100px;
    }

    .color-options {
        display: flex;
        align-items: center;
    }

    .color-options label {
        margin-right: 10px;
    }

    .color-options input[type="radio"] {
        display: none;
    }

    .color {
        display: inline-block;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        cursor: pointer;
    }

    .red {
        background-color: red;
    }

    .blue {
        background-color: black;
    }

    .green {
        background-color: purple;
    }

    .color:hover {
        transform: scale(1.2);
    }

    .services {
        margin-top: 80px !important;
        margin-bottom: 80px;
    }

    /* categotybar */


    img {
        width: 100%;
        display: block;
    }

    .img-display {
        overflow: hidden;
    }

    .img-showcase {
        display: flex;
        width: 100%;
        transition: all 0.5s ease;
    }

    .img-showcase img {
        min-width: 100%;
    }

    .img-select {
        display: flex;
    }

    .img-item {
        margin: 0.3rem;
    }

    .img-item:nth-child(1),
    .img-item:nth-child(2),
    .img-item:nth-child(3) {
        margin-right: 0;
    }

    .img-item:hover {
        opacity: 0.8;
    }

    .product-actions {
        display: flex;
        align-items: end;
        justify-content: end;
    }
    </style>
</head>

<body>
    <?php include("header.php"); 
    session_reset();
  include('./config/db.php');
  $masp = $_GET['masp'];
  $sql = "SELECT * FROM sanpham WHERE MaSanPham = '$masp'";
  $result = $link->query($sql);
  // $row1 = $result->fetch_assoc();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  ?>
    <!-- Page Content -->
    <form action="" method="post">
        <div class="page-heading header-text">
            <div class="text">
                <h1><?php
    $giaBan = $row["GiaSanPham"];
    $giaGoc = $giaBan * 1.5;
    echo '<del>'.number_format($giaGoc).' <sup>VND</sup></del> &nbsp;';
    echo number_format($giaBan).' <sup>VND</sup>';
  ?>
                </h1>
                <h5>
                    Khuyến mãi lớn nhất trong năm
                </h5>
            </div>
        </div>
        <?php include('./CategoryBar.php') ?>
        <div class="services">
            <div class="container">
                <div class="row" style="gap: 100px;">
                    <div class="col-md-5">
                        <div class="product-image">
                            <!-- <img src="img/<?php echo $row['HinhAnh'] ?>" alt="" class="img-fluid wc-image"> -->
                            <div class="product-imgs">
                                <div class="img-display">
                                    <div class="img-showcase">
                                        <img src="img/<?php echo $row['HinhAnh'] ?>" alt="shoe image">
                                        <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_2.jpg"
                                            alt="shoe image">
                                        <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_3.jpg"
                                            alt="shoe image">
                                        <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_4.jpg"
                                            alt="shoe image">
                                    </div>
                                </div>
                                <div class="img-select">
                                    <div class="img-item">
                                        <a href="#" data-id="1">
                                            <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_1.jpg"
                                                alt="shoe image">
                                        </a>
                                    </div>
                                    <div class="img-item">
                                        <a href="#" data-id="2">
                                            <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_2.jpg"
                                                alt="shoe image">
                                        </a>
                                    </div>
                                    <div class="img-item">
                                        <a href="#" data-id="3">
                                            <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_3.jpg"
                                                alt="shoe image">
                                        </a>
                                    </div>
                                    <div class="img-item">
                                        <a href="#" data-id="4">
                                            <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_4.jpg"
                                                alt="shoe image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="product-info">
                            <h2 class="product-title"><?php echo $row['TenSanPham'] ?></h2>
                            <p class="product-price text-success">
                                <?php
    $giaBan = $row["GiaSanPham"];
    $giaGoc = $giaBan * 1.5;
    echo '<del>'.number_format($giaGoc).' <sup>VND</sup></del> &nbsp;';
    echo number_format($giaBan).' <sup>VND</sup>';
  ?>
                            </p>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Kích thước</td>
                                        <td><?php echo $row['KichThuoc'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Trọng lượng</td>
                                        <td><?php echo $row['TrongLuong'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Camera</td>
                                        <td><?php echo $row['Camera'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ram</td>
                                        <td><?php echo $row['Ram'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sim</td>
                                        <td><?php echo $row['Sim'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pin</td>
                                        <td><?php echo $row['Pin'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bộ nhớ</td>
                                        <td><?php echo $row['BoNho'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Hệ điều hành</td>
                                        <td><?php echo $row['HeDieuHanh'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bảo hành</td>
                                        <td><?php echo $row['BaoHanh'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phụ kiện</td>
                                        <td><?php echo $row['PhuKien'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="product-actions">
                                <a href="Addgiohang.php?masp=<?php echo $row["MaSanPham"] ?>"
                                    class="btn btn-success">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>

    <br>
    </div>
    <?php
          }
        } else {
          echo "0 results";
        }
        ?>
    </div>
    </div>
    <script src="./assets/js/ProductSlider.js"></script>
    <!-- Footer Starts Here -->
    <?php include("footer.php"); ?>
</body>

</html>
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
    <title>Apple Store</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <style>

    </style>
</head>

<body>
    <?php include("header.php"); 
    ?>

    <!-- Page Content -->
    <div class="page-heading header-text">
        <div class="text">
            <h1>Thông tin giỏ hàng</h1>
        </div>
    </div>

    <section class="vh-100" style=" height: 700px; margin-top: 100;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card mb-4">
                        <?php 
$tongtien = 0;
if(isset($_SESSION['cart']))
{
    ?>
                        <table style="min-height: 200px;" id="cart-table" class=" table-striped table-bordered">
                            <tr>
                                <th style="width: 200; text-align: center;">Hình ảnh</th>
                                <th style="width: 200; text-align: center;">Tên sản phẩm</th>
                                <th style="width: 200; text-align: center;">Số lượng</th>
                                <th style="width: 200; text-align: center;">Đơn giá</th>
                                <th style="width: 200; text-align: center;">Thành tiền</th>
                            </tr>
                            <?php
        foreach($_SESSION['cart'] as $item)
        {
            $tien = $item['gia']*$item['sl'];
            $tongtien += $tien;
            ?>
                            <tr>
                                <td style="width: 200; text-align: center;">
                                    <img src="img/<?php echo $item['img'] ?>" height="150" width="150">
                                </td>
                                <td style="width: 200;text-align: center;"><?php echo $item['tensp'] ?></td>
                                <!-- <td style="width: 200; text-align: center;">//<?php //echo $item['sl'] ?></td> -->
                                <td style="width: 200; text-align: center;">
                                    <a class="btn btn-sm btn-danger decrease-quantity" type="submit"
                                        href="./ProcessCart.php?tru=<?php echo $item['masp']?>"
                                        data-masp="<?php echo $item['masp'] ?>">-</a>
                                    <span class="quantity"
                                        data-masp="<?php echo $item['masp'] ?>"><?php echo $item['sl'] ?></span>
                                    <a class="btn btn-sm btn-success increase-quantity" type="submit"
                                        href="./ProcessCart.php?cong=<?php echo $item['masp']?>"
                                        data-masp="<?php echo $item['masp'] ?>">+</a>
                                    <a href="ProcessCart.php?idxoa=<?php echo $item['masp']?>"
                                        class="btn btn-sm btn-outline-danger remove-product" type="button">Xóa</a>
                                </td>
                                <td style="width: 200; text-align: center;">
                                    <span class="price"
                                        data-masp="<?php echo $item['masp'] ?>"><b><?php echo number_format($item['gia'], 0, ',', '.') ?></b></span>
                                </td>
                                <td style="width: 200; text-align: center;">
                                    <span class="total-price"
                                        data-masp="<?php echo $item['masp'] ?>"><b><?php echo number_format($tien, 0, ',', '.') ?></b></span>
                                </td>
                                <!-- <td style="width: 200; text-align: center;"><?php //echo $item['gia'] ?></td>
                <td style="width: 200; text-align: center;"> -->
                            </tr>
                            <?php
        }
        ?>
                            <tr>
                                <td colspan="4"><b style="padding-left: 60px;margin-top: 30px;">Tổng tiền</b></td>
                                <td style="width: 200; text-align: center;"><span
                                        class="total-price-all"><b><?php echo number_format($tongtien, 0, ',', '.') ?>
                                            đ</b></span></td>
                            </tr>
                        </table>
                        <?php
}
else
{
    echo "Giỏ hàng trống";
}
?>
                        <div class="d-flex justify-content-end">
                            <a href="ProcessCart.php?xoatatca=1" type="button" class="btn btn-light btn-lg me-2">Xóa tất
                                cả giỏ hàng</a>
                            <a href="products.php" type="button" class="btn btn-light btn-lg me-2">Tiếp tục mua hàng</a>
                            <form action="vnpay.php" method="POST">
                                <input type="submit" class="btn btn-primary btn-lg" name="redirect"
                                    value="Thanh toán" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<?php include("footer.php");?>

</html>
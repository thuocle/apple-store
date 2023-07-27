<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Mobile Store Website Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
  </head>

  <body>
  <?php include("header.php");?>

    <!-- Page Content -->
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Thông tin giỏ hàng</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="vh-100" style=" height: 700px; margin-top: 100;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
      <div class="card mb-4">
      <?php session_start();
      $tongtien = 0;
          if(isset($_SESSION['cart']))
          {
            ?>
      <table border="1" style="min-height: 500px;">
              <tr>
                <th style="width: 200; text-align: center;">Hình ảnh</th>
                <th style="width: 200; text-align: center;">Tên sản phẩm</th>
                <th style="width: 200; text-align: center;">Số lượng</th>
                <th style="width: 200; text-align: center;">Đơn giá</th>
                <th style="width: 200; text-align: center;">Thành tiền</th>
              </tr>
            <?php
            $tongtien = 0;
            foreach($_SESSION['cart'] as $item)
            {
              $tien = $item['gia']*$item['sl'];
              $tongtien += $tien;
      ?>
            <tr>
            <td style="width: 200;">
            <img style="text-align: center;" src="img/<?php echo $item['img'] ?>"height="100" width="100" >
            </td>
            <td style="width: 200;"><?php echo $item['tensp'] ?></td>
            <td style="width: 200; text-align: center;"><?php echo $item['sl'] ?></td>
            <td style="width: 200; text-align: center;"><?php echo $item['gia'] ?></td>
            <td style="width: 200; text-align: center;"><?php echo $tien ?></td>
            </tr>
            <?php
            }
            ?>
          <tr>
          <td colspan="4"><b style="margin-right: 100px;">Tổng tiền</b></td>
          <td style="width: 200; text-align: center;"><?php echo $tongtien ?></td>
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
         <a href="RemoveCard.php" type="button" class="btn btn-light btn-lg me-2">Xóa tất cả giỏ hàng</a>
          <a href="products.php" type="button" class="btn btn-light btn-lg me-2">Tiếp tục mua hàng</a>
          <form action="vnpay.php" method="POST">
          <input type="submit" class="btn btn-primary btn-lg" name="redirect" value="Thanh toán" />
          </form>
         </div>
    <?php include("footer.php");?>

  </body>
</html>
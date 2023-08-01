<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="./assets/fonts/apple.ico" type="image/x-icon">
    <title>Apple Store</title>
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
      <div class="text">
            <h1>Thông tin giỏ hàng</h1>
      </div>
    </div>

    <section class="vh-100" style=" height: 700px; margin-top: 100;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
      <div class="card mb-4">
      <?php ;
      $tongtien = 0;
          if(isset($_SESSION['cart']))
          {
            ?>
      <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Sản phẩm</th>
      <th scope="col">Giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Tổng cộng</th>
      <th scope="col">Xóa</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($_SESSION['cart'] as $item): ?>
      <tr>
        <td><?php echo $item['gia'] ?></td>
        <td><?php echo $item['sl'] ?></td>
        <td>
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-default btn-sm" type="button" onclick="decreaseQuantity(<?php echo $item['id'] ?>)">-</button>
            </span>
            <input type="number" class="form-control form-control-sm" id="quantity_<?php echo $item['tensp'] ?>" name="quantity_<?php echo $item['id'] ?>" value="<?php echo $item['sl'] ?>" min="1" onchange="updateCart(<?php echo $item['tensp'] ?>)">
            <span class="input-group-btn">
              <button class="btn btn-default btn-sm" type="button" onclick="increaseQuantity(<?php echo $item['tensp'] ?>)">+</button>
            </span>
          </div>
        </td>
        <td><?php echo $item['subtotal'] ?></td>
        <td>
          <button type="button" class="btn btn-danger btn-sm" onclick="removeItem(<?php echo $item['id'] ?>)">Xóa</button>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
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
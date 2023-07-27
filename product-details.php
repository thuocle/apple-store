<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Chi tiết sản phẩm</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>
  <?php include("header.php"); 
  include('./config/db.php');
  $masp = $_GET['masp'];
  $sql = "SELECT * FROM sanpham WHERE MaSanPham = '$masp'";
  $result = $link->query($sql);
  // $row1 = $result->fetch_assoc();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  ?>
  <!-- Page Content -->
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1><?php echo '<del>'.$row["GiaSanPham"]*1.5.'<sup>VND</sup></del> &nbsp;'.$row["GiaSanPham"].'<sup>VND</sup>'; ?></h1>
          <span>
            Khuyến mãi lớn nhất trong năm
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="services">
    <div class="container">
      <div class="row">
            <div class="col-md-7">
              <div>
                <img src="img/<?php echo $row['HinhAnh'] ?>" alt="" class="img-fluid wc-image" height="800" width="500">
              </div>
            </div>

            <div class="col-md-5">
              <div class="sidebar-item recent-posts">
                <div class="sidebar-heading">
                  <h4>Thông tin chi tiết sản phẩm</h4>
                </div>

                <div class="content">
          </br>
                  <table border="1">
                    <tr>
                      <td style="width: 200px; text-align: center;">Tên sản phẩm </td>
                      <td style="width: 200px; text-align: center;"><?php echo $row['TenSanPham'] ?></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; text-align: center;">Kích thước </td>
                      <td style="width: 200px; text-align: center;"><?php echo $row['KichThuoc'] ?></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; text-align: center;">Trọng lượng</td>
                      <td style="width: 200px; text-align: center;"><?php echo $row['TrongLuong'] ?></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; text-align: center;">Camera </td>
                      <td style="width: 200px; text-align: center;"><?php echo $row['Camera'] ?></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; text-align: center;">Ram </td>
                      <td style="width: 200px; text-align: center;"><?php echo $row['Ram'] ?></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; text-align: center;">Sim </td>
                      <td style="width: 200px; text-align: center;"><?php echo $row['Sim'] ?></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; text-align: center;">Pin</td>
                      <td style="width: 200px; text-align: center;"><?php echo $row['Pin'] ?></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; text-align: center;">Bộ nhớ </td>
                      <td style="width: 200px; text-align: center;"><?php echo $row['BoNho'] ?></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; text-align: center;">Hệ điều hành </td>
                      <td style="width: 200px; text-align: center;"><?php echo $row['HeDieuHanh'] ?></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; text-align: center;">Bảo hành </td>
                      <td style="width: 200px; text-align: center;"><?php echo $row['BaoHanh'] ?></td>
                    </tr>
                    <tr>
                      <td style="width: 200px; text-align: center;">Phụ kiện </td>
                      <td style="width: 200px; text-align: center;"><?php echo $row['PhuKien'] ?></td>
                    </tr>
                  </table>
                </div>
              </div>
              <form action="" method="post">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <?php
                    echo '<a href="Addgiohang.php?masp='. $row["MaSanPham"] .' " class="filled-button">Mua hàng</a>';
                    ?>
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

    <!-- Footer Starts Here -->
    <?php include("footer.php"); ?>
</body>

</html>
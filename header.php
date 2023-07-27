<header class="">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <h2>Apple Store</h2>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Trang chủ
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" data-bs-toggle="dropdown">Danh mục</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="products.php">Tất cả sản phẩm</a>
              <?php
                include('./config/db.php');
                $sql = "SELECT * FROM loaisp";
                $result = $link->query($sql);
              
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
              ?>
              <a class="dropdown-item" href="category.php?idnsx=<?php echo $row['MaLoaiSP'] ?>"><?php echo $row['TenLoaiSP'] ?></a>
              <?php
                }
              }
              ?>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./checkout.php">Giỏ hàng</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./about.php">Về chúng tôi</a>
          <li class="nav-item">
            <a class="nav-link" href="./contact.php">Liên hệ</a>
          </li>
          <?php session_start();
          if (isset($_SESSION['user'])) {
          ?>
            <li class="nav-item dropdown">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" data-bs-toggle="dropdown">Xin chào<?php echo " ".$_SESSION['user']?></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../mobile-shop/admin/logout.php">Đăng xuất</a>
            </div>
          </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="../mobile-shop/admin/logout.php">Đăng xuất</a>
            </li> -->
          <?php
          } else {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="./admin/login.php">Login</a>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
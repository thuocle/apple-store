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

    <title>Tất cả sản phẩm</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    h1 {
        color: #fff !important;
    }

    * {
        box-sizing: border-box;
    }

    form.example {
        border-radius: 25px;
        max-width: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #2e2046;
        margin-left: 70%;
        margin-top: 50px;
    }

    form.example::after {
        content: "";
        clear: both;
        display: table;
    }

    .services {
        margin-top: 50px;
    }

    .service-item:hover {
        transform: translateY(-10px);
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Poppins', sans-serif;
        color: #333;
    }

    .search-box {
        width: fit-content;
        height: fit-content;
        position: relative;
    }

    .input-search {
        height: 50px;
        width: 50px;
        border-style: none;
        padding: 10px;
        font-size: 18px;
        letter-spacing: 2px;
        outline: none;
        border: none;
        border-radius: 25px;
        transition: all .5s ease-in-out;
        background-color: #e3c206;
        padding-right: 40px;
        color: #fff;
    }

    .input-search::placeholder {
        color: #fff;
        font-size: 18px;
        letter-spacing: 2px;
        font-weight: 100;
    }

    .btn-search {
        width: 50px;
        height: 50px;
        border-style: none;
        font-size: 20px;
        font-weight: bold;
        outline: none;
        border: none;
        cursor: pointer;
        border-radius: 50%;
        position: absolute;
        right: 0px;
        color: #ffffff;
        background-color: transparent;
        pointer-events: painted;
    }

    .btn-search:focus~.input-search {
        width: 300px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom: 1px solid rgba(255, 255, 255, .5);
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }

    .input-search:focus {
        width: 300px;
        border-radius: 0px;
        background-color: transparent;
        outline: none;
        /* border-bottom:1px solid rgba(255,255,255,.5); */
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }
    </style>

</head>

<body>
    <!-- style="position: absolute; margin-top: 70px;margin-left: 600px" -->
    <?php include("header.php");?>

    <!-- Page Content -->
    <div class="page-heading header-text">
        <div class="text">
            <h1>Trang sản phẩm</h1>
            <span>Sức mạnh vượt trội - Đi đầu xu hướng công nghệ</span>
        </div>
    </div>

    <?php include('./CategoryBar.php') ?>
    <form class="example" action="" method="POST">
        <div class="search-box">
            <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
            <input type="text" class="input-search" placeholder="Type to Search..." name="search2">
        </div>
    </form>
    <div class="services">
        <div class="container"></div>
        <div class="row" style="margin: 0;">
            <?php 
      function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    if(isset($_SESSION['mess']))
    {
      alert($_SESSION['mess']);
      unset($_SESSION['mess']);
    }
    ?>
            <?php
include('./config/db.php');

// Số lượng sản phẩm trên mỗi trang
$per_page = 3;

// Tính toán vị trí bắt đầu của sản phẩm trong trang hiện tại
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $per_page;

// Xây dựng truy vấn SQL để lấy sản phẩm cho trang hiện tại
$sql = "SELECT * FROM sanpham ORDER BY MaSanPham ASC LIMIT $start, $per_page";

// Nếu có tham số tìm kiếm, thêm điều kiện vào truy vấn SQL
if (isset($_POST['search2'])) {
  $ten = $_POST['search2'];
  $sql = "SELECT * FROM sanpham WHERE TenSanPham LIKE '%$ten%' ORDER BY MaSanPham ASC LIMIT $start, $per_page";
} elseif (isset($_GET['ten'])) {
  $ten = $_GET['ten'];
  $sql = "SELECT * FROM sanpham WHERE TenSanPham LIKE '%$ten%' ORDER BY MaSanPham ASC LIMIT $start, $per_page";
}

// Thực thi truy vấn SQL và hiển thị sản phẩm trên trang web
$result = $link->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<div class="col-md-4">';
    echo '<div class="service-item">';
    echo '<img src="img/'.$row["HinhAnh"].'" alt=""  >';
    echo '<div class="down-content">';
    echo '<h4>'. $row["TenSanPham"] .'</h4>';
    echo '<div style="margin-bottom:10px;">';
    echo '<span>';
    echo '<del>'.$row["GiaSanPham"]*1.5.'<sup>VND</sup></del> &nbsp;'.$row["GiaSanPham"].'<sup>VND</sup>';
    echo ' </span>';
    echo '</div>';
    echo '<p>'. $row["Ram"] .' </p>';
    echo '<p>'. $row["BoNho"] .' </p>';
    echo '<a href="product-details.php?masp='. $row["MaSanPham"] .' " class="filled-button">Xem thêm</a>';
    echo '</div>';
    echo '</div>';
    echo '<br>';
    echo '</div>';
  }
} else {
  echo "<h3>Không có sản phẩm nào!</h3>";
}

// Hiển thị phân trang
$sql_total = "SELECT COUNT(*) AS total FROM sanpham";
$result_total = mysqli_query($link, $sql_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_pages = ceil($row_total['total'] / $per_page);

echo '<nav>';
echo '<ul class="pagination pagination-lg justify-content-center">';
if ($page > 1) {
  echo '<li class="page-item"><a class="page-link" href="?page='.($page-1).'">«</a></li>';
}
for ($i = 1; $i <= $total_pages; $i++) {
  if ($i == $page) {
    echo '<li class="page-item active"><a class="page-link" href="#">'.$i.'</a></li>';
  } else {
    echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
  }
}
if ($page < $total_pages) {
  echo '<li class="page-item"><a class="page-link" href="?page='.($page+1).'">»</a></li>';
}
echo '</ul>';
echo '</nav>';
?>
        </div>

        <br>
        <br>

        <nav>
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php
      $sqltrang = mysqli_query($link,"SELECT * FROM sanpham");
      $rowcount = mysqli_num_rows($sqltrang);
      $page = ceil($rowcount/3);
      for($i=1;$i<=$page;$i++) {
    ?>
                <li class="page-item"><a class="page-link"
                        href="products.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php }
    ?>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">»</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>

        <br>
        <br>
        <br>
        <br>
    </div>
    </div>

    <!-- Footer Starts Here -->
    <?php include("footer.php");?>
</body>

</html>
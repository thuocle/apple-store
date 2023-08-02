<?php session_start();
  // if(isset($_SESSION['user'])) {
    if(isset($_SESSION['cart']))
    {
      if(($_GET['vnp_ResponseCode']) == "00")
      {
    include('./config/db.php');
    $tongtien = 0;
    $madh = $_GET['vnp_TxnRef'];
    foreach($_SESSION['cart'] as $item)
    {
        $masp = $item['masp'];
        $sl = $item['sl'];
        $dongia = $item['gia'];
        $tongtien += $sl * $dongia;
        $sql = "INSERT INTO thongtindonhang VALUES('$masp','$madh',$sl,$dongia)";
        if (mysqli_query($link, $sql)) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
          }
    }
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date("Y-m-d H:i:s", time());
    $trangthai = 1;
    $ghichu = "Thanh toán ATM";
    $id = $_SESSION['user'];
    $tn = "SELECT * FROM users WHERE TenDangNhap = '$id'";
    $result = $link->query($sql);
              if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $diachi = $row['DiaChi'];
              }
            }
            
    $quey = "INSERT INTO donhang VALUES ('$madh','$time','$diachi','$tongtien','$trangthai','$ghichu','$id')";
    if (mysqli_query($link, $quey)) {
      echo "New record created successfully";
          mysqli_close($link);
          unset($_SESSION['cart']);
          $_SESSION['mess'] = "Đơn hàng của bạn đang được xử lý";
          header(('Location:../apple-store/products.php'));
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
  }
  // else
  //     header(('Location:../apple-store/checkout.php'));
  }
  // else{
  //   $_SESSION['mess'] = "Giỏ hàng trống vui lòng thêm sản phẩm";
  //   header(('Location:../apple-store/products.php'));
  // }
  // }
  // else
  // {
  //   $_SESSION['mess'] = "Vui lòng đăng nhập để tiếp tục";
  //   header(('Location:../apple-store/admin/login.php'));
  // }

<?php
session_start();

if (isset($_SESSION['cart'])) {
  if (isset($_GET['vnp_ResponseCode']) && $_GET['vnp_ResponseCode'] == "00") {
    include('./config/db.php');
    $tongtien = $_GET['vnp_Amount'] / 100;
    $madh = $_GET['vnp_TxnRef'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date("Y-m-d H:i:s", time());
    $diachi = "";
    $trangthai = 1;
    $ghichu = "Thanh toán ATM";
    $ten = $_SESSION['user'];
    $sql = "SELECT * FROM google_users WHERE google_name = '$ten'";
    $result = $link->query($sql);

    if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $ggid = $row['google_id'];
      // Thực hiện các xử lý liên quan đến tài khoản Google
      $quey = "INSERT INTO donhang (MaDonHang, Ngay, DiaChi, TongTien, TrangThai, GhiChu, google_id) VALUES ('$madh','$time','$diachi','$tongtien','$trangthai','$ghichu','$ggid')";
      if (mysqli_query($link, $quey)) {
        echo "New record created successfully";
        foreach ($_SESSION['cart'] as $item) {
          $masp = $item['masp'];
          $sl = $item['sl'];
          $dongia = $item['gia'];
          $sql = "INSERT INTO thongtindonhang VALUES('$masp','$madh',$sl,$dongia)";
          if (mysqli_query($link, $sql)) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
          }
        }
        unset($_SESSION['cart']);
        header("Location:../apple-store/order-management.php?id=$ggid");
        mysqli_close($link);
      } else {
        echo "Error: " . $quey . "<br>" . mysqli_error($link);
      }
    } else { // Nếu là tài khoản thường
      $id = $_SESSION['user'];
      $tn = "SELECT * FROM users WHERE TenDangNhap = '$id'";
      $result = $link->query($tn);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $diachi = $row['DiaChi'];
        }
      }
      $quey = "INSERT INTO donhang (MaDonHang, Ngay, DiaChi, TongTien, TrangThai, GhiChu, TenDangNhap) VALUES ('$madh','$time','$diachi','$tongtien','$trangthai','$ghichu','$id')";
      if (mysqli_query($link, $quey)) {
        echo "New record created successfully";
        foreach ($_SESSION['cart'] as $item) {
          $masp = $item['masp'];
          $sl = $item['sl'];
          $dongia = $item['gia'];
          $sql = "INSERT INTO thongtindonhang VALUES('$masp','$madh',$sl,$dongia)";
          if (mysqli_query($link, $sql)) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
          }
        }
        unset($_SESSION['cart']);
        header("Location: ../apple-store/order-management.php?id=$id");
        mysqli_close($link);
      } else {
        echo "Error: " . $quey . "<br>" . mysqli_error($link);
      }
    }
  }
}
?>
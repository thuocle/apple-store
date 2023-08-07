<?php session_start();
if(isset($_SESSION['cart']))
{
  if(isset($_GET['vnp_ResponseCode']) && $_GET['vnp_ResponseCode'] == "00")
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
    $diachi = "";
    $trangthai = 1;
    $ghichu = "Thanh toán ATM";
    $id = "";
    $ggid = "";
    $ten = $_SESSION['user'];
    $sql2 = "SELECT * FROM google_users WHERE google_name = '$ten' ";
    $result3 = $link->query($sql2);
    if ($result3->num_rows > 0){
      $row2 = $result3->fetch_assoc();
      $ggid = $row2['google_id'];
    } 
    if (!is_numeric($_SESSION['user'])) {
      $id = $_SESSION['user'];
      $tn = "SELECT * FROM users WHERE TenDangNhap = '$id'";
      $result = $link->query($tn);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $diachi = $row['DiaChi'];
        }
      }
    } else {
      $ggid = $_SESSION['user'];
    }
    
    $quey = "INSERT INTO donhang VALUES ('$madh','$time','$diachi','$tongtien','$trangthai','$ghichu','$id', '$ggid')";
    if (mysqli_query($link, $quey)) {
      echo "New record created successfully";
      mysqli_close($link);
      unset($_SESSION['cart']);
      $_SESSION['mess'] = "Đơn hàng của bạn đang được xử lý";
      header(('Location:../apple-store/order-management.php'));
    } else {
      echo "Error: " . $quey . "<br>" . mysqli_error($link);
    }
  }
}
?>
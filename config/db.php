 <?php //session_start();
//$link=mysqli_connect("localhost","root","12345678","qldt") or die("Not connect");
//$UserMail = "ledanghoc1102@gmail.com";
//$UserPass = "";
?> 
<?php
$servername = "localhost"; // tên máy chủ
$username = "root"; // tên người dùng
$password = ""; // mật khẩu
$dbname = "applestore"; // tên cơ sở dữ liệu

// Tạo kết nối đến cơ sở dữ liệu
$link = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$link) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>

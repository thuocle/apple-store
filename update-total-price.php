<?php
session_start();
if(isset($_POST['total_price'])) {
    $_SESSION['tongtien'] = $_POST['total_price'];
}
?>
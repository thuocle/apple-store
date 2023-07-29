<?php session_start();
    unset($_SESSION['cart']);
    header(('Location:../apple-store/checkout.php'));
?>
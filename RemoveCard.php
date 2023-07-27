<?php session_start();
    unset($_SESSION['cart']);
    header(('Location:../mobile-shop/checkout.php'));
?>
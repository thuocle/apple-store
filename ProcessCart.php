<?php session_start();
    //cong so luong
    if(isset($_GET['cong'])){
        $masp = $_GET['cong'];
        $prod = array();
        foreach($_SESSION['cart'] as $item){
            if($item['masp'] != $masp){
                $prod[] = $item;
            }else{
                if($item['sl'] <10){
                    $tangsl = $item['sl']+1;
                    $prod[] = array('tensp' => $item['tensp'], 'masp' => $item['masp'], 'img' => $item['img'], 'sl' => $tangsl, 'gia' => $item['gia']);
                }else{
                    $prod[] = $item;
                }
            }
        }
        $_SESSION['cart'] = $prod;
        header('Location:../apple-store/cart.php');
    }
    //tru so luong
    if(isset($_GET['tru'])){
        $masp = $_GET['tru'];
        $prod = array();
        foreach($_SESSION['cart'] as $item){
            if($item['masp'] != $masp){
                $prod[] = $item;
            }else{
                if($item['sl'] > 1){
                    $tangsl = $item['sl']-1;
                    $prod[] = array('tensp' => $item['tensp'], 'masp' => $item['masp'], 'img' => $item['img'], 'sl' => $tangsl, 'gia' => $item['gia']);
                }else{
                    $prod[] = $item;
                }
            }
        }
        $_SESSION['cart'] = $prod;
        header('Location:../apple-store/cart.php');
    }
    //xoa san pham theo id
    if(isset($_SESSION['cart']) && isset($_GET['idxoa'])){
        $masp = $_GET['idxoa'];
        foreach ($_SESSION['cart'] as $item){
            if($item['masp'] != $masp){
                $prod [] = array('tensp' => $item['tensp'], 'masp' => $item['masp'], 'img' => $item['img'], 'sl' => $item['sl'], 'gia' => $item['gia']);
            }
        }
        $_SESSION['cart'] = $prod;
        header(('Location:../apple-store/cart.php'));
    }
    //xoa tat ca giohang bang cach unset session hien co
    if(isset($_GET['xoatatca']) && $_GET['xoatatca']==1){
        unset($_SESSION['cart']);
        header(('Location:../apple-store/cart.php'));
    }
?>
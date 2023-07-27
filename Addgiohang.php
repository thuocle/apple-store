<?php session_start();
    if(isset($_GET['masp']))
    {
        include('./config/db.php');
        $masp = $_GET['masp'];
        $sql = "SELECT * FROM sanpham WHERE MaSanPham = '$masp'";
        $result = $link->query($sql);
        $sl = 1;
        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
            $sanpham = array(array('tensp' => $row['TenSanPham'], 'masp' => $row['MaSanPham'], 'img' => $row['HinhAnh'], 'sl' => $sl, 'gia' => $row['GiaSanPham']));
            if(isset($_SESSION['cart']))
            {

                $flag = true;
                foreach($_SESSION['cart'] as $item)
                {
                    if($item['masp'] == $masp)
                    {
                        $prod [] = array('tensp' => $item['tensp'], 'masp' => $item['masp'], 'img' => $item['img'], 'sl' => $item['sl']+1, 'gia' => $item['gia']);
                        $flag = false;
                    }
                    else
                    {
                        $prod [] = array('tensp' => $item['tensp'], 'masp' => $item['masp'], 'img' => $item['img'], 'sl' => $item['sl'], 'gia' => $item['gia']);
                    }
                }
                if($flag == true) {
                $_SESSION['cart'] = array_merge($prod,$sanpham);
                }
                else
                $_SESSION['cart'] = $prod;
            }
            else
            {
                $_SESSION['cart'] = $sanpham;
            }
          }  
        }
    }
    $_SESSION['mess'] = "Thêm sản phẩm thành công";
    header(('Location:../mobile-shop/products.php'));
    die();
?>

<?php
    include('../config/db.php');
    if(isset($_POST['submit'])) {
    $file=$_FILES['fileUpload'];
    $hinhanh=$file['name'];
    $hinhanh_tmp=$_FILES['fileUpload']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;
    $i = "SP".rand(1,100);
    $tensp = $_POST['tensp'];
    $giaban = $_POST['gia'];
    $sl = $_POST['sl'];
    $kichthuoc = $_POST['kichthuoc'];
    $trgluong = $_POST['trgluong'];
    $camera = $_POST['camera'];
    $ram = $_POST['ram'];
    $sim = $_POST['sim'];
    $pin = $_POST['pin'];
    $hdh = $_POST['hdh'];
    $bh = $_POST['bh'];
    $pk = $_POST['pk'];
    $nxs = $_POST['nxs'];
    $bonho = $_POST['bonho'];
    $sql = "SELECT * FROM nsx WHERE TenNSX = '$nxs'";
                                    if ($result = mysqli_query($link, $sql)) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id = $row['MaNSX'];
                                        }
                                    }
                $sql1 = "INSERT INTO sanpham VAlUES ('$i','$tensp',$giaban,$sl,'$kichthuoc','$trgluong','$camera','$ram','$sim','$pin','$bonho','$hdh','$bh','$pk','$hinhanh','$id')";
                if (mysqli_query($link, $sql1)) {
                    $padt = "D:/".$hinhanh;
                    $pa = "../img/".$hinhanh;
                    move_uploaded_file($hinhanh_tmp,$padt);
                    rename($padt,$pa);
                    echo "<script type='text/javascript'>alert('Thêm sản phẩm thành công');</script>";
                    header(('Location:../admin/tables.php'));
              } else {
                    echo "Error: " . $sql1 . "<br>" . mysqli_error($link);
              }
    }
    if(isset($_POST['sua']))
    {
        $file=$_FILES['fileUpload'];
    $hinhanh=$file['name'];
    $hinhanh_tmp=$_FILES['fileUpload']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;
    $i = "SP".rand(1,100);
    $tensp = $_POST['tensp'];
    $giaban = $_POST['gia'];
    $sl = $_POST['sl'];
    $kichthuoc = $_POST['kichthuoc'];
    $trgluong = $_POST['trgluong'];
    $camera = $_POST['camera'];
    $ram = $_POST['ram'];
    $sim = $_POST['sim'];
    $pin = $_POST['pin'];
    $hdh = $_POST['hdh'];
    $bh = $_POST['bh'];
    $pk = $_POST['pk'];
    $nxs = $_POST['nxs'];
    $bonho = $_POST['bonho'];
    $sql = "SELECT * FROM nsx WHERE TenNSX = '$nxs'";
                                    if ($result = mysqli_query($link, $sql)) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id = $row['MaNSX'];
                                        }
                                    }
                                    $nasp = $_POST['masp'];
                $sq = "UPDATE sanpham SET TenSanPham = '$tensp', GiaSanPham = '$giaban', SoLuong = '$sl', KichThuoc = '$kichthuoc', TrongLuong = '$trgluong', Camera = '$camera', Ram = '$ram', Sim = '$sim', Pin = '$pin', BoNho = '$bonho', HeDieuHanh = '$hdh', BaoHanh = '$bh', PhuKien = '$pk', HinhAnh = '$hinhanh', MaNSX = '$id' WHERE MaSanPham = '$nasp'";                
                $sql1 = "INSERT INTO sanpham VAlUES ('$i','$tensp',$giaban,$sl,'$kichthuoc','$trgluong','$camera','$ram','$sim','$pin','$bonho','$hdh','$bh','$pk','$hinhanh','$id')";
                if (mysqli_query($link, $sq)) {
                    $padt = "D:/".$hinhanh;
                    $pa = "../img/".$hinhanh;
                    move_uploaded_file($hinhanh_tmp,$padt);
                    rename($padt,$pa);
                    echo "<script type='text/javascript'>alert('Sửa sản phẩm thành công');</script>";
                    header(('Location:../admin/tables.php'));
              } else {
                    echo "Error: " . $sq . "<br>" . mysqli_error($link);
              }
    }
    if(isset($_GET['idxoa']))
    {
        $xoa = $_GET['idxoa'];
        $quey = "DELETE FROM sanpham Where MaSanPham = '$xoa'";
        if (mysqli_query($link, $quey)) {
            echo "<script type='text/javascript'>alert('Xóa sản phẩm thành công');</script>";
            header(('Location:../admin/tables.php'));
        }
    }
?>
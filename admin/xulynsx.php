<?php
    include('../config/db.php');
    if(isset($_POST['submit'])) {
    $mansx = rand(1,100);
    $tennsx = $_POST['tennsx'];
    $gt = $_POST['gt'];
    $sql = "INSERT INTO nsx VALUES ('$mansx','$tennsx','$gt')";
    if(mysqli_query($link,$sql)) {
                    
                    header(('Location:../admin/category.php'));
                    echo "<script type='text/javascript'>alert('Thêm danh mục thành công');</script>";
              } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($link);
              }
    }
    if(isset($_POST['sua']))
    {
        $mansx = $_POST['mansx'];
        $tennsx = $_POST['tennsx'];
        $gt = $_POST['gt'];
        $sql = "UPDATE nsx SET TenNSX = '$tennsx',GioiThieu = '$gt' WHERE MaNSX='$mansx'";
        if(mysqli_query($link,$sql)) {
            echo "<script type='text/javascript'>alert('Sửa danh mục thành công');</script>";
            header(('Location:../admin/category.php'));
              } else {
                    echo "Error: " . $sq . "<br>" . mysqli_error($link);
              }
    }
    if(isset($_GET['idxoa']))
    {
        $xoa = $_GET['idxoa'];
        $quey = "DELETE FROM nsx Where MaNSX = '$xoa'";
        if (mysqli_query($link, $quey)) {
            echo "<script type='text/javascript'>alert('Xóa danh mục thành công');</script>";
            header(('Location:../admin/category.php'));
        }
    }
?>
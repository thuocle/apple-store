<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include("../admin/assets/title.php");?>
        <style type="text/css">
            #bang td {
                width: 200px;
                /* background-color: red; */
            }

            #bang input {
                width: max;
            }
        </style>
        
    </head>
    <body class="sb-nav-fixed">
    <?php include("../admin/assets/header.php");?>
    <div id="layoutSidenav_content">
        <div style="margin: auto;" >
            <form action="xuly.php" method="POST" enctype="multipart/form-data">
                <table id="bang">
                <?php
                        if(isset($_GET['id']))
                        {
                ?>
                <tr>
                    <td>Mã sản phẩm</td>
                    <td><input name="masp" value="<?php echo $_GET['id'] ?>" type="text" placeholder="Tên sản phẩm" readonly/></td>
                </tr>
                <?php
                        }
                ?>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td><input name="tensp" type="text" placeholder="Tên sản phẩm"/></td>
                </tr>
                <tr>
                <td>Giá bán</td>
                    <td><input name="gia" type="text" placeholder="Giá bán"/></td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td><input name="sl" type="text" placeholder="Số lượng"/></td>
                </tr>
                <tr>
                    <td>Kích thước</td>
                    <td><input name="kichthuoc" type="text" placeholder="Kích thước"/></td>
                </tr>
                <tr>
                    <td>Trọng lượng</td>
                    <td><input name="trgluong" type="text" placeholder="Trọng lượng"/></td>
                </tr>
                <tr>
                    <td>Camera</td>
                    <td><input name="camera" type="text" placeholder="Camera"/></td>
                </tr>
                <tr>
                    <td>Ram</td>
                    <td><input name="ram" type="text" placeholder="Ram"/></td>
                </tr>
                <tr>
                    <td>Sim</td>
                    <td><input name="sim" type="text" placeholder="Sim"/></td>
                </tr>
                <tr>
                    <td>Pin</td>
                    <td><input name="pin" type="text" placeholder="Pin"/></td>
                </tr>
                <tr>
                    <td>Bộ nhớ</td>
                    <td><input name="bonho" type="text" placeholder="Bộ nhớ"/></td>
                </tr>
                <tr>
                    <td>Hệ điều hành</td>
                    <td><input name="hdh" type="text" placeholder="Hệ điều hành"/></td>
                </tr>
                <tr>
                    <td>Bảo hành</td>
                    <td><input name="bh" type="text" placeholder="Bảo hành"/></td>
                </tr>
                <tr>
                    <td>Phụ kiện</td>
                    <td><input name="pk" type="text" placeholder="Phụ kiện"/></td>
                </tr>
                <tr>
                    <td>Hình ảnh</td>
                    <td><input name="fileUpload" id="fileUpload" type="file" placeholder="Hình ảnh"/></td>
                </tr>
                <tr>
                    <td>Nhà sản xuất</td>
                    <td>
                        <select name="nxs">
                            <option value = "" selected> Select option </option>  
                            <option value="Iphone">Iphone</option>
                            <option value="Samsung">Samsung</option>
                            <option value="Xiaomi">Xiaomi</option>
                            <option value="Realme">Realme</option>
                            <option value="Oppo">Oppo</option>
                        </select>
                    </td>
                </tr>
                <tr >
                    <?php
                        if(isset($_GET['id']))
                        {
                    ?>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" name="sua" value="Sửa"/>
                    </td>
                    <?php }
                        else
                        {
                    ?>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" name="submit" value="Thêm"/>
                    </td>
                    <?php        
                        } ?>
                </tr>
            </table>
            </form>
        </div>
    </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
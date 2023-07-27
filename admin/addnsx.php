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
            <form action="xulynsx.php" method="POST" enctype="multipart/form-data">
                <table id="bang">
                <?php
                        if(isset($_GET['id']))
                        {
                ?>
                <tr>
                    <td>Mã nhà sản xuất</td>
                    <td><input name="mansx" value="<?php echo $_GET['id'] ?>" type="text" placeholder="Tên nhà sản xuất" readonly/></td>
                </tr>
                <?php
                        }
                ?>
                <tr>
                    <td>Tên nhà sản xuất</td>
                    <td><input name="tennsx" type="text" placeholder="Tên nhà sản xuất"/></td>
                </tr>
                <tr>
                <td>Giới thiệu</td>
                    <td><input name="gt" type="text" placeholder="Giới thiệu"/></td>
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
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
            <form action="xulyuser.php" method="POST" enctype="multipart/form-data">
                <table id="bang">
                <?php
                        if(isset($_GET['id']))
                        {
                ?>
                <tr>
                    <td>Tên đăng nhập</td>
                    <td><input name="user" value="<?php echo $_GET['id'] ?>" type="text" placeholder="Tên đăng nhập" readonly/></td>
                </tr>
                <?php
                        }
                        else {
                ?>
                <tr>
                    <td>Tên đăng nhập</td>
                    <td><input name="user" type="text" placeholder="Tên đăng nhập" /></td>
                </tr>
                <?php } ?>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input name="pass" type="text" placeholder="Mật khẩu"/></td>
                </tr>
                <tr>
                <td>Email</td>
                    <td><input name="email" type="text" placeholder="Email"/></td>
                </tr>
                <td>Họ tên</td>
                    <td><input name="hoten" type="text" placeholder="Họ tên"/></td>
                </tr>
                <td>Số điện thoại</td>
                    <td><input name="sdt" type="text" placeholder="Số điện thoại"/></td>
                </tr>
                <td>Địa chỉ</td>
                    <td><input name="dchi" type="text" placeholder="Địa chỉ"/></td>
                </tr>
                <tr>
                <td>Chức vụ</td>
                <td>
                    <select name="quyen" id="">
                        <option value = "" selected> Select option </option>  
                        <option value="admin">Quản trị viên</option>
                        <option value="user">Người dùng</option>
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
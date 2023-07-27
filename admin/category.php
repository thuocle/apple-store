<!DOCTYPE html>
<html lang="en">

<head>
<?php include("../admin/assets/title.php");?>
</head>

<body class="sb-nav-fixed">
<?php include("../admin/assets/header.php");?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tables</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh mục sản phẩm</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                        <td><a style="text-decoration: none" href="addnsx.php">Thêm danh mục mới</a></td>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Thông tin tất cả các nhà sản xuát
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Mã nhà sản xuất</th>
                                        <th>Tên nhà sản xuất</th>
                                        <th>Giới thiệu</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('../config/db.php');
                                    $sql = "SELECT * FROM nsx";
                                    if ($result = mysqli_query($link, $sql)) {
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['MaNSX'] ?></td>
                                            <td><?php echo $row['TenNSX'] ?></td>
                                            <td><?php echo $row['GioiThieu'] ?></td>
                                            <td style="text-align: center;"> <?php
                                            echo '<a href="addnsx.php?id='. $row["MaNSX"] .' " class="filled-button" style="text-decoration: none; ">Sửa</a>';
                                            ?>
                                            <!-- <a style="text-decoration: none; " href="addsp.php?id=".<?php ?>."'">Sửa</a> -->
                                            </td>
                                            <td style="text-align: center;"> <?php
                                            echo '<a href="xulynsx.php?idxoa='. $row["MaNSX"] .' " class="filled-button" style="text-decoration: none; ">Xóa</a>';
                                            ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
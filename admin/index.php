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
                        <h1 class="mt-4">Trang chủ</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Thống kê dữ liệu bán hàng</li>
                        </ol>
                        <form id="filterForm" method="POST" action="thongke.php">
    <label for="start_date">Từ ngày:</label>
    <input  type="date" id="start_date" name="start_date" style="color:red;border: green solid 2px;">

    <label for="end_date">Đến ngày:</label>
    <input type="date" id="end_date" name="end_date" style="color:red;border: green solid 2px;">

    <label for="type">Thống kê theo:</label>
    <select id="type" name="type" style="color:red;border: green solid 2px;">
        <option value="4">Đơn hàng hoàn thành</option>
        <option value="6">Đơn hàng hoàn trả</option>
        <option value="3">Đơn hàng đang giao</option>
        <option value="5">Đơn hàng đã hủy</option>
        <option value="1">Số sản phấm bán ra</option>
        <option value="7">Doanh thu</option>
        <!-- Thêm các loại sản phẩm khác nếu cần -->
    </select>

    <input type="submit" value="Lọc" class="btn-success">
</form>

                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Thống kê theo ngày
                                    </div>
                                    <?php include("./thongke.php");?>
                                    <div class="card-body"></div>
                                </div>
                            </div>
                    </div>
                </main>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <!-- <script src="assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

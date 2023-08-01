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
    label {
  display: inline-block;
  font-weight: bold;
  margin-bottom: 0.5rem;
  margin-top: 0.5rem;
}
    .card-header h3{
        text-align: center;
    }
    </style>

</head>

<body class="sb-nav-fixed">
    <?php include("../admin/assets/header.php");?>
    <div id="layoutSidenav_content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo isset($_GET['id']) ? 'Sửa sản phẩm' : 'Thêm sản phẩm' ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="xuly.php" method="POST" enctype="multipart/form-data">
                            <?php if(isset($_GET['id'])) { ?>
                                <div class="form-group">
                                    <label for="masp">Mã sản phẩm</label>
                                    <input id="masp" name="masp" type="text" class="form-control" value="<?php echo $_GET['id'] ?>" readonly />
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <label for="tensp">Tên sản phẩm</label>
                                <input id="tensp" name="tensp" type="text" class="form-control" placeholder="Tên sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label for="gia">Giá bán</label>
                                <input id="gia" name="gia" type="text" class="form-control" placeholder="Giá bán" />
                            </div>
                            <div class="form-group">
                                <label for="sl">Số lượng</label>
                                <input id="sl" name="sl" type="text" class="form-control" placeholder="Số lượng" />
                            </div>
                            <div class="form-group">
                                <label for="kichthuoc">Kích thước</label>
                                <input id="kichthuoc" name="kichthuoc" type="text" class="form-control" placeholder="Kích thước" />
                            </div>
                            <div class="form-group">
                                <label for="trgluong">Trọng lượng</label>
                                <input id="trgluong" name="trgluong" type="text" class="form-control" placeholder="Trọng lượng" />
                            </div>
                            <div class="form-group">
                                <label for="camera">Camera</label>
                                <input id="camera" name="camera" type="text" class="form-control" placeholder="Camera" />
                            </div>
                            <div class="form-group">
                                <label for="ram">Ram</label>
                                <input id="ram" name="ram" type="text" class="form-control" placeholder="Ram" />
                            </div>
                            <div class="form-group">
                                <label for="sim">Sim</label>
                                <input id="sim" name="sim" type="text" class="form-control" placeholder="Sim" />
                            </div>
                            <div class="form-group">
                                <label for="pin">Pin</label>
                                <input id="pin" name="pin" type="text" class="form-control" placeholder="Pin" />
                            </div>
                            <div class="form-group">
                                <label for="bonho">Bộ nhớ</label>
                                <input id="bonho" name="bonho" type="text" class="form-control" placeholder="Bộ nhớ" />
                            </div>
                            <div class="form-group">
                                <label for="hdh">Hệ điều hành</label>
                                <input id="hdh" name="hdh" type="text" class="form-control" placeholder="Hệ điều hành" />
                            </div>
                            <div class="form-group">
                                <label for="bh">Bảo hành</label>
                                <input id="bh" name="bh" type="text" class="form-control" placeholder="Bảo hành" />
                            </div>
                            <div class="form-group">
                                <label for="pk">Phụ kiện</label>
                                <input id="pk" name="pk" type="text" class="form-control" placeholder="Phụ kiện" />
                            </div>
                            <div class="form-group">
                                <label for="fileUpload">Hình ảnh</label>
                                <input id="fileUpload" name="fileUpload" type="file" class="form-control" placeholder="Hình ảnh" />
                            </div>
                            <div class="form-group">
                                <label for="loaisp">Loại sản phẩm</label>
                                <select id="loaisp" name="loaisp" class="form-control">
                                    <option value="" selected>Chọn loại sản phẩm</option>
                                    <option value="iPhone">iPhone</option>
                                    <option value="iPad">iPad</option>
                                    <option value="MacBook">MacBook</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="chip">Chip</label>
                                <input id="chip" name="chip" type="text" class="form-control" placeholder="Chip" />
                            </div>
                            <div class="form-group">
                                <label for="cpu">CPU</label>
                                <input id="cpu" name="cpu" type="text" class="form-control" placeholder="CPU" />
                            </div>
                            <div class="form-group">
                                <label for="gpu">GPU</label>
                                <input id="gpu" name="gpu" type="text" class="form-control" placeholder="GPU" />
                            </div>
                            <div class="form-group">
                                <label for="tid">TouchID</label>
                                <input id="tid" name="tid" type="text" class="form-control" placeholder="TouchID" />
                            </div>
                            <div class="form-group text-center">
                                <?php if(isset($_GET['id'])) { ?>
                                    <button type="submit" name="sua" class="btn btn-primary">Sửa sản phẩm</button>
                                <?php } else { ?>
                                    <button type="submit" name="submit" class="btn btn-primary">Thêm sản phẩm</button>
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
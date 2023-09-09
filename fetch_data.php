<?php
//fetch_data.php

include('./config/database_connection.php');
include('./config/db.php');

// Số lượng sản phẩm trên mỗi trang
$per_page = 6;

// Tính toán vị trí bắt đầu của sản phẩm trong trang hiện tại
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$start = ($page - 1) * $per_page;

// Xây dựng truy vấn SQL để lấy sản phẩm cho trang hiện tại
$query = "SELECT * FROM SanPham WHERE 1=1";

if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
    $query .= " AND GiaSanPham BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'";
}

if (isset($_POST["inches"])) {
    $inches = implode("','", $_POST["inches"]);
    $query .= " AND KichThuoc IN('" . $inches . "')";
}

if (isset($_POST["ram"])) {
    $ram_filter = implode("','", $_POST["ram"]);
    $query .= " AND Ram IN('" . $ram_filter . "')";
}

if (isset($_POST["storage"])) {
    $storage_filter = implode("','", $_POST["storage"]);
    $query .= " AND BoNho IN('" . $storage_filter . "')";
}

$query .= " ORDER BY MaSanPham ASC LIMIT $start, $per_page";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '';

if ($total_row > 0) {
    foreach ($result as $row) {
        $output .= '
        <div class="col-md-4">
            <div class="service-item">
                <img src="img/' . $row["HinhAnh"] . '" alt="">
                <div class="down-content">
                    <h4>' . $row["TenSanPham"] . '</h4>
                    <div style="margin-bottom:10px;">
                        <span>
                            <del>' . ($row["GiaSanPham"] * 1.5) . '<sup>VND</sup></del> &nbsp;' . $row["GiaSanPham"] . '<sup>VND</sup>
                        </span>
                    </div>
                    <p><b>Ram ' . $row["Ram"] . ' GB</b></p>
                    <p><b>Bộ nhớ ' . $row["BoNho"] . ' GB</b></p>
                    <a href="product-details.php?masp=' . $row["MaSanPham"] . ' " class="filled-button">Xem thêm</a>
                </div>
            </div>
            <br>
        </div>';
    }
} else {
    $output = '<h3>No Data Found</h3>';
}
echo $output;

// Phân trang
echo '<nav>
    <ul class="pagination pagination-lg justify-content-center">';
if ($page > 1) {
    echo '<li class="page-item">
            <a class="page-link" href="products.php?page=' . ($page - 1) . '" aria-label="Previous">
                <span aria-hidden="true">«</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>';
}

$sqltrang = "SELECT COUNT(*) as total FROM SanPham";
$stmt = $connect->prepare($sqltrang);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_pages = ceil($row['total'] / $per_page);

for ($i = 1; $i <= $total_pages; $i++) {
    echo '<li class="page-item"><a class="page-link" href="products.php?page=' . $i . '">' . $i . '</a></li>';
}

if ($page < $total_pages) {
    echo '<li class="page-item">
            <a class="page-link" href="products.php?page=' . ($page + 1) . '" aria-label="Next">
                <span aria-hidden="true">»</span>
                <span class="sr-only">Next</span>
            </a>
        </li>';
}

echo '</ul>
</nav>';

?>
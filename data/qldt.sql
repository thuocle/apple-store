-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 28, 2022 lúc 01:20 PM
-- Phiên bản máy phục vụ: 8.0.17
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qldt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Ngay` datetime DEFAULT NULL,
  `DiaChi` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TongTien` float DEFAULT NULL,
  `TrangThai` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `GhiChu` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TenDangNhap` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `MaLienHe` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `DiaChi` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `SoDT` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Mail` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nsx`
--

CREATE TABLE `nsx` (
  `MaNSX` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `TenNSX` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `GioiThieu` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nsx`
--

INSERT INTO `nsx` (`MaNSX`, `TenNSX`, `GioiThieu`) VALUES
('01', 'Iphone', 'iPhone là dòng điện thoại thông minh được thiết kế và phát triển bởi Apple Inc.. Nó được ra mắt lần đầu tiên bởi Steve Jobs vào năm 2007.'),
('02', 'Samsung', 'Samsung là một tập đoàn đa quốc gia của Hàn Quốc có trụ sở chính đặt tại Samsung Town, Seocho, Seoul. '),
('03', 'Xiaomi', 'Xiaomi Inc. là một Tập đoàn sản xuất hàng điện tử Trung Quốc có trụ sở tại Thâm Quyến.'),
('04', 'Oppo', 'OPPO Electronics Corp là nhà sản xuất thiết bị điện tử, điện thoại di động Android Trung Quốc, có trụ sở đặt tại Đông Hoản, Quảng Đông, công ty con của tập đoàn điện tử BBK Electronics'),
('05', 'Realme', 'Realme là nhà sản xuất điện thoại thông minh Android Trung Quốc có trụ sở tại Thâm Quyến. Thương hiệu này được chính thức thành lập vào ngày 6 tháng 5 năm 2018');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `TenSanPham` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `GiaSanPham` float DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `KichThuoc` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TrongLuong` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Camera` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Ram` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Sim` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Pin` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `BoNho` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `HeDieuHanh` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `BaoHanh` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PhuKien` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `HinhAnh` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `MaNSX` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `GiaSanPham`, `SoLuong`, `KichThuoc`, `TrongLuong`, `Camera`, `Ram`, `Sim`, `Pin`, `BoNho`, `HeDieuHanh`, `BaoHanh`, `PhuKien`, `HinhAnh`, `MaNSX`) VALUES
('SP01', 'Iphone 14', 22000000, 1000, '6,1 inches', '172g', 'Camera góc rộng:12MP;Camera góc siêu rộng:12MP', 'Dung lượng RAM:6GB', '2 SIM (nano‑SIM và eSIM)', '3,279mAh', 'Bộ nhớ trong:128GB', 'iOS', '2 năm', 'dock sạc,tai nghe,kim chọc sim', 'anh1.png', '01'),
('SP02', 'Iphone 13 Pro Max', 27900000, 1000, '6,7 inches', '170g', 'Camera góc rộng:12MP;Camera góc siêu rộng:12MP', 'Dung lượng RAM:6GB', '2 SIM (nano‑SIM và eSIM)', '4,325mAh', 'Bộ nhớ trong:128GB', 'iOS', '2 năm', 'dock sạc,tai nghe,kim chọc sim', 'anh2.jpg', '01'),
('SP03', 'Samsung Galaxy Z Fold4', 36290000, 2000, '7.6 inches', '263g', 'Camera chính:50MP;Camera góc siêu rộng:12MP,Camera tele: 10MP (3x zoom)', 'Dung lượng RAM:12GB', '2 SIM (nano‑SIM và eSIM)', '4,400 mAh', 'Bộ nhớ trong:256GB', 'Android 12, One UI 4.1.1', '2 năm', 'dock sạc,tai nghe,kim chọc sim', 'anh4.jpg', '02'),
('SP04', 'OPPO Reno8', 8390000, 500, '6.4 inches', '182g', 'Camera chính:64MP,f/1.7;Camera Marco:2MP,f/3.3;Camera tele:10MP(3x zoom);Bokeh:2MP,f/2.4', 'Dung lượng RAM:8GB', '2 SIM (nano‑SIM và eSIM)', '4,400 mAh', 'Bộ nhớ trong:256GB', 'Android 12', '2 năm', 'dock sạc,tai nghe,kim chọc sim', 'anh3.jpg', '04'),
('SP05', 'Xiaomi Redmi Note 11 Pro Plus 5G', 8890000, 700, '6.67 inches', '204g', 'Camera góc rộng:108 MP,f/1.9,PDAF;Camera góc siêu rộng:8MP;Camera macro:2MP,f/2.4', 'Dung lượng RAM:8GB', '2 SIM (Nano-SIM)', 'Li-Po 4500 mAh', 'Bộ nhớ trong:256GB', 'Android 12', '2 năm', 'dock sạc,tai nghe,kim chọc sim', 'anh5.jpg', '03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtindonhang`
--

CREATE TABLE `thongtindonhang` (
  `MaSanPham` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `MaDonHang` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `DonGia` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `MaTinTuc` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `TieuDe` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TomTat` varchar(400) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NoiDung` text COLLATE utf8mb4_general_ci,
  `NgayDang` datetime DEFAULT NULL,
  `TacGia` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `HinhAnh` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `TenDangNhap` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `MatKhau` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `HoTen` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `SDT` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DiaChi` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Quyen` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`TenDangNhap`, `MatKhau`, `Email`, `HoTen`, `SDT`, `DiaChi`, `Quyen`) VALUES
('user', '123456', 'user@gmail.com', 'user', '0123456789', 'user', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`MaLienHe`,`DiaChi`);

--
-- Chỉ mục cho bảng `nsx`
--
ALTER TABLE `nsx`
  ADD PRIMARY KEY (`MaNSX`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`);

--
-- Chỉ mục cho bảng `thongtindonhang`
--
ALTER TABLE `thongtindonhang`
  ADD PRIMARY KEY (`MaSanPham`,`MaDonHang`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`MaTinTuc`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`TenDangNhap`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8887
-- Generation Time: Dec 18, 2023 at 04:27 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlikhohang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `taiKhoan` varchar(100) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `soDienThoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `taiKhoan`, `matKhau`, `email`, `soDienThoai`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '0987767654'),
(2, 'admin_kho1', 'admin123', 'admin123@gmail.com', '0987654321'),
(3, 'admin_thanhxuan', '1233321', 'thanh@gmail.com', '0434567654'),
(4, 'admin_haibatrung', '332211', 'haibatrung@gmail.com', '0987767890');

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `id` int(11) NOT NULL,
  `tenChucVu` varchar(255) NOT NULL,
  `nhanVienId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`id`, `tenChucVu`, `nhanVienId`) VALUES
(1, 'Thủ kho', 1),
(2, 'Nhân viên kho', 2),
(3, 'Kế toán kho', 4),
(4, 'Quản lí kho', 3),
(5, 'Giám sát kho', 5);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tenDanhMuc` varchar(255) NOT NULL,
  `maDanhMuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tenDanhMuc`, `maDanhMuc`) VALUES
(1, 'Đồ tiêu dùng', 'doTieuDung'),
(2, 'Đồ thực phẩm', 'doThuPham'),
(3, 'Đồ điện tử', 'doDienTu'),
(4, 'Đồ gia dụng', 'doGiaDung');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc_khohang`
--

CREATE TABLE `danhmuc_khohang` (
  `id` int(11) NOT NULL,
  `danhMucId` int(11) NOT NULL,
  `khoHangId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhmuc_khohang`
--

INSERT INTO `danhmuc_khohang` (`id`, `danhMucId`, `khoHangId`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `donvi`
--

CREATE TABLE `donvi` (
  `id` int(11) NOT NULL,
  `tenDonVi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donvi`
--

INSERT INTO `donvi` (`id`, `tenDonVi`) VALUES
(1, 'Tấn'),
(2, 'Tạ'),
(3, 'Yến'),
(4, 'Kilogam'),
(5, 'Túi'),
(6, 'Gam');

-- --------------------------------------------------------

--
-- Table structure for table `khohang`
--

CREATE TABLE `khohang` (
  `id` int(11) NOT NULL,
  `tenKhoHang` varchar(100) NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `taiKhoanId` int(11) NOT NULL,
  `nhanVienId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khohang`
--

INSERT INTO `khohang` (`id`, `tenKhoHang`, `diaChi`, `taiKhoanId`, `nhanVienId`) VALUES
(1, 'Kho Hàng Bắc Từ Liêm', 'Cổ Nhuế, Bắc Từ Liêm', 1, 1),
(2, 'Kho Hàng Cầu Giấy', 'Xuân Thủy, Cầu Giấy', 2, 3),
(3, 'Kho Hàng Thanh Xuân', 'Beta Thanh Xuân, Thanh Xuân, Hà Nội', 3, 2),
(4, 'Kho Hàng Hai Bà Trưng', 'Hoàn Kiếm, Hai Bà Trưng, Hà Nội', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `lichsunhaphang`
--

CREATE TABLE `lichsunhaphang` (
  `id` int(11) NOT NULL,
  `thoiGian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nhanVienId` int(11) NOT NULL,
  `sanPhamId` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `nhaPhanPhoiId` int(11) NOT NULL,
  `donViId` int(11) NOT NULL,
  `khoHangId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lichsunhaphang`
--

INSERT INTO `lichsunhaphang` (`id`, `thoiGian`, `nhanVienId`, `sanPhamId`, `soLuong`, `nhaPhanPhoiId`, `donViId`, `khoHangId`) VALUES
(1, '2023-12-18 16:26:46', 3, 4, 1, 2, 4, 3),
(2, '2023-12-18 16:26:46', 4, 3, 1, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lichsuxuathang`
--

CREATE TABLE `lichsuxuathang` (
  `id` int(11) NOT NULL,
  `thoiGian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nhanVienId` int(11) NOT NULL,
  `sanPhamId` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `nhaPhanPhoiId` int(11) NOT NULL,
  `donViId` int(11) NOT NULL,
  `khoHangId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lichsuxuathang`
--

INSERT INTO `lichsuxuathang` (`id`, `thoiGian`, `nhanVienId`, `sanPhamId`, `soLuong`, `nhaPhanPhoiId`, `donViId`, `khoHangId`) VALUES
(1, '2023-12-18 16:25:06', 1, 1, 2, 1, 5, 1),
(2, '2023-12-18 16:25:06', 2, 2, 1, 4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `tenNhanVien` varchar(100) NOT NULL,
  `soDienThoai` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diaChi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `tenNhanVien`, `soDienThoai`, `email`, `diaChi`) VALUES
(1, 'Nguyễn Quang Thành', '0987678987', 'thanh@gmail.com', 'Liên Mạc, Bắc Từ Liêm, Hà Nội'),
(2, 'Nguyễn Việt An', '0987273748', 'ann@gmail.com', 'Cổ Nhuế, Park Từ Liêm, Hà Nội'),
(3, 'Phạm Tiến Dũng', '0987776676', 'dung@gmail.com', 'Dối diện mỏ địa chất'),
(4, 'Nguyễn Xuân Khánh', '0889876654', 'khanhDen@gmail.com', 'Hòa Lạc, Ba Vì, Hà Nội'),
(5, 'Hoàng Văn Toàn', '0876567876', 'taotentoan@gmail.com', 'Xuân Thủy, Cầu Giấy, Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `nhaphanphoi`
--

CREATE TABLE `nhaphanphoi` (
  `id` int(11) NOT NULL,
  `tenNhaPhanPhoi` varchar(255) NOT NULL,
  `dienThoai` varchar(20) NOT NULL,
  `diaChi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhaphanphoi`
--

INSERT INTO `nhaphanphoi` (`id`, `tenNhaPhanPhoi`, `dienThoai`, `diaChi`) VALUES
(1, 'Cty Thực Phẩm Hòa An', '0987676543', 'Chí Linh, Hải Dương'),
(2, 'Cty TNHH Hoa Sen', '0989987678', 'Quận 8, TP Hồ Chí Minh'),
(3, 'Cty Đồ gia dụng Hiền Châu', '0999556773', 'Cầu cây, Hải Phòng'),
(4, 'Cty TNHH Điện tử Sunfuric', '0222334556', 'Pong Chia, Laos');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tenSanPham` varchar(255) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `donViId` int(11) NOT NULL,
  `nhaPhanPhoiId` int(11) NOT NULL,
  `danhMucId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tenSanPham`, `soLuong`, `donViId`, `nhaPhanPhoiId`, `danhMucId`) VALUES
(1, 'Bánh Đậu Xanh', 2, 5, 1, 2),
(2, 'Tủ Lạnh Panasonic', 1, 2, 4, 3),
(3, 'Nồi chiên không dầu An An', 3, 5, 2, 1),
(4, 'Bếp ga Hiền Châu', 50, 4, 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhanVienId` (`nhanVienId`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuc_khohang`
--
ALTER TABLE `danhmuc_khohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khoHangId` (`khoHangId`),
  ADD KEY `danhMucId` (`danhMucId`);

--
-- Indexes for table `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khohang`
--
ALTER TABLE `khohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taiKhoanId` (`taiKhoanId`),
  ADD KEY `nhanVienId` (`nhanVienId`);

--
-- Indexes for table `lichsunhaphang`
--
ALTER TABLE `lichsunhaphang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donViId` (`donViId`),
  ADD KEY `khoHangId` (`khoHangId`),
  ADD KEY `lichsunhaphang_ibfk_3` (`nhaPhanPhoiId`),
  ADD KEY `lichsunhaphang_ibfk_4` (`sanPhamId`),
  ADD KEY `nhanVienId` (`nhanVienId`);

--
-- Indexes for table `lichsuxuathang`
--
ALTER TABLE `lichsuxuathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donViId` (`donViId`),
  ADD KEY `khoHangId` (`khoHangId`),
  ADD KEY `nhaPhanPhoiId` (`nhaPhanPhoiId`),
  ADD KEY `sanPhamId` (`sanPhamId`),
  ADD KEY `lichsuxuathang_ibfk_5` (`nhanVienId`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhaphanphoi`
--
ALTER TABLE `nhaphanphoi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donViId` (`donViId`),
  ADD KEY `nhaPhanPhoiId` (`nhaPhanPhoiId`),
  ADD KEY `danhMucId` (`danhMucId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `danhmuc_khohang`
--
ALTER TABLE `danhmuc_khohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donvi`
--
ALTER TABLE `donvi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `khohang`
--
ALTER TABLE `khohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lichsunhaphang`
--
ALTER TABLE `lichsunhaphang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lichsuxuathang`
--
ALTER TABLE `lichsuxuathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhaphanphoi`
--
ALTER TABLE `nhaphanphoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD CONSTRAINT `chucvu_ibfk_1` FOREIGN KEY (`nhanVienId`) REFERENCES `nhanvien` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `danhmuc_khohang`
--
ALTER TABLE `danhmuc_khohang`
  ADD CONSTRAINT `danhmuc_khohang_ibfk_1` FOREIGN KEY (`khoHangId`) REFERENCES `khohang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `danhmuc_khohang_ibfk_2` FOREIGN KEY (`danhMucId`) REFERENCES `danhmuc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `khohang`
--
ALTER TABLE `khohang`
  ADD CONSTRAINT `khohang_ibfk_1` FOREIGN KEY (`taiKhoanId`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `khohang_ibfk_2` FOREIGN KEY (`nhanVienId`) REFERENCES `nhanvien` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lichsunhaphang`
--
ALTER TABLE `lichsunhaphang`
  ADD CONSTRAINT `lichsunhaphang_ibfk_1` FOREIGN KEY (`donViId`) REFERENCES `donvi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lichsunhaphang_ibfk_2` FOREIGN KEY (`khoHangId`) REFERENCES `khohang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lichsunhaphang_ibfk_3` FOREIGN KEY (`nhaPhanPhoiId`) REFERENCES `nhaphanphoi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lichsunhaphang_ibfk_4` FOREIGN KEY (`sanPhamId`) REFERENCES `sanpham` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lichsunhaphang_ibfk_5` FOREIGN KEY (`nhanVienId`) REFERENCES `nhanvien` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lichsuxuathang`
--
ALTER TABLE `lichsuxuathang`
  ADD CONSTRAINT `lichsuxuathang_ibfk_1` FOREIGN KEY (`donViId`) REFERENCES `donvi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lichsuxuathang_ibfk_2` FOREIGN KEY (`khoHangId`) REFERENCES `khohang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lichsuxuathang_ibfk_3` FOREIGN KEY (`nhaPhanPhoiId`) REFERENCES `nhaphanphoi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lichsuxuathang_ibfk_4` FOREIGN KEY (`sanPhamId`) REFERENCES `sanpham` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lichsuxuathang_ibfk_5` FOREIGN KEY (`nhanVienId`) REFERENCES `nhanvien` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`donViId`) REFERENCES `donvi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`nhaPhanPhoiId`) REFERENCES `nhaphanphoi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`danhMucId`) REFERENCES `danhmuc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

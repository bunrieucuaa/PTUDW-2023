-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8887
-- Generation Time: Dec 21, 2023 at 11:53 AM
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
  `tenTaiKhoan` varchar(255) NOT NULL,
  `taiKhoan` varchar(100) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `soDienThoai` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `tenTaiKhoan`, `taiKhoan`, `matKhau`, `email`, `soDienThoai`, `role_id`) VALUES
(1, 'Hoàng Công Thuận', 'admin', 'admin', 'admin@gmail.com', '0987767654', 1),
(2, 'Đinh Văn Hưng', 'admin_khobactuliem', 'admin123', 'admin123@gmail.com', '0987654321', 1),
(3, 'Đặng Huy Cảnh', 'admin_thanhxuan', '1233321', 'thanh@gmail.com', '0434567654', 1),
(4, 'Nguyễn Văn Hải', 'admin_haibatrung', '332211', 'haibatrung@gmail.com', '0987767890', 1),
(5, 'Phan Anh Đức', 'duccut123', '123321', 'duc@gmail.com', '0987646386', 2),
(6, 'Nguyễn Tuấn Việt', 'viet123', 'viet123ert', 'viet34@gmail.com', '0434556789', 2),
(7, 'Trần Phương Thảo', 'pthao23', '1233456', 'pthao@gmail.com', '0989987767', 2),
(8, 'Hoàng Phương Quỳnh', 'quynh123', '123qweryu', 'quynh12@gmail.com', '0994435654', 2),
(9, 'Đoàn Thùy Linh', 'linh23', '123linh123', 'linh233@gmail.com', '0985546657', 2),
(10, 'Phạm Hương Thùy', 'thuyk12', 'thuyk1233221', 'thuy@gmail.com', '0234435678', 2);

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
(6, 'Gam'),
(7, 'Cái'),
(8, 'Hộp'),
(9, 'Thùng');

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
(4, 'Kho Hàng Hai Bà Trưng', 'Hoàn Kiếm Hà Nội', 4, 2),
(6, 'Kho Hàng Hà Đông', 'Mộ Lao, Hà Đông', 4, 4),
(7, 'Kho Hàng Quảng Ninh', 'Hạ Long, Quảng Ninh', 7, 6),
(9, 'Kho Hàng Lào Cai', 'Sapa, Lào Cai', 7, 8),
(10, 'Kho Hàng Vũng Tàu', 'Somewhere in Vũng Tàu', 8, 8);

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
(5, 'Hoàng Văn Toàn', '0876567876', 'taotentoan@gmail.com', 'Xuân Thủy, Cầu Giấy, Hà Nội'),
(6, 'Nguyễn Việt Dũng', '0545678976', 'dung@gmail.com', 'Cổ Nhuế, Hà Nội'),
(7, 'Bùi Văn Duy', '0944556332', 'duy@gmail.com', 'Từ Sơn, Bắc Ninh'),
(8, 'Nguyễn Việt Hoàng', '0876654456', 'hoang@gmail.com', 'Bắc Sơn, Bắc Giang'),
(9, 'Nguyễn Việt Tiến', '0876654455', 'tien@gmail.com', 'Sapa, Lào Cai');

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
(1, 'Công Ty CP Đầu Tư Công Nghệ Việt Thái', '(024) 66801876', 'Tổ 3, P. Phú Đô, Q. Nam Từ Liêm, Hà Nội'),
(2, 'Công Ty Cổ Phần Thực Phẩm Richy Miền Bắc', '(024) 33636610', 'CN Thị Trấn Phùng, TT. Phùng, H. Đan Phượng, Hà Nội'),
(3, ' Công Ty TNHH Thương Mại & Tư Vấn Minh Anh', '(024) 35374223', '117/117 Thái Hà, Q. Đống Đa, Hà Nội'),
(4, ' Công Ty TNHH Faso Việt Nam', '0981999231', 'B10 - 11, Lô 20, KĐT Mới Định Công, Q. Hoàng Mai,Hà Nội'),
(5, 'Công Ty TNHH Thương Mại & Sản Xuất Hoàng Mai', '(024) 37282898', 'Tầng 9, HCMCC Tower,  249A Thụy Khuê, Q. Tây Hồ, Hà Nội'),
(6, 'Công Ty Cổ Phần Phượng Hoàng - phân phối bánh kẹo nội địa và nhập khẩu Argentina', ' (024) 37830269', 'Số 18, Lô 2C, Trung Yên 2, P. Trung Yên, Q. Cầu Giấy, Hà Nội'),
(7, 'Công Ty TNHH Hải Hà - Kotobuki', '(024) 36210074', '25 Trương Định, Hai Bà Trưng, Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `tenRole` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `tenRole`) VALUES
(1, 'Admin'),
(2, 'Quản lí kho'),
(3, 'Nhân viên thủ kho');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

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
-- Indexes for table `role`
--
ALTER TABLE `role`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `khohang`
--
ALTER TABLE `khohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nhaphanphoi`
--
ALTER TABLE `nhaphanphoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

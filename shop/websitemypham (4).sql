-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2022 at 01:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websitemypham`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `MaBV` int(11) NOT NULL,
  `TenBV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDungBV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MaNV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cauhoi`
--

CREATE TABLE `cauhoi` (
  `MaCH` int(11) NOT NULL,
  `NoiDungCH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CauTL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MaKH` int(11) NOT NULL,
  `MaNV` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dangnhap_fb`
--

CREATE TABLE `dangnhap_fb` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_time` int(11) DEFAULT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dangnhap_fb`
--

INSERT INTO `dangnhap_fb` (`id`, `username`, `email`, `password`, `fullname`, `birthday`, `status`, `created_time`, `last_updated`) VALUES
(1, NULL, 'nguyentritinh6827@gmail.com', NULL, 'Trí Tính', NULL, 1, 1666537634, 1666537634);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int(11) NOT NULL,
  `NgayGiaoHangDuKien` datetime NOT NULL,
  `TrangThaiDonHang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThaiThanhToan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PhuongThucThanhToan` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThoiDiemDatHang` date NOT NULL,
  `DiaChiNhanHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MaNV` int(11) DEFAULT NULL,
  `MaKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenKH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `SDT` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `STK` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SDT_TK` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `GioiTinh`, `NgaySinh`, `SDT`, `Email`, `STK`, `DiaChi`, `SDT_TK`) VALUES
(1, 'Nguyễn Trí Tính', 'Nam', '2001-12-23', '0926366827', 'nguyentritinh6827@gmail.com', '01678955222', 'long an', '0926366827');

-- --------------------------------------------------------

--
-- Table structure for table `momo`
--

CREATE TABLE `momo` (
  `id_momo` int(11) NOT NULL,
  `partner_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_info` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trans_id` int(11) NOT NULL,
  `pay_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `momo`
--

INSERT INTO `momo` (`id_momo`, `partner_code`, `order_id`, `amount`, `order_info`, `order_type`, `trans_id`, `pay_type`) VALUES
(22, 'MOMOBKUN20180529', 1667293756, '8100000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas'),
(23, 'MOMOBKUN20180529', 1670920580, '8100000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas');

-- --------------------------------------------------------

--
-- Table structure for table `nguoiquantrihethong`
--

CREATE TABLE `nguoiquantrihethong` (
  `MaQTHT` int(11) NOT NULL,
  `TenQTHT` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `SDT` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SDT_TK` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoiquantrihethong`
--

INSERT INTO `nguoiquantrihethong` (`MaQTHT`, `TenQTHT`, `GioiTinh`, `NgaySinh`, `SDT`, `Email`, `DiaChi`, `SDT_TK`) VALUES
(1, 'Tính', 'Nam', '0000-00-00', '0926366827', 'nguyentritinh@gmail.com', 'Long An', '0926366827');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `TenNV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `SDT` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ChucVu` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SDT_TK` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ID` int(11) NOT NULL,
  `TenKH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Total` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ID`, `TenKH`, `SDT`, `DiaChi`, `Email`, `Total`) VALUES
(39, 'Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '200000'),
(40, 'Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '200000'),
(41, 'Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '8100000'),
(42, 'Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '8100000'),
(43, 'Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '16200000'),
(44, 'Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '24300000'),
(45, 'Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '16200000'),
(46, 'Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '16200000'),
(47, 'Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '8100000'),
(48, 'Trí Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '9300000'),
(49, 'Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '1000000'),
(50, 'Nguyễn Trí Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '8100000'),
(51, 'Nguyễn Trí Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '8100000'),
(52, 'Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '8100000'),
(53, 'Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '8100000'),
(54, 'Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '8100000'),
(55, 'Tính', '3231321', 'Long an', 'nguyentritinh6827@gmail.com', '8100000'),
(56, 'Tính', '0926366827', 'Long An', 'nguyentinh6827@gmail.com', '8100000');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`ID`, `Order_ID`, `MaSP`, `SoLuong`, `Gia`) VALUES
(41, 39, 7, '1', '200000'),
(42, 40, 7, '1', '200000'),
(43, 41, 1, '1', '8100000'),
(44, 42, 1, '1', '8100000'),
(45, 43, 1, '2', '8100000'),
(46, 44, 1, '3', '8100000'),
(47, 45, 1, '2', '8100000'),
(48, 46, 1, '2', '8100000'),
(49, 47, 1, '1', '8100000'),
(50, 48, 1, '1', '8100000'),
(51, 48, 9, '2', '600000'),
(52, 49, 2, '1', '1000000'),
(53, 50, 1, '1', '8100000'),
(54, 51, 1, '1', '8100000'),
(55, 52, 1, '1', '8100000'),
(56, 53, 1, '1', '8100000'),
(57, 54, 1, '1', '8100000'),
(58, 55, 1, '1', '8100000'),
(59, 56, 1, '1', '8100000');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `thanh_vien` varchar(100) NOT NULL COMMENT 'thành viên thanh toán',
  `money` float NOT NULL COMMENT 'số tiền thanh toán',
  `note` varchar(255) DEFAULT NULL COMMENT 'ghi chú thanh toán',
  `vnp_response_code` varchar(255) NOT NULL COMMENT 'mã phản hồi',
  `code_vnpay` varchar(255) NOT NULL COMMENT 'mã giao dịch vnpay',
  `code_bank` varchar(255) NOT NULL COMMENT 'mã ngân hàng',
  `time` datetime NOT NULL COMMENT 'thời gian chuyển khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenThuongHieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `XuatXu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NoiSanXuat` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `LoaiDa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DacTinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `VanDeVeDa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ThanhPhan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HuongDanSuDung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `MaNV` int(11) DEFAULT NULL,
  `MaTH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `Gia`, `TenThuongHieu`, `XuatXu`, `NoiSanXuat`, `LoaiDa`, `DacTinh`, `VanDeVeDa`, `ThanhPhan`, `HuongDanSuDung`, `Anh`, `SoLuong`, `MaNV`, `MaTH`) VALUES
(1, 'Tinh chất vàng 24K tái sinh da OHUI The First Geniture Ampoule Advanced', '8100000', 'OHIU', 'HÀN QUỐC', 'HÀN QUỐC', 'mọi da', 'ss', 'ss', 'ss', 'ss', 'sp3.png', 2, NULL, 1),
(2, 'Double Wear\r\nStay-in-Place Foundation', '1000000', 'ESTÉE LAUDER ', 'Mỹ', 'Mỹ', 'mọi da', 'ss', 'ds', 'ds', 'ds', 'sp4.jpg', 2, NULL, 4),
(3, 'Nước tẩy trang Simple Micellar Cleansing Water', '150000', 'SIMPLE', 'Anh', 'Anh', 'Mọi loại da', 'Tẩy tế bào chế', 'Da yếu', 'Nước Tinh Lọc 3 Lần\r\nVitamin B3\r\nVitamin C', 'Bước 1\r\nCho một lượng nước tẩy trang vào miếng bông tẩy trang\r\n\r\nBước 2\r\nBước 3\r\nNhẹ nhàng lau khu vực quanh mắt. Tránh chạm vào mắt.\r\n\r\nBước 4\r\nNếu bị dính nước tẩy trang vào mắt, rửa thật kỹ lại với nước sạch', '1664550199_sp5.jpg', 4, NULL, 3),
(4, 'Kem nền lâu trôi Estee Lauder Double Wear Stay-in-Place Makeup SPF 10/PA++ - Foundation 30ml', '1600000', 'ESTÉE LAUDER ', 'Mỹ', 'Mỹ', 'mọi da', 'Kem nền', 'Che khuyết điểm', 'Loại: Kem nền dạng lỏng\r\nLâu trôi 24 giờ ngay cả trong điều kiện thời tiết nóng ẩm\r\nKhông gây khô, mốc\r\nKhông chứa dầu và kiếm soát bóng nhờn', '\r\nĐộ che phủ từ trung bình đến hoàn hảo\r\nSau khi che phủ có độ bóng mờ\r\nSản phẩm sẽ cho ra các kết quả khác nhau tùy thuộc vào cơ địa của từng người khác nhau', '1666600549_sp7.jpg', 2, 0, 4),
(5, 'Sữa rửa mặt Simple Refreshing Facial Wash ', '150000', 'SIMPLE', 'Anh', 'Anh', 'Mọi loại da', 'Tẩy tế bào chế', 'Da yếu', 'Nước Tinh Lọc 3 Lần\r\nVitamin B3\r\nVitamin C\r\nKhông chứa hương liệu nhân tạo\r\nKhông chứa phẩm màu hay thuốc nhuộm\r\nKhông chứa hóa chất gay gắt\r\nKhông chứa xà bông\r\nNước, Cocamidopropyl Betaine, Propylene glycol, Hydroxypropyl methyl cellulose, Panthenol, To', 'Bước 1\r\nLàm ướt mặt với nước ấm\r\n\r\nBước 2\r\nBước 3\r\nMassage nhẹ nhàng toàn bộ khuôn mặt\r\n\r\nBước 4\r\nRửa sạch với nước ấm. Tránh vùng mắt mỏng manh\r\n\r\n', '1666602152_sp8.jpg', 4, 0, 3),
(6, 'Kem Dưỡng Ẩm Simple Kind To Skin Hydrating Light Moisturiser', '170000', 'SIMPLE', 'Anh', 'Anh', 'Mọi loại da', 'Không chứa hương liệu nhân tạo Không chứa phẩm màu hay thuốc nhuộm Không chứa hóa chất gay gắt', 'vitamin giúp làm mềm và láng mịn da. ', 'Pro-Vitamin B5\r\nGlycerin\r\nBisabolol\r\nNiệu Nang Tố\r\nNước, Glycerin, Coco-Caprylate/Caprate, Polyglyceryl-3 Methylglucose Distearate, Ethylhexyl Methoxycinnamate, Stearyl Alcohol, Panthenol, Tocopheryl Acetate, Bisabolol, Pentylene Glycol, Sodium lactate, L', 'Bước 1\r\nLấy một lượng kem vừa đủ cho toàn bộ khuôn mặt\r\n\r\nBước 2\r\nNhẹ nhàng thoa nhẹ vào mặt và cổ theo hướng từ dưới lên hoặc từ trong ra ngoà\r\n', '1666602428_sp9.jpg', 4, 0, 3),
(7, 'Nước hoa hồng Simple Smoothing Facial Toner', '200000', 'SIMPLE', 'Anh', 'Anh', 'Mọi loại da', 'Không chứa hương liệu nhân tạo Không chứa phẩm màu hay thuốc nhuộm Không chứa hóa chất gay gắt', 'Nước Cân Bằng Làm Dịu Da Mặt Simple Kind to Skin gồm công thức đặc biệt chứa những dưỡng chất giúp da cân bằng và tươi mát. Trong sản phẩm có những thành phần như Pro-Vitamin B5, Hoa Cúc, Cây Phỉ và Niệu Nang Tố.', 'Pro-Vitamin B5\r\nHoa Cúc\r\nCây Phỉ\r\nNiệu Nang Tố\r\nNước, Hydrogenated Starch Hydrolysate, Hamamelis Virginiana Water, Allantoin, Panthenol, Niacinamide, Chiết Xuất Hoa Cúc (Chamomilla Recutita), Sodium PCA, Glycerin, Pantolactone, Disodium Laureth Sulfosucci', 'Bước 1\r\nThấm ướt bông tẩy trang với nước hoa hồng, lau đều lên mặt và cổ theo hướng từ dưới lên sau khi rửa mặt sạch mỗi sáng và tối\r\n\r\n', '1666602628_sp10.jpg', 4, 0, 3),
(8, ' DẦU GỘI HANAYUKI SHAMPOO', '230000', 'HANAYUKI', 'Nhật bản', 'Nhật bản', 'không có', 'Dầu gội Hanayuki Shampoo là sản phẩm chăm sóc tóc, làm sạch tóc và nuôi dưỡng mái tóc bồng bềnh mỗi ngày.', 'không có', 'Chiết xuất 100% thiên nhiên:\r\n\r\n• Menthol (Tinh dầu Bạc Hà) •\r\nGiúp ngăn ngừa viêm, nấm, ngứa da đầu.\r\n• Aloe barbadensis leaf extract (Chiết xuất Lô Hội) : Nuôi dưỡng tóc, giúp tóc chắc khỏe.\r\n• Citrus grandis peel oil (Chiết xuất Bưởi) : Giúp da đầu chắ', '1. Làm ướt toàn bộ tóc.\r\n2. Đổ lượng vừa phải dầu gội và xoa đều trong lòng bàn tay, thoa lên chân tóc và massage đều\r\n3. Xả sạch dầu trên tóc.\r\n4. Xả sạch bằng nước lạnh\r\n\r\n', '1666602919_sp11.png', 4, 0, 2),
(9, 'SỮA RỬA MẶT KHÔNG BỌT HANA CLEANSER', '600000', 'HANAYUKI', 'Nhật bản', 'Nhật bản', 'không có', 'Giúp làm sạch da mặt dịu nhẹ.', 'Giúp làm giảm mụn. Giúp làm trẻ hóa làn da. Giúp làm mờ vết thâm. Giúp làm trắng da.', '• Panthenol (Vitamin B5): giúp dưỡng ẩm làm dịu và tái tạo da, cải thiện sự mềm mại và đàn hồi của da.\r\n• Niacinamide (Vitamin B3): có tác dụng dưỡng da, nó góp phần cấu thành chức năng và cấu trúc của các hàng rào bảo vệ da. Và chính hiệu quả này, Niacin', '• Làm ướt da mặt, lấy một lượng sữa rửa mặt vừa đủ cho vào lòng bàn tay, thêm vài giọt nước và đánh tan đều. Thoa lên vùng da mặt, dùng tay mát-xa nhẹ nhàng theo chiều xoắn ốc từ trong ra ngoài khoảng 20 – 30 giây và thư giãn. Rửa mặt thật sạch lại bằng n', '1666603066_sp12.png', 4, 0, 2),
(10, 'KEM DƯỠNG NHŨ HOA PINKISH NIPPLE HANAYUKI', '295000', 'HANAYUKI', 'Nhật bản', 'Nhật bản', 'không có', ' Pinkish Nipple Hanayuki là sản phẩm dưỡng da vùng nhũ hoa hằng ngày, giúp nhũ hoa luôn trắng hồng tươi tắn, ngăn ngừa nhăn, nứt da và chống lão hoá', 'không có', 'Niacinamide (Vitamin B3): giúp tăng sinh Ceramide, Collagen, giúp se khít lỗ chân lông, từ đó sẽ giúp da tươi trẻ và mịn màng.\r\n\r\n+ Alpha Arbutin (Chiết xuất từ cây Bearberry): hoạt chất làm trắng có tác dụng làm đều màu da, làm mờ thâm sạm da và làm trắn', '– Làm sạch vùng nhũ hoa\r\n\r\n– Thoa lượng kem vừa đủ lên vùng nhũ hoa\r\n\r\n– Sử dụng hằng ngày để duy trì vùng nhũ hoa luôn sáng hồng, mềm mại.\r\n\r\nNên sử dụng Kem giảm thâm nhũ hoa Hanayuki Pink Nipple trước khi dùng sản phẩm này. Khi nào vùng nhũ hoa sáng hồ', '1666603582_sp13.png', 4, 0, 2),
(11, 'TINH CHẤT GIẢM THÂM NÁM HANA MELASMA MINI', '360000', 'HANAYUKI', 'Nhật bản', 'Nhật bản', 'không có', 'Với thành phần chiết xuất từ tự nhiên Tinh chất giảm thâm nám Hana Melasma (serum) giúp hỗ trợ giảm thâm nám nhanh chóng', 'không có', ' Aqua, Niacinamide, Propylene Glycol, Centella Asiatica Extract, Lepidium Sativum Sprout Extract, Lecithin, Soy Isoflavones, Alpha Arbutin, Aloe Barbadensis Leaf Juice, Maltodextrin, Hydrolyzed Opuntia Ficus-Indica Flower Extract, Panax Ginseng Extract, C', '• Rửa mặt thật sạch, để cho da mặt khô thoáng. Lấy một lượng serum vừa đủ, thoa lên vùng da bị nám. Dùng tay vỗ thật nhẹ nhàng cho hoạt chất thấm sâu vào da.\r\n• Chỉ cần thoa một lớp serum thật mỏng. Nếu thoa serum dầy, da dễ bị kích ứng, mẩn đỏ do không h', '1666603709_sp14.jpg', 4, 0, 2),
(12, 'KEM TRANG ĐIỂM DƯỠNG DA CHỐNG NẮNG HANA BB MAKE UP', '740000', 'HANAYUKI', 'Nhật bản', 'Nhật bản', 'không có', 'Với thành phần chiết xuất từ tự nhiên Tinh chất giảm thâm nám Hana Melasma (serum) giúp hỗ trợ giảm thâm nám nhanh chóng', 'không có', 'Aqua, C12-15 Alkyl Benzoate, Cyclopentasiloxane, Glyceryl Stearate, Titanium dioxide, Peg – 100 stearic acids, Niacinamide, Polysorbate 20, Cucumis Sativus Fruit Extract, Phenoxyethanol, Cetyl Alcohol, Glyceryl Stearate, Aloe Barbadensis Leaf Juice, Propy', '• Rửa mặt thật sạch và lau khô, sau đó thoa lên vùng da cần trang điểm (mặt, cổ, tay,…) khi sử dụng kem trang điểm BB. Có thể điều chỉnh độ trắng sáng của da bằng việc thoa dày hay mỏng.\r\n\r\n• Khi có nhu cầu trang điểm, nên thoa kem BB trước khi ra ngoài t', '1666603815_sp15.png', 4, 0, 2),
(13, 'TINH CHẤT TRẮNG DA HANA WHITENING', '770000', 'HANAYUKI', 'Nhật bản', 'Nhật bản', 'không có', 'Với thành phần chiết xuất từ tự nhiên Tinh chất giảm thâm nám Hana Melasma (serum) giúp hỗ trợ giảm thâm nám nhanh chóng', 'không có', '• Alpha Arbutin (chiết xuất từ cây Bearberry): Hoạt chất làm trắng có tác dụng làm đều màu da, làm mờ vết nám da và làm trắng da.\r\n• Panthenol (Vitamin B5): giúp dưỡng ẩm làm dịu, chữa lành và tái tạo da, cải thiện sự mềm mại và đan hồi của da.\r\n• Centell', '• Rửa mặt thật sạch, để cho da mặt khô thoáng. Lấy một lượng serum vừa đủ, thoa lên vùng da cần dưỡng trắng. Dùng tay vỗ thật nhẹ nhàng cho hoạt chất thấm sâu vào da. Chỉ cần thoa một lớp serum thật mỏng. Nếu thoa serum\r\n• Dầy, da dễ bị kích ứng, mẩn đỏ d', '1666603886_sp16.png', 4, 0, 2),
(14, 'KEM DƯỠNG TRẮNG DA BAN ĐÊM HANA WHITE & NIGHT', '635000', 'HANAYUKI', 'Nhật bản', 'Nhật bản', 'không có', 'Với thành phần chiết xuất từ tự nhiên Tinh chất giảm thâm nám Hana Melasma (serum) giúp hỗ trợ giảm thâm nám nhanh chóng', 'không có', '• Alpha A rbutin (Chiết xuất từ cây Bearberry): hoạt chất làm trắng có tác dụng làm đều màu da, làm mờ vết nám da và làm trắng da.\r\n• Panthenol (Vitamin B5): giúp dưỡng ẩm làm dịu và tái tạo da, cải thiện sự mềm mại và đan hồi của da.\r\n• Centella Asiatica', '• Rửa mặt thật sạch, để cho da mặt khô thoáng. Lấy một lượng kem vừa đủ, thoa lên vùng da cần dưỡng trắng. Dùng tay vỗ thật nhẹ nhàng cho hoạt chất thấm sâu vào da. Chỉ cần thoa một lớp kem thật mỏng. Nếu thoa kem dầy, da dễ bị kích ứng, mẩn đỏ do không h', '1666603963_sp17.jpg', 4, 0, 2),
(15, 'Tinh chất chống lão hóa OHUI Prime Advancer Ampoule Serum', '2600000', 'OHIU', 'HÀN QUỐC', 'HÀN QUỐC', 'mọi da', 'ngăn ngừa lão hóa sớm', 'Tinh chất chống lão hóa', 'AQUA, GLYCERIN, PROPANEDIOL, BIS-PEG-15 METHYL ETHER DIMETHICONE, DIMETHICONE, ALCOHOL DENAT., 1,2-HEXANEDIOL, PANTHENOL, LACTOBACILLUS/SOYBEAN FERMENT EXTRACT, TREHALOSE, HYDROGENATED LECITHIN, DIPROPYLENE GLYCOL, RHUS SEMIALATA EXTRACT, MYRTUS COMMUNIS ', 'Sử dụng sau bước cân bằng da OHUI Prime Advancer Gel Cleanser.\r\nLấy lượng sản phẩm vừa đủ, thoa đều và vỗ nhẹ trên toàn khuôn mặt để sản phẩm thấm đều vào sâu trong làn da.\r\nKết hợp động tác massage khi thoa tinh chất để dưỡng chất đi sâu và nhanh hơn.\r\nS', '1666604811_sp18.png', 2, 0, 1),
(16, 'Kem dưỡng trắng da sáng rạng rỡ OHUI Extreme White Cream', '2100000', 'OHIU', 'HÀN QUỐC', 'HÀN QUỐC', 'mọi da', 'giúp xóa tan sự tối màu từ sâu bên trong.', 'Kem dưỡng trắng OHUI dành cho mọi loại da, phù hợp cho cả da nhạy cảm. Thích hợp cho làn da cần dưỡng sáng và làm đều màu da.', 'WATER, GLYCERIN, TRIETHYLHEXANOIN, DIMETHICONE, DIPROPYLENE GLYCOL, NIACINAMIDE, 1,2-HEXANEDIOL, CYCLOPENTASILOXANE, C14-22 ALCOHOLS, GLYCERYL STEARATE, PEG-40 STEARATE, CETEARYL ALCOHOL, PANTHENOL, BETAINE, SQUALANE, PEG-100 STEARATE, SORBITAN STEARATE, ', 'Lấy lượng sản phẩm vừa đủ, chấm thành 5 điểm trên gương mặt rồi thoa đều và vỗ nhẹ.\r\nKết hợp động tác massage khi thoa kem để dưỡng chất đi sâu và nhanh hơn.\r\nSử dụng như bước khóa ẩm ở cuối chu trình dưỡng da.\r\nSử dụng 2 lần mỗi ngày vào buổi sáng và tối', '1666604898_sp19.png', 2, 0, 1),
(17, 'Sữa dưỡng thể cho da mịn màng OHUI Delight Therapy Body Lotion', '720000', 'OHIU', 'HÀN QUỐC', 'HÀN QUỐC', 'mọi da', 'giúp xóa tan sự tối màu từ sâu bên trong.', 'Sữa dưỡng thể Delight Therapy Body Lotion với thành phần hiệu năng giúp làn da cơ thể mịn màng, tươi mát với lớp màng dưỡng ẩm cùng hương thơm dễ chịu lưu giữ trên da cả ngày dài.', 'WATER, GLYCERIN, HYDROGENATED POLYDECENE, CYCLOPENTASILOXANE, BUTYLENE GLYCOL, CAPRYLIC/CAPRIC TRIGLYCERIDE, 1,2-HEXANEDIOL, ALCOHOL DENAT., GLYCERYL STEARATE, CETEARYL ALCOHOL, C14-22 ALCOHOLS, BETAINE, PEG-100 STEARATE, DIMETHICONE, FRAGRANCE, C12-20 AL', 'Sử dụng sau khi tắm bằng sữa tắm và làm khô cơ thể bằng khăn bông mềm.\r\nLấy một lượng sữa dưỡng thể vừa đủ và thoa đều khắp cơ thể.\r\nNhẹ nhàng massage thư giãn để sữa tắm thẩm thấu tốt hơn và tận hưởng hương thơm tươi mát.', '1666605061_sp20.png', 2, 0, 4),
(18, 'RE-NUTRIV Ultimate Diamond Transformative Brilliance Serum', '5200000', 'ESTÉE LAUDER ', 'Mỹ', 'Mỹ', 'mọi da', 'Trông rạng rỡ và đều màu hơn. Cảm thấy săn chắc hơn.', 'Đối với làn da sáng như kim cương: Hoàn mỹ hơn. Bức xạ. Không thể nào quên', 'Thành phần: Water  Aqua  Eau, Dimethicone, Butylene Glycol, Isostearyl Neopentanoate, Vinyl Dimethicone / Methicone Silsesquioxane Crosspolymer, Polysorbate 20, Ascorbyl Glucoside, Glycerin, Chiết xuất từ ​​củ Melanosporum, Chiết xuất Laminaria Digitata, ', 'Thoa lên da sạch vào buổi sáng và buổi tối. Tránh vùng mắt.\r\n\r\nĐể tháo nắp, trước tiên hãy vặn cổ áo theo chiều kim đồng hồ để đảm bảo nó được khóa. Sau đó, mở bằng cách kéo nắp trực tiếp lên trên.', '1666606939_sp21.jpg', 2, 0, 4),
(19, 'Advanced Night Repair Serum Commemorative 30th Anniversary Collectible', '2200000', 'ESTÉE LAUDER ', 'Mỹ', 'Mỹ', 'mọi da', 'Da trông mịn hơn và ít nếp nhăn hơn, trẻ trung, rạng rỡ hơn và đều màu. Tiết lộ làn da khỏe đẹp ngay hôm nay.', 'Da trông mịn hơn và ít nếp nhăn hơn, trẻ trung, rạng rỡ hơn và đều màu. Tiết lộ làn da khỏe đẹp ngay hôm nay.', 'Tripeptide-32: Peptide độc ​​quyền của chúng tôi hỗ trợ bảo vệ nhịp điệu ngày / đêm tự nhiên của da vào ban ngày và đổi mới vào ban đêm.\r\nSodium Hyaluronate: Axit Hyaluronic AKA, một chất lên men là một nam châm hút ẩm mạnh mẽ.', 'Bôi lên da sạch trước kem dưỡng ẩm, SA và CH. Nhẹ nhàng thoa đều khắp mặt và cổ họng.', '1666607102_sp22.jpg', 2, 0, 4),
(20, 'Perfectionist Pro Serum', '3600000', 'ESTÉE LAUDER ', 'Mỹ', 'Mỹ', 'Đối với tất cả các skintypes', 'Không gây mụn, không làm tắc nghẽn lỗ chân lông', 'Không gây mụn, không làm tắc nghẽn lỗ chân lông', 'Ascorbyl Glucoside: Một dạng Vitamin C ổn định, chống oxy hóa mạnh mẽ, đồng thời làm sáng và đều màu da.\r\n\r\nChiết xuất mật mía: Thành phần độc quyền của chúng tôi được tạo ra từ quá trình lên men độc quyền của chúng tôi bắt đầu từ đường mía giúp làm sáng ', 'Để có làn da rạng rỡ, tươi sáng và đều màu hơn, hãy thoa Rapid Brightening Treatment trên da sạch trước kem dưỡng ẩm, SA và CH. Tránh vùng mắt.\r\n\r\nVì tiếp xúc với tia cực tím có thể dẫn đến sự xuất hiện của các đốm / sự đổi màu da, điều cần thiết là phải ', '1666607959_sp23.jpg', 2, 0, 4),
(21, 'Multi-Defense Aqua UV Gel SPF 50 with 8 Anti-Oxidants', '900000', 'ESTÉE LAUDER ', 'Mỹ', 'Mỹ', 'mọi da', 'Không chứa hương liệu nhân tạo Không chứa phẩm màu hay thuốc nhuộm Không chứa hóa chất gay gắt', 'Đối với làn da sáng như kim cương: Hoàn mỹ hơn. Bức xạ. Không thể nào quên', 'Phòng thủ thế hệ tiếp theo của chúng tôi với cảm giác không có gì khác biệt.\r\n\r\nPhương pháp điều trị được truyền cảm hứng chuyên nghiệp giúp bảo vệ vẻ đẹp khỏe mạnh cho làn da của bạn với phương pháp 3 trong 1 toàn diện, chống lại các tác động có thể nh', 'Để có làn da rạng rỡ, tươi sáng và đều màu hơn, hãy thoa Rapid Brightening Treatment trên da sạch trước kem dưỡng ẩm, SA và CH. Tránh vùng mắt. Vì tiếp xúc với tia cực tím có thể dẫn đến sự xuất hiện của các đốm / sự đổi màu da, điều cần thiết là phải', '1666609760_sp24.jpg', 2, 0, 4),
(22, 'Khăn ướt tẩy trang Simple Cleansing Facial Wipes ', '55000', 'SIMPLE', 'Anh', 'Anh', 'Mọi loại da', 'Tẩy tế bào chế', 'Da yếu', 'Nước, Cetearyl Isononanoate, Benzoic acid, Ceteareth-12, Ceteareth-20, Cetearyl Alcohol, Citric acid, Dehydroacetic Acid, Disodium EDTA, Glycerin, Glyceryl stearate, Panthenol, Pantolactone, Phenoxyethanol, Sodium citrate, Tocopheryl Acetate\r\n\r\nThành phần', 'Bước 1\r\nMở nắp gói khăn giấy ướt và lấy khăn\r\n\r\nBước 2\r\nDùng một mặt khăn lau nhẹ nhàng qua mí mắt và môi\r\n\r\nBước 3\r\nSử dụng mặt còn lại của khăn lau trên vùng má, cằm, trán và cổ\r\n\r\nBước 4\r\nNếu lớp trang điểm đậm, có thể giữ khăn ở khu vực đó lâu hơn trư', '1666608372_sp25.jpg', 4, 0, 3),
(23, 'Sữa Rửa Mặt Simple Kiềm Dầu, Ngừa Mụn 150ml ', '100000', 'SIMPLE', 'Anh', 'Anh', 'Mọi loại da', 'Sữa Rửa Mặt Simple Kiềm Dầu, Ngừa Mụn Cho Da Mụn', 'Sữa Rửa Mặt Simple Kiềm Dầu, Ngừa Mụn Cho Da Mụn', '5% chiết xuất nước cây phỉ: hỗ trợ kiềm dầu, làm sạch sâu và thông thoáng lỗ chân lông.\r\n\r\nVitamin B3 (Niacinamide): có công dụng cấp ẩm, giảm thâm hạn chế tình trạng tiết dầu thừa trên da.\r\n\r\nKẽm: có khả năng kháng viêm từ đó ngăn ngừa mụn xuất hiện trở ', 'Cho một lượng sữa rửa mặt vừa đủ ra tay để tạo bọt cùng với nước, mát xa sản phẩm lên da và rửa sạch với nước.\r\n\r\nSử dụng mỗi ngày hai lần sáng và tối.\r\n\r\nĐể đạt được hiệu quả tốt nhất, kết hợp dùng kèm Nước tẩy trang Simple Micellar Water trước khi rửa m', '1666608618_sp26.jpg', 4, 0, 4),
(24, 'Kem massage tạo độ ẩm OHUI Clear Science Tender', '750000', 'OHIU', 'HÀN QUỐC', 'HÀN QUỐC', 'mọi da', 'Tăng cường lưu thông tuần hoàn máu, oxy trên da.', 'Se khít lỗ chân lông, hỗ trợ loại bỏ nhẹ nhàng lớp tế bào chết và bã nhờn.', 'MINERAL OIL, AQUA, DIPROPYLENE GLYCOL, GLYCERIN, TRIETHYLHEXANOIN, CAPRYLIC/CAPRIC TRIGLYCERIDE, HEXYLDECYL ETHYLHEXANOATE, POLYSORBATE 60, CETEARYL ALCOHOL, PEG-100 STEARATE, GLYCERYL STEARATE, STEARIC ACID, SORBITAN STEARATE, TRIETHANOLAMINE', 'Sau khi rửa mặt và chỉnh đốn nếp da bằng nước cân bằng, lấy 1 lượng khoảng bằng quả nho thoa đều lên toàn gương mặt.\r\nMassage nhẹ nhàng từ vùng giữa mặt ra ngoài trong khoảng từ 3 ~ 5 phút.\r\nSau đó lau nhẹ bằng khăn ấm.\r\nSử dụng 1 ~ 2 lần/ tuần', '1666608961_sp27.png', 2, 0, 4),
(25, 'O HUI The First Geniture Genummune Ampoule', '3100000', 'OHIU', 'HÀN QUỐC', 'HÀN QUỐC', 'mọi da', 'Chống oxy hóa liên tục cho da tới 100 giờ từ khi thoa trên da', 'Dưỡng ẩm và tăng độ đàn hồi trên da', 'WATER, DIPROPYLENE GLYCOL, PROPANEDIOL, ASCORBIC ACID, GLYCERIN, 2,3-BUTANEDIOL, ALCOHOL DENAT., PANTHENOL, GLYCOSYL TREHALOSE, HYDROGENATED STARCH HYDROLYSATE, SORBITOL, TROMETHAMINE, POLYGLYCERYL-10 STEARATE, POLYGLYCERYL-10 OLEATE, ALLANTOIN', '• Dùng đầu pump lấy lượng vừa đủ với khuôn mặt\r\n• Thoa nhẹ nhàng trên da sau bước rửa mặt hoặc tiền tinh chất\r\n• Bảo quản ở nơi khô thoáng và mát mẻ, không để tinh chất ở nơi có ánh nắng mặt trời.\r\n• Sử dụng kèm với Tinh chất O HUI The First Geniture Sym-', '1666609040_sp28.png', 2, 0, 1),
(26, 'Sữa dưỡng cải thiện nếp nhăn OHUI Age Recovery Emulsion', '1600000', 'OHIU', 'HÀN QUỐC', 'HÀN QUỐC', 'mọi da', 'Tăng cường độ đàn hồi giúp da săn chắc khỏe mạnh', 'Ức chế và ngăn chặn sự hình thành các nếp nhăn tập trung ở trán, giữa 2 chân mày, khoé miệng', 'AQUA, GLYCERIN, HYDROGENATED POLYDECENE, DIPROPYLENE GLYCOL, TRIETHYLHEXANOIN, BUTYLENE GLYCOL, DIMETHICONE, 1,2-HEXANEDIOL, GLYCERYL STEARATE, BETAINE, BIOSACCHARIDE GUM-1, PEG-5 GLYCERYL STEARATE, BEHENYL ALCOHOL, PANTHENOL, PEG-100 STEARATE, BEHENIC', 'Sử dụng sau bước tinh chất.\r\nLấy một lượng sản phẩm vừa đủ ra lòng bàn tay. Xoa tay sau đó ấn áp và vỗ nhẹ lên toàn khuôn mặt để sản phẩm thẩm thấu vào sâu bên trong da.\r\nBạn có thể tham khảo thêm kem dưỡng da OHUI vitamin B3 thuộc dòng mỹ phẩm OHUI để dư', '1666609143_sp29.png', 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoankh`
--

CREATE TABLE `taikhoankh` (
  `SDT` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoankh`
--

INSERT INTO `taikhoankh` (`SDT`, `MatKhau`) VALUES
('0926366827', 'e10adc3949ba59abbe56e057f20f883e'),
('123', '202cb962ac59075b964b07152d234b70'),
('12345', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoannv`
--

CREATE TABLE `taikhoannv` (
  `SDT` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MaQTHT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoanqtht`
--

CREATE TABLE `taikhoanqtht` (
  `SDT` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoanqtht`
--

INSERT INTO `taikhoanqtht` (`SDT`, `MatKhau`) VALUES
('0926366827', '202cb962ac59075b964b07152d234b70'),
('123', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `MaTH` int(11) NOT NULL,
  `TenThuongHieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `XuatXu` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thuonghieu`
--

INSERT INTO `thuonghieu` (`MaTH`, `TenThuongHieu`, `XuatXu`) VALUES
(1, 'OHIU', 'HÀN QUỐC'),
(2, 'HANAYUKI', 'NHẬT BẢN'),
(3, 'SIMPLE', 'Anh Quốc'),
(4, 'ESTÉE LAUDER', 'MỸ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`MaBV`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Indexes for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`MaCH`),
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Indexes for table `dangnhap_fb`
--
ALTER TABLE `dangnhap_fb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`),
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`),
  ADD KEY `SDT_TK` (`SDT_TK`);

--
-- Indexes for table `momo`
--
ALTER TABLE `momo`
  ADD PRIMARY KEY (`id_momo`);

--
-- Indexes for table `nguoiquantrihethong`
--
ALTER TABLE `nguoiquantrihethong`
  ADD PRIMARY KEY (`MaQTHT`),
  ADD KEY `SDT_TK` (`SDT_TK`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `SDT_TK` (`SDT_TK`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `order_detail_ibfk_2` (`MaSP`),
  ADD KEY `Order_ID` (`Order_ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `MaTH` (`MaTH`);

--
-- Indexes for table `taikhoankh`
--
ALTER TABLE `taikhoankh`
  ADD PRIMARY KEY (`SDT`);

--
-- Indexes for table `taikhoannv`
--
ALTER TABLE `taikhoannv`
  ADD PRIMARY KEY (`SDT`),
  ADD KEY `MaQTHT` (`MaQTHT`);

--
-- Indexes for table `taikhoanqtht`
--
ALTER TABLE `taikhoanqtht`
  ADD PRIMARY KEY (`SDT`);

--
-- Indexes for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`MaTH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dangnhap_fb`
--
ALTER TABLE `dangnhap_fb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `momo`
--
ALTER TABLE `momo`
  MODIFY `id_momo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `baiviet_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD CONSTRAINT `cauhoi_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`),
  ADD CONSTRAINT `cauhoi_ibfk_2` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`SDT_TK`) REFERENCES `taikhoankh` (`SDT`);

--
-- Constraints for table `nguoiquantrihethong`
--
ALTER TABLE `nguoiquantrihethong`
  ADD CONSTRAINT `nguoiquantrihethong_ibfk_1` FOREIGN KEY (`SDT_TK`) REFERENCES `taikhoanqtht` (`SDT`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`SDT_TK`) REFERENCES `taikhoannv` (`SDT`),
  ADD CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`MaNV`) REFERENCES `sanpham` (`MaNV`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_detail_ibfk_3` FOREIGN KEY (`Order_ID`) REFERENCES `order` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaTH`) REFERENCES `thuonghieu` (`MaTH`);

--
-- Constraints for table `taikhoannv`
--
ALTER TABLE `taikhoannv`
  ADD CONSTRAINT `taikhoannv_ibfk_1` FOREIGN KEY (`MaQTHT`) REFERENCES `nguoiquantrihethong` (`MaQTHT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

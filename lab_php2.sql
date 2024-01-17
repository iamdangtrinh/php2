-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2024 at 10:53 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_php2`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `MaBL` int NOT NULL,
  `NoiDung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayBL` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MaTK` int NOT NULL,
  `MaSP` int NOT NULL,
  `SoSao` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`MaBL`, `NoiDung`, `NgayBL`, `MaTK`, `MaSP`, `SoSao`) VALUES
(21, 'SP ok', '2023-12-01 11:52:48', 39, 30, 3);

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHD` int NOT NULL,
  `SoLuongSP` int NOT NULL,
  `MaSP` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaHD`, `SoLuongSP`, `MaSP`) VALUES
(42, 1, 7),
(43, 6, 9),
(44, 2, 19),
(44, 5, 20),
(45, 5, 20);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDM` int NOT NULL,
  `TenDM` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaDMC` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`MaDM`, `TenDM`, `MaDMC`) VALUES
(1, 'Bé trai', 0),
(2, 'Bé gái ', 0),
(3, 'Sơ sinh', 0),
(4, 'Đồ bộ', 1),
(5, 'Giày', 1),
(6, 'Đồ bộ', 2),
(8, 'Đồ bộ', 3),
(10, 'Vớ hồng xinh xắn', 2),
(11, 'Vớ spiderman', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int NOT NULL,
  `NgayLap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TongTien` int DEFAULT '0',
  `TrangThai` set('gio-hang','chuan-bi','cho-giao','hoan-tat','khong-thanh-cong') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gio-hang',
  `MaTK` int NOT NULL,
  `MaKM` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `NgayLap`, `TongTien`, `TrangThai`, `MaTK`, `MaKM`) VALUES
(42, '2023-12-12 16:52:55', 109500, 'hoan-tat', 24, 0),
(43, '2023-12-12 16:54:21', 897000, 'hoan-tat', 24, 0),
(44, '2023-12-13 21:31:07', 796000, 'hoan-tat', 24, 0),
(45, '2023-12-17 13:01:49', 0, 'gio-hang', 24, 0);

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKM` int NOT NULL,
  `TenKM` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CodeKM` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `GiaKM` int NOT NULL,
  `SoTienToiThieu` int NOT NULL DEFAULT '0',
  `NgayBatDau` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  `SoLuong` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKM`, `TenKM`, `CodeKM`, `GiaKM`, `SoTienToiThieu`, `NgayBatDau`, `NgayKetThuc`, `SoLuong`) VALUES
(2, 'test khuyen mai111', 'km10', 10000, 0, '2023-11-25', '2023-12-28', 9834),
(16, 'Giảm giá 50%', 'km100', 100000, 0, '2023-11-28', '2024-01-06', 49988);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int NOT NULL,
  `TenSP` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `AnhSP` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoLuong` int NOT NULL,
  `LuotXem` int NOT NULL DEFAULT '0',
  `ghim` bit(2) NOT NULL DEFAULT b'0' COMMENT 'Số 1 là gim ',
  `Gia` int NOT NULL,
  `GiaGiam` int DEFAULT NULL,
  `MaDM` int NOT NULL,
  `MoTa` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `AnhSP`, `SoLuong`, `LuotXem`, `ghim`, `Gia`, `GiaGiam`, `MaDM`, `MoTa`) VALUES
(7, 'Set 2 bodysuit tam giác Ht thú cưng Animo ', 'bodysuit7png.png', 29, 3, b'01', 219000, 109500, 8, '﻿﻿﻿﻿﻿﻿Set 2 bodysuit tam giác Ht thú cưng Animo M522001 với thiết kế xinh xắn và chất liệu vải cao cấp sẽ là món đồ không thể thiếu cho các bé yêu.\r\n﻿Ưu điểm nổi bật \r\n﻿Đặc điểm thiết kế\r\n﻿. Bodysuit cho bé kiểu dáng tam giác thích hợp diện vào mùa hè; \r\n. Phần nút cài ở đũng quần giúp ba mẹ thuận tiện khi thay đồ cho bé;\r\n. Hoạ tiết hình động vật ngộ nghĩnh tạo vẻ ngoài đáng yêu, dễ thương; \r\n. Tông màu nâu trung tính rất dễ phối cùng phụ kiện.\r\nĐặc điểm chất liệu\r\n. Chất liệu 100% cotton mềm mại, co giãn tốt và thoáng khí.'),
(8, 'Bodysuit bé gái tam giác Animo ', 'bodysuit8.png', 30, 4, b'00', 190000, 99500, 6, '﻿Bodysuit bé gái tam giác Animo TX822001 (0-12M,Hồng) với chất liệu 100% cotton mềm mại, thiết kế liền thân ấm bụng là lựa chọn tuyệt vời cho các bé sơ sinh.\r\nƯu điểm nổi bật\r\nĐặc điểm thiết kế\r\n﻿. ﻿Bodysuit liền thân giúp giữ ấm bụng;\r\n. Tay áo và đũng quần được thiết kế rộng rãi cho bé thoả sức vận động mà không lo gò bò;\r\n. Kiểu may hoạ tiết nổi trải khắp bodysuit vừa hợp thời vừa thoáng khí;\r\n. Có nút cúc ở đũng quần tiện lợi, giúp ba mẹ dễ dàng thay bỉm cho bé ở tư thế nằm;\r\nĐặc điểm chất liệu\r\n. Chất liệu vải 100% Cotton: mềm mại, thoáng mát, thấm hút mồ hôi tốt;'),
(9, 'Bộ gile bé trai ngắn, bst Gấu mụp Animo ', 'boquanaobetrai1.png', 24, 4, b'01', 299000, 149500, 4, '﻿﻿﻿﻿﻿﻿Bộ gile bé trai ngắn, Bst Gấu mụp Animo HS1122062 (6M-5Y,Blue) được làm từ chất liệu vải cotton cao cấp, mang đến cảm giác thoáng mát cho bé kể cả vào những ngày nắng nóng. Đường may khéo léo, các đường nét tinh tế đem lại cho bé vẻ lịch thiệp và năng động.\r\nƯu điểm nổi bật \r\n. Thiết kế áo gile giúp bé tăng phần thanh lịch và thoả thích vui chơi không lo bị khó chịu; \r\n. Sản phẩm dễ dàng kết hợp cùng nhiều loại giày như: giày bata, giày lười, ... tạo nét cá tính cho bé yêu; \r\n. Đường may tỉ mỉ và mềm mại, không gây hằn, cấn vào da bé.'),
(11, 'Bộ cavat bé trai ngắn, bst Mèo mũm mĩm Animo ', 'boquanaobetrai3.png', 20, 5, b'01', 299000, 145000, 4, '﻿﻿﻿﻿﻿﻿﻿Bộ cavat bé trai ngắn, bst Mèo mũm mĩm Animo được làm từ vải thấm hút tốt, mềm mịn giúp bé cảm thấy thoải mái khi mặc. Sản phẩm với thiết kế thời trân, hoạ tiết đáng yêu và màu sắc nhãn nhặn giúp tăng phần năng động cho bé yêu\r\nƯu điểm nổi bật\r\nĐặc điểm thiết kế\r\n. Thiết kế ngắn tay mát mẻ, phù hợp cho bé diện vào những ngày hè;\r\n. Thiết kế thời trang, năng động cho bé trai;\r\n. Hoạ tiết đáng yêu, màu sắc nhã nhặn giúp tăng phần dễ thương cho bé;\r\n. Chỉ may mềm mịn tạo cảm giác êm, không bị cộm hay ngứa vào da bé.\r\nĐặc điểm chất liệu\r\n. Chất liệu 100% cotton cao cấp, co dãn tốt giúp bé thoả sức vận động; \r\n. Thấm hút mồ hôi tốt, giúp bé yêu thoải mái suốt ngày dài.'),
(13, 'Bộ bé trai ngắn, bst Mèo mũm mĩm Animo ', 'boquanaobetrai5.png', 30, 0, b'01', 249000, 125000, 4, '﻿﻿﻿﻿﻿﻿Bộ bé trai ngắn, bst Mèo mũm mĩm Animo được làm từ vải thấm hút tốt, mềm mịn giúp bé cảm thấy thoải mái khi mặc, dễ dàng vận động. Sản phẩm với thiết kế dễ thương, nhiều hoạ tiết đáng yêu giúp tăng thêm phần năng động cho bé.\r\nƯu điểm nổi bật\r\nĐặc điểm thiết kế\r\n. Thiết kế ngắn tay mát mẻ, phù hợp cho bé diện vào những ngày nóng bức;\r\n. Hoạ tiết dễ thương, màu sắc nhã nhặn tăng thêm phần đáng yêu cho bé;\r\n. Công nghệ in hoạ tiết chất lượng, rõ nét và bền màu; \r\n. Chỉ may mềm mịn tạo cảm giác êm, không bị cộm hay ngứa vào da bé.\r\nĐặc điểm chất liệu\r\n. Chất liệu 100% cotton cao cấp, co dãn tốt giúp bé thoả sức vận động;\r\n. Chất liệu vải mềm mịn, nâng niu làn da mỏng manh của bé.'),
(14, 'Bộ bé trai dài, bst Gấu mụp Animo ', 'boquanaobetrai6.png', 30, 0, b'00', 245000, 225000, 4, '﻿﻿﻿﻿﻿Bộ bé trai dài, bst Gấu mụp Animo HS1122065 (6M-5Y,Blue) được may từ chất liệu vải tốt, có độ bền theo thời gian. Sản phẩm có khả năng thấm hút mồ hôi và hạ thân nhiệt, giúp bé thoả sức vận động dù là ngày oi bức.\r\nƯu điểm nổi bật\r\n. Chất liệu 100% từ cotton cao cấp mang lại cảm giác dễ chịu cho bé khi mặc; \r\n. Thiết kế quần có túi tiện lợi, áo có nút cài chắc chắn giúp ba mẹ dễ thay cho bé hơn; \r\n. Hoạ tiết hình gấu tạo điểm nhấn cho sản phẩm giúp bé tăng phần dễ thương.'),
(15, 'Bộ bé trai ngắn Bst Cua sốt trứng muối Animo ', 'boquanaobetrai7.png', 30, 1, b'01', 239000, 119500, 4, '﻿﻿Bộ bé trai ngắn Bst Cua sốt trứng muối Animo HN1022088 (6M-6Y,Vàng) được làm từ vải thấm hút tốt, mềm mịn giúp bé cảm thấy thoải mái khi mặc. Sản phẩm với thiết kế dễ thương, hoạ tiết đáng yêu cùng màu sắc bắt mắt giúp tăng phần năng động cho bé.\r\nƯu điểm nổi bật\r\nĐặc điểm thiết kế \r\n. Thiết kế ngắn tay mát mẻ, phù hợp cho bé diện vào mùa hè;\r\n. Công nghệ in hoạ tiết chất lượng, rõ nét và bền màu; \r\n. Hoạ tiết dễ thương, màu sắc nổi bật tăng thêm phần năng động cho bé;\r\n. Chỉ may mềm mịn tạo cảm giác êm, không bị cộm hay ngứa vào da bé.\r\nĐặc điểm chất liệu\r\n. Chất liệu 100% cotton cao cấp, co giãn tốt giúp bé thoả sức vận động; \r\n. Vải mềm mịn nâng niu làn da mỏng manh của bé.'),
(19, 'Đầm vải bé gái có nơ Animo ', 'dambegai3.png', 28, 2, b'01', 199000, 99500, 6, '﻿﻿﻿Đầm yếm bé gái ngắn Animo TX822002 (6M-3Y, Vàng) là sản phẩm được làm từ chất liệu vải cotton cao cấp mềm mịn, an toàn cho làn da của bé yêu. Sản phẩm với thiết kế dễ thương, màu sắc tươi sáng, hoạ tiết đáng yêu sẽ là món đồ không thể thiếu cho các bé gái.\r\nƯu điểm nổi bật \r\nĐặc điểm thiết kế \r\n. Thiết kế đầm yến xinh xắn, năng động cho bé yêu;\r\n. Màu sắc tươi sáng kết hợp cùng họa tiết đáng yêu giúp bé thêm phần dễ thương, cá tính. \r\n. Đường may tinh tế, chắc chắn giúp sản phẩm có độ bền cao.\r\nĐặc điểm chất liệu\r\n. Chất liệu vải 100% Cotton cao cấp thấm hút vượt trội giúp bé thoải mái cả ngày;\r\n. Chất liệu cotton mềm nhẹ như bông, an toàn cho da bé.'),
(20, 'Đầm vải bé gái có nơ Animo ', 'dambegai4.png', 39, 17, b'00', 199000, 99500, 6, '﻿﻿﻿Đầm vải bé gái có nơ Animo TX1022025 (6M-3Y,Xanh) được may từ vải cotton cao cấp có đặc tính thấm hút mồ hôi tốt và khả năng hạ thân nhiệt giúp bé thoả sức vận động cả ngày dài mà không bị khó chịu.\r\nƯu điểm nổi bật \r\nĐặc điểm thiết kế\r\n. Kiểu dáng chữ A rộng rãi, xoè nhẹ cho bé thoải mái vận động mà không lo gò bó;\r\n. Thiết kế cổ tròn có điểm nhấn là dây nơ tăng phần nữ tính, điệu đà của bé;\r\n. Phần tay rộng rãi cho bé cảm giác thoải mái khi mặc, dễ dàng vận động;\r\n. Các đường nối, đường cuốn biên tinh tế, không gây ngứa hay cộm vào da bé.\r\nĐặc điểm chất liệu \r\n. Đầm được làm từ 100% cotton cao cấp, không chứa chất gây dị ứng hay gây ngứa;\r\n. Bề mặt vải thoáng khí, thấm hút tốt, đảm bảo không gây nóng khi mặc.'),
(21, 'Đầm vải bé gái tai thỏ Animo ', 'dambegai5.png', 0, 0, b'01', 199000, 99500, 6, 'Đầm vải bé gái tai thỏ Animo TX1122078 ﻿là sản phẩm được làm từ chất liệu vải mềm mại, được dệt từ sợi bông cao cấp nên an toàn cho làn da nhạy cảm của bé. Sản phẩm với thiết kế xinh xắn, màu sắc tươi sáng là lựa chọn phù hợp cho bé yêu.\r\nƯu điểm nổi bật\r\nĐặc điểm thiết kế \r\n\r\n. Màu sắc bắt mắt kết hợp với thiết kế hình tai thỏ đáng yêu;\r\n. Bo chun điệu đà ở hai bên cánh tay cho bé gái thêm xinh xắn.\r\nĐặc điểm chất liệu \r\n\r\n. Chất liệu vải 100% cotton mềm mại, thoáng mát, thấm hút mồ hôi tốt;\r\n\r\n. Kết cấu vải chắc chắn, bền màu và ít bị co dão sau nhiều lần giặt.'),
(23, 'Đầm vải bé gái Animo ', 'dambegai7.png', 30, 0, b'01', 219000, 109500, 6, '﻿﻿﻿﻿Đầm vải bé gái Animo TX722002 với chất liệu vải cao cấp, bền màu theo thời gian và thiết kế vô cùng đáng yêu sẽ khiến bé yêu luôn thoải mái khi mặc vào.\r\nƯu điểm nổi bật\r\nĐặc điểm thiết kế\r\n. Kiểu dáng chữ A rộng rãi, xoè nhẹ cho bé thoải mái vận động mà không lo gò bó;\r\n. Thiết kế phần cổ có hai nút khuy giúp ba mẹ thay đồ cho con dễ dàng.\r\nĐặc điểm chất liệu \r\n. Đầm được làm từ 100% cotton cao cấp, không chứa chất gây dị ứng hay gây ngứa;\r\n. Bề mặt vải thoáng khí, thấm hút tốt, đảm bảo không gây nóng khi mặc.'),
(24, 'Đầm vải bé gái thêu hoa Animo ', 'dambegai8.png', 30, 0, b'00', 199000, 99500, 6, 'Đầm vải bé gái thêu hoa Animo TX1122075 (6M-6Y, Hồng) có chất liệu vải cao cấp, thoáng mát và thấm hút mồ hôi hiệu quả giúp bé thoải mái hơn khi vận động. Sản phẩm với màu hồng nữ tính dễ dàng phối cùng nhiều phụ kiện khác để tăng thêm phần đáng yêu.\r\nƯu điểm nổi bật \r\nĐặc điểm thiết kế \r\n. Thiết kế đầm xoè phù hợp cho bé;\r\n. Đầm màu hồng với hoạ tiết hoa thêu nổi làm điểm nhấn tạo cho bé nét nữ tính, dễ thương; \r\n. Đường may tỉ mỉ, không gây hằn, cộm ngứa trên da trẻ.\r\nĐặc điểm chất liệu\r\n. Được may từ 100% cotton cao cấp vô cùng mềm mịn và thấm hút tốt đem lại cảm giác dễ chịu cho bé khi mặc.'),
(26, 'Sandal bé trai Animo ', 'giay2.jpg', 30, 0, b'00', 159000, NULL, 5, '﻿﻿Sandal bé trai Animo A2308_JK005 (19-23,Xanh) êm mềm, thoáng khí không chỉ giúp bé cảm thấy thoải mái, mà còn được thiết kế xinh xắn, dễ dàng phối cùng nhiều loại trang phục khác nhau cho bé diện.\r\nƯu điểm nổi bật \r\n. Sandal bé trai làm từ nhựa PVC cao cấp nhẹ êm và có độ đàn hồi tốt;\r\n. Phần đế mềm mại mang lại cảm giác êm ái khi bé cử động chân và bước đi; \r\n. Kiểu dáng ôm vừa vặn vào chân cho bé thỏa sức vui chơi, chạy nhảy mà không lo bị tuột;\r\n. Thiết kế đế giày nhiều đường vân nổi giúp tăng ma sát và hạn chế trơn trượt; \r\n. Phần quai dán được đính chắc chắn, dễ dàng điều chỉnh kích cỡ sao cho vừa với chân; \r\n. Họa tiết độc đáo được in sắc nét cùng màu xanh tạo nên vẻ năng động, phù hợp với các bé trai.'),
(27, 'Sandal bé trai Animo ', 'giay2.jpg', 30, 0, b'00', 195000, NULL, 5, '﻿﻿Sandal bé trai Animo A2308_JK005 (19-23,Xanh) êm mềm, thoáng khí không chỉ giúp bé cảm thấy thoải mái, mà còn được thiết kế xinh xắn, dễ dàng phối cùng nhiều loại trang phục khác nhau cho bé diện.\r\nƯu điểm nổi bật \r\n. Sandal bé trai làm từ nhựa PVC cao cấp nhẹ êm và có độ đàn hồi tốt;\r\n. Phần đế mềm mại mang lại cảm giác êm ái khi bé cử động chân và bước đi; \r\n. Kiểu dáng ôm vừa vặn vào chân cho bé thỏa sức vui chơi, chạy nhảy mà không lo bị tuột;\r\n. Thiết kế đế giày nhiều đường vân nổi giúp tăng ma sát và hạn chế trơn trượt; \r\n. Phần quai dán được đính chắc chắn, dễ dàng điều chỉnh kích cỡ sao cho vừa với chân; \r\n. Họa tiết độc đáo được in sắc nét cùng màu xanh tạo nên vẻ năng động, phù hợp với các bé trai.'),
(28, 'Sandal bé trai Animo ', 'giay3.jpg', 30, 0, b'00', 195000, NULL, 5, '﻿﻿Sandal bé trai Animo A2308_JK003 (19-23,Xanh) êm mềm, thoáng khí không chỉ giúp bé cảm thấy thoải mái, mà còn được thiết kế xinh xắn, dễ dàng phối cùng nhiều loại trang phục khác nhau cho bé diện.\r\nƯu điểm nổi bật \r\n. Sandal bé trai làm từ nhựa PVC cao cấp nhẹ êm và có độ đàn hồi tốt;\r\n. Phần đế mềm mại mang lại cảm giác êm ái khi bé cử động chân và bước đi; \r\n. Kiểu dáng ôm vừa vặn vào chân cho bé thỏa sức vui chơi, chạy nhảy mà không lo bị tuột;\r\n. Thiết kế đế giày nhiều đường vân nổi giúp tăng ma sát và hạn chế trơn trượt; \r\n. Phần quai dán được đính chắc chắn, dễ dàng điều chỉnh kích cỡ sao cho vừa với chân; \r\n. Họa tiết độc đáo phối cùng màu xanh đen làm tăng nét năng động, dễ thương cho bé trai.'),
(29, 'Sandal bé trai Animo ', 'giay1.png', 9, 8, b'01', 195000, NULL, 5, '﻿﻿Sandal bé trai Animo A2308_JK002 (19-23,Đen) êm mềm, thoáng khí không chỉ giúp bé cảm thấy thoải mái, mà còn được thiết kế xinh xắn, dễ dàng phối cùng nhiều loại trang phục khác nhau cho bé diện.\r\nƯu điểm nổi bật \r\n. Sandal bé trai làm từ nhựa PVC cao cấp nhẹ êm và có độ đàn hồi tốt;\r\n. Phần đế mềm mại mang lại cảm giác êm ái khi bé cử động chân và bước đi; \r\n. Kiểu dáng ôm vừa vặn vào chân cho bé thỏa sức vui chơi, chạy nhảy mà không lo bị tuột;\r\n. Thiết kế đế giày nhiều đường vân nổi giúp tăng ma sát và hạn chế trơn trượt; \r\n. Phần quai dán được đính chắc chắn, dễ dàng điều chỉnh kích cỡ sao cho vừa với chân; \r\n. Họa tiết lính độc đáo phù hợp cho các bé trai, làm tăng thêm nét năng động và nam tính.\r\n'),
(30, 'Sandal bé trai cao cấp Animo ', 'giay5.jpg', 26, 9, b'00', 259000, NULL, 5, '﻿﻿Sandal bé trai cao cấp Animo A2208_JK002 với chất liệu nhựa cao cấp và thiết kế vô cùng xinh xắn sẽ là món phụ kiện tô điểm thêm cho những bộ quần áo đáng yêu của bé.\r\nƯu điểm nổi bật \r\n. Thiết kế xinh xắn;\r\n. Màu sắc tươi sáng;\r\n. Chất liệu nhựa cao cấp & an toàn;\r\n. Bền chắc theo thời gian;\r\n. Siêu nhẹ và ôm vừa chân bé;\r\n. Đế dép có độ ma sát an toàn cho bé khi sử dụng.');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int NOT NULL,
  `SoDienThoai` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `MatKhau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HinhAnh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'avatar_PHU.png',
  `HoTen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Địa chỉ gioa hàng của khách hàng',
  `VaiTro` int NOT NULL DEFAULT '0' COMMENT '0: khach hang, 1: quan tri, 2: quan tri cap cao'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `SoDienThoai`, `MatKhau`, `Email`, `HinhAnh`, `HoTen`, `DiaChi`, `VaiTro`) VALUES
(12, '1234567890', 'ed2b1f468c5f915f3f1cf75d7068baae', 'user@gmail.com', 'avatar_TRINH.png', 'Nguyễn Cao Đăng Trình', '12 District Ho Chi Minh', 0),
(24, '0362078629', 'a1eaf13455a19df2f0ebf7f942dbd402', 'user10@gmail.com', 'z4978239050787_e68a90ce983d3243cb6beac4c7230118.jpg', 'NGUYEN CAO DANG TRINH', 'VIETNAM', 1),
(35, '0941024878', 'f5bb0c8de146c67b44babbf4e6584cc0', 'nem1@gmai.com', 'avatar_PHU.png', 'Nem', 'Ngã 3 YangReh', 1),
(36, '0355544297', '972255cd687214cb3945dcf42d03d6dd', 'nguyentranductrong12a5@gmail.com', 'avatar_PHU.png', 'Nguyễn Trần Đức Trọng', 'Tô Ký, Tân Xuân', 0),
(37, '0941024878', 'f5bb0c8de146c67b44babbf4e6584cc0', 'nguyen.hnam1234@gmail.com', 'avatar_PHU.png', 'nguyễn hải nam', 'Ngã 3 YangReh', 0),
(38, '0837635394', '1144ec5f2e59d4f2bb5cd2ff1310b4a6', 'phunpps30915@fpt.edu.vn', 'avatar_PHU.png', 'phú', 'Bình Thạnh', 0),
(39, '1234567890', '25d55ad283aa400af464c76d713c07ad', 'testv2@gmail.com', 'avatar_PHU.png', 'Đăng Trình', 'HCM', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MaBL`),
  ADD KEY `MaTK` (`MaTK`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaHD`,`MaSP`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `MaTK` (`MaTK`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKM`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaDM` (`MaDM`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MaBL` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDM` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MaKM` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119542;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_4` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`),
  ADD CONSTRAINT `chitiethoadon_ibfk_5` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaDM`) REFERENCES `danhmuc` (`MaDM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

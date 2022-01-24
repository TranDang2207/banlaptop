-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2021 lúc 05:41 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banlaptop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_bl` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `noidung` varchar(555) NOT NULL,
  `id_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `checkout`
--

CREATE TABLE `checkout` (
  `id_hd` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `ngay` date NOT NULL DEFAULT current_timestamp(),
  `tongtien` float NOT NULL,
  `trangthai` tinyint(1) DEFAULT 0,
  `num_oder` int(11) NOT NULL,
  `ghichu` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `checkout`
--

INSERT INTO `checkout` (`id_hd`, `id_kh`, `ngay`, `tongtien`, `trangthai`, `num_oder`, `ghichu`) VALUES
(1, 1, '2021-11-29', 106550000, 0, 5, 'buon'),
(2, 2, '2021-11-29', 2000000, 0, 3, ''),
(4, 2, '2021-11-29', 2000000, 0, 3, ''),
(7, 1, '2021-12-10', 97337000, 0, 2, 'xin 1 lần được 10 điểm'),
(8, 1, '2021-12-10', 66471500, 0, 1, ''),
(27, 1, '2021-12-10', 48480000, 0, 2, ''),
(32, 1, '2021-12-10', 23740500, 0, 1, ''),
(94, 1, '2021-12-10', 125369000, 0, 1, ''),
(95, 1, '2021-12-10', 125369000, 0, 1, ''),
(96, 1, '2021-12-10', 125369000, 0, 1, ''),
(97, 1, '2021-12-10', 125369000, 0, 1, ''),
(98, 1, '2021-12-10', 125369000, 0, 1, ''),
(99, 1, '2021-12-10', 125369000, 0, 1, ''),
(100, 1, '2021-12-10', 125369000, 0, 1, ''),
(101, 1, '2021-12-10', 125369000, 0, 1, ''),
(102, 1, '2021-12-10', 125369000, 0, 3, ''),
(103, 1, '2021-12-10', 113972000, 0, 3, ''),
(104, 1, '2021-12-11', 86970000, 0, 3, ''),
(105, 1, '2021-12-11', 106960000, 0, 3, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `checkout_detail`
--

CREATE TABLE `checkout_detail` (
  `id_hdct` int(11) NOT NULL,
  `id_hd` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `giatien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `checkout_detail`
--

INSERT INTO `checkout_detail` (`id_hdct`, `id_hd`, `id_sp`, `soluong`, `giatien`) VALUES
(1, 1, 1, 2, 46580000),
(2, 1, 2, 3, 59970000),
(68, 94, 28, 3, 119970000),
(69, 95, 28, 3, 119970000),
(70, 96, 28, 3, 119970000),
(71, 97, 28, 3, 119970000),
(72, 98, 28, 3, 119970000),
(73, 99, 28, 3, 119970000),
(74, 100, 28, 3, 119970000),
(75, 101, 28, 3, 119970000),
(76, 102, 28, 3, 119970000),
(77, 102, 2, 1, 19990000),
(78, 102, 26, 1, 21490000),
(79, 103, 28, 3, 119970000),
(80, 103, 2, 1, 19990000),
(81, 103, 26, 1, 21490000),
(82, 104, 2, 1, 19990000),
(83, 104, 28, 1, 39990000),
(84, 104, 4, 1, 26990000),
(85, 105, 2, 2, 19990000),
(86, 105, 28, 1, 39990000),
(87, 105, 4, 1, 26990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_kh` int(11) NOT NULL,
  `ten_kh` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phanquyen` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_kh`, `ten_kh`, `matkhau`, `email`, `dia_chi`, `phone`, `username`, `phanquyen`) VALUES
(1, 'Trần Thanh Đăng', '1470aad22bf0f157d732ded7518e4568', 'dangtran2207@gmail.com', '48A, đường Dương Thị Mười, phường Tân Chánh Hiệp, quận 12, Hồ Chí Minh', '0858586400', 'dangtran2207', 1),
(2, 'Nguyễn Văn Hải', '1470aad22bf0f157d732ded7518e4568', 'hainguyen@gmail.com', 'Long An', '0937458347', 'haingu', 0),
(3, 'Nguyễn Thị Hải', '25d55ad283aa400af464c76d713c07ad', 'haibede@gmail.com', 'Thái Lan', '0987654321', 'Haibede', 1),
(6, 'test', 'd41d8cd98f00b204e9800998ecf8427e', 'test@gmail.com', '8,kp5,Trung Mỹ Tây 2A, Trung Mỹ Tây, Q12', '0912345678', 'testabc', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loailaptop`
--

CREATE TABLE `loailaptop` (
  `id_loailaptop` int(11) NOT NULL,
  `ten_loailaptop` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loailaptop`
--

INSERT INTO `loailaptop` (`id_loailaptop`, `ten_loailaptop`) VALUES
(1, 'Laptop Gaming'),
(2, 'Laptop học tập');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id_loai` int(11) NOT NULL,
  `ten_loai` varchar(255) NOT NULL,
  `AnHien` tinyint(1) DEFAULT 1,
  `id_loailaptop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id_loai`, `ten_loai`, `AnHien`, `id_loailaptop`) VALUES
(1, 'Asus', 1, 1),
(2, 'Acer', 1, 1),
(3, 'Dell', 1, 1),
(4, 'Lenovo', 1, 1),
(5, 'MSI', 0, 1),
(6, 'HP', 1, 1),
(10, 'Gigabyte', 1, 1),
(14, 'LG', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `gia_goc` float NOT NULL,
  `giam_gia` float DEFAULT NULL,
  `id_loai` int(11) NOT NULL,
  `mota` longtext DEFAULT NULL,
  `AnHien` tinyint(1) NOT NULL DEFAULT 1,
  `ngayNhap` date DEFAULT current_timestamp(),
  `Slideshow` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ten_sp`, `image`, `gia_goc`, `giam_gia`, `id_loai`, `mota`, `AnHien`, `ngayNhap`, `Slideshow`) VALUES
(1, 'Laptop Gaming Asus ROG Strix G15 G513IH HN015T', 'rog_strix_g15_g513ih_hn015t_9e61847a6b8245e9ab9fa32cc2ffb6ba.png', 23490000, 23290000, 1, '<table border=\"1\" class=\"table\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<th style=\"width:20%\">CPU</th>\r\n			<td><a href=\"https://gearvn.com/collections/cpu-amd-ryzen-gen3-am4\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; max-width: 100%; font-family: Roboto, sans-serif; font-size: 16px;\" target=\"_blank\">AMD</a><span style=\"font-family:roboto,sans-serif; font-size:16px\">&nbsp;Ryzen R7-4800H 2.9GHz up to 4.2GHz, 8 cores 16 threads</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">RAM</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">8GB DDR4 3200MHz&nbsp;(2x SO-DIMM socket)</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Ổ lưu trữ:</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">512GB M.2 NVMe&trade; PCIe&reg; 3.0 SSD</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Card đồ họa</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">NVIDIA Geforce GTX 1650 4GB GDDR6</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">M&agrave;n h&igrave;nh</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">15.6 inch FHD (1920 x 1080) IPS, Non-Glare, 144Hz AdaptiveSync, Nanoedge</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">B&agrave;n ph&iacute;m</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">4 Zone RGB</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Audio</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">Smart AMP technology</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Đọc thẻ nhớ</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">None</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Kết nối c&oacute; d&acirc;y (LAN)</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">10/100/1000 Base T</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Kết nối kh&ocirc;ng d&acirc;y</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">Intel&nbsp;802.11ax (2x2) Wi-Fi 6 (Gig+), Bluetooth v5.1</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Webcam</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">None</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Cổng giao tiếp</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">1x&nbsp;</span><a href=\"https://gearvn.com/collections/cap-typec\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; max-width: 100%; font-family: Roboto, sans-serif; font-size: 16px;\" target=\"_blank\">Type C</a><span style=\"font-family:roboto,sans-serif; font-size:16px\">&nbsp;USB 3.2 Gen 1 with Power Delivery and Display Port</span><br />\r\n			<span style=\"font-family:roboto,sans-serif; font-size:16px\">3x USB 3.2 Gen 1 Type-A</span><br />\r\n			<span style=\"font-family:roboto,sans-serif; font-size:16px\">1x&nbsp;3.5mm&nbsp;Combo&nbsp;Audio&nbsp;Jack</span><br />\r\n			<span style=\"font-family:roboto,sans-serif; font-size:16px\">1x HDMI 2.0b</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Hệ điều h&agrave;nh</th>\r\n			<td><a href=\"https://gearvn.com/collections/windows-10-home\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; max-width: 100%; font-family: Roboto, sans-serif; font-size: 16px;\">Windows 10 Home</a></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Pin</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">4 Cell 56WHrs</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Trọng lượng</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">2.1 kg</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">K&iacute;ch thước</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">35.4(W) x 25.9(D) x 2.26 ~ 2.72(H) cm</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">M&agrave;u sắc</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">Eclipse Gray</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Bảo mật</th>\r\n			<td><span style=\"font-family:roboto,sans-serif; font-size:16px\">None</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h2><span style=\"font-size:22px\"><strong>Đ&aacute;nh gi&aacute; chi tiết&nbsp;Laptop Gaming Asus ROG Strix G15 G513IH HN015T</strong></span></h2>\r\n\r\n<div id=\"mainframe\" style=\"box-sizing: border-box; font-family: \">\r\n<h3><strong><span style=\"font-size:20px\">Kiểu d&aacute;ng mạnh mẽ</span></strong></h3>\r\n\r\n<p><span style=\"font-size:18px\">Phong c&aacute;ch thể thao thể hiện qua ba m&agrave;u sắc kh&aacute;c biệt gi&uacute;p n&acirc;ng tầm diện mạo v&agrave; phong c&aacute;ch của bạn. Những phi&ecirc;n bản với m&agrave;u đen nguy&ecirc;n bản Original Black, x&aacute;m cực chất Eclipse Gray, v&agrave; Electro Punk rực rỡ sẽ thể hiện phong c&aacute;ch của bạn. Chơi game tại bất kỳ đ&acirc;u với khung m&aacute;y c&oacute; k&iacute;ch thước nhỏ hơn đến 7% v&agrave; gọn nhẹ hơn những thế hệ tiền nhiệm. Những biểu tượng v&agrave; đường cắt tinh tế t&ocirc; điểm b&ecirc;n ngo&agrave;i m&aacute;y v&agrave; thậm ch&iacute; th&ecirc;m phần thu h&uacute;t ở phần đế m&aacute;y, tạo điểm nhấn kh&aacute;c biệt từ mọi g&oacute;c độ. L&agrave;m bừng s&aacute;ng cho m&ocirc;i trường xung quanh bạn với hệ thống Aura Sync nổi bật từ logo kim loại của ROG, dọc b&agrave;n ph&iacute;m c&oacute; đ&egrave;n nền tới dải đ&egrave;n chiếu s&aacute;ng ở mặt đ&aacute;y.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://product.hstatic.net/1000026716/product/02_strixg_15_grey_l_b33b3e528c024d20839282ac2258c0b0.png\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><strong><span style=\"font-size:20px\">H&atilde;y tỏa s&aacute;ng</span></strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\">Cuộc sống bừng s&aacute;ng với RGB. Dải đ&egrave;n chiếu s&aacute;ng được thiết kế gi&uacute;p tăng cường mật độ đ&egrave;n LED, nhằm tạo n&ecirc;n hiệu ứng &aacute;nh s&aacute;ng tinh tế hơn ở mặt đ&aacute;y. C&aacute; nh&acirc;n h&oacute;a c&agrave;i đặt Aura Sync để thiết lập chế độ chơi game l&yacute; tưởng tr&ecirc;n to&agrave;n hệ sinh th&aacute;i c&aacute;c thiết bị tương th&iacute;ch.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://product.hstatic.net/1000026716/product/08_strixg_15_grey_l_4f72fd47352f45648c5f16aa7a1ac581.png\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><strong><span style=\"font-size:20px\">Diện mạo thể thao cuốn h&uacute;t</span></strong></h3>\r\n\r\n<p><span style=\"font-size:18px\">Từ nắp phủ nh&ocirc;m tới kết cấu độc đ&aacute;o ở mặt đ&aacute;y, chiếc laptop n&agrave;y l&agrave; sự tổng h&ograve;a của khả năng hoạt động bền bỉ v&agrave; phong c&aacute;ch mạnh mẽ. Phần nắp kim loại chống va đập đồng thời mang lại phần viền mỏng hơn. Chiếu nghỉ tay phủ nhung soft-touch gi&uacute;p duy tr&igrave; cảm gi&aacute;c dễ chịu, m&aacute;t mẻ khi tiếp x&uacute;c, ph&ugrave; hợp cho những phi&ecirc;n chơi game k&eacute;o d&agrave;i. V&agrave; phần r&atilde;nh cắt ngang ở đ&aacute;y m&aacute;y gi&uacute;p cố định m&aacute;y trong qu&aacute; tr&igrave;nh chơi v&agrave; cầm chắc tay hơn khi di chuyển.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://product.hstatic.net/1000026716/product/11_strixg_15_grey_l_addd2ae810814df6b5d6fb94bb04e6bb.png\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><strong><span style=\"font-size:20px\">K&iacute;ch cỡ nhỏ hơn</span></strong></h3>\r\n\r\n<p><span style=\"font-size:18px\">D&ograve;ng sản phẩm Strix mới đem tới sức mạnh chơi game ấn tượng trong khung m&aacute;y nhỏ gọn hơn. Đối với c&aacute;c model 15-inch, k&iacute;ch thước nhỏ hơn 7% so với thế hệ tiền nhiệm trong khi c&aacute;c phi&ecirc;n bản 17-inch nhỏ hơn 5%. Khung m&aacute;y nhỏ v&agrave; gọn cho ph&eacute;p việc chơi game ở bất kỳ đ&acirc;u dễ d&agrave;ng hơn bao giờ hết. N&oacute; cũng mang lại tỷ lệ m&agrave;n h&igrave;nh/ th&acirc;n m&aacute;y l&agrave; 85% với viền si&ecirc;u mỏng, mang lại trải nghiệm chơi game đắm ch&igrave;m hơn.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://product.hstatic.net/1000026716/product/01_strixg_15_grey_0b72c5f88cbc4dc991be35ba30a65f70.png\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><strong><span style=\"font-size:20px\">B&agrave;n di chuột lớn hơn</span></strong></h3>\r\n\r\n<p><span style=\"font-size:18px\">B&agrave;n di chuột mạnh mẽ với diện t&iacute;ch lớn hơn 85% so với thế hệ trước mang lại sự thuận tiện trong sử dụng h&agrave;ng ng&agrave;y. Nhiều kh&ocirc;ng gian hơn tức l&agrave; độ ch&iacute;nh x&aacute;c cao hơn c&ugrave;ng với c&aacute;c động t&aacute;c v&agrave; thao t&aacute;c b&agrave;n tay thoải m&aacute;i hơn trong qu&aacute; tr&igrave;nh sử dụng. B&agrave;n di chuột cứng được phủ lớp ho&agrave;n thiện nh&aacute;m mang lại cảm gi&aacute;c khỏe khoắn v&agrave; mượt m&agrave; như lụa.</span></p>\r\n</div>\r\n', 1, '2021-11-21', 1),
(2, 'Laptop Gaming Acer Aspire 7 A715 42G R1SB', 'gearvn-laptop-gaming-acer-aspire-7-a715-42g-r1sb-1.jpg', 19990000, NULL, 2, '<table border=\"1\" class=\"table\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<th style=\"width:20%\">CPU</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">RAM</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Ổ lưu trữ:</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Card đồ họa</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">M&agrave;n h&igrave;nh</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">B&agrave;n ph&iacute;m</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Audio</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Đọc thẻ nhớ</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Kết nối c&oacute; d&acirc;y (LAN)</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Kết nối kh&ocirc;ng d&acirc;y</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Webcam</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Cổng giao tiếp</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Hệ điều h&agrave;nh</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Pin</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Trọng lượng</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">K&iacute;ch thước</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">M&agrave;u sắc</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Bảo mật</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h2>Đ&aacute;nh gi&aacute; chi tiết</h2>\r\n', 1, '2021-11-22', 1),
(3, 'Laptop Gaming Dell Alienware M15 R6 P109F001BBL', 'laptop_gaming_dell_alienware_m15_r6_p109f004bbl_e9c1f4cdd3d24a238442333904656ec1.jpg', 61990000, NULL, 3, '', 1, '2021-11-15', 0),
(4, 'Laptop Lenovo IdeaPad 5 Pro 16ACH6 82L50082VN', 'lenovo_ideapad_5_pro_16ach6_82l50082vn_aff30af2d5c74428a3e50913216f3d73.jpg', 26990000, NULL, 4, '', 1, '2021-11-22', 1),
(26, 'Laptop ASUS TUF Gaming F15 FX506LH HN002T', 'hn002t_9702ad2e89f442ca838f4daeb978d93a.png', 21990000, 21490000, 1, '<table border=\"1\" class=\"table\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<th style=\"width:20%\">CPU</th>\r\n			<td><span style=\"font-family:roboto,sans-serif\">Intel Core i5-10300H 2.5GHz up to 4.5GHz 8MB</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">RAM</th>\r\n			<td><span style=\"font-family:roboto,sans-serif\">8GB DDR4 2933MHz (2 khe ram , n&acirc;ng cấp tối đa&nbsp;32GB RAM)</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Ổ Cứng:</th>\r\n			<td><span style=\"font-family:roboto,sans-serif\">512GB SSD M.2 PCIE&nbsp;G3X2, 1 khe&nbsp; SATA3 2.5&quot;</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Card đồ họa</th>\r\n			<td><span style=\"font-family:roboto,sans-serif\">NVIDIA GeForce GTX 1650 4GB GDDR6 + Đồ họa Intel&reg; UHD</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">M&agrave;n h&igrave;nh</th>\r\n			<td><span style=\"font-family:roboto,sans-serif\">15,6 &quot;FHD (1920 x 1080) IPS, 144Hz, g&oacute;c nh&igrave;n rộng, 250nits, viền mỏng chống&nbsp;l&oacute;a với 45% NTSC, 63% sRGB</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\"><strong>Cổng giao tiếp</strong></th>\r\n			<td><span style=\"font-family:roboto,sans-serif\">2x Cổng&nbsp;USB 3.1 (Gen 1)</span><br />\r\n			<span style=\"font-family:roboto,sans-serif\">1x Cổng&nbsp;USB2.0</span><br />\r\n			<span style=\"font-family:roboto,sans-serif\">1x Cổng&nbsp;RJ-45 LAN</span><br />\r\n			<span style=\"font-family:roboto,sans-serif\">1x HDMI 2.0B<br />\r\n			1x giắc&nbsp;&acirc;m thanh 3.5 mm combo micro</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\"><span style=\"background-color:rgb(247, 247, 247); font-family:roboto,sans-serif\">&Acirc;m thanh</span></th>\r\n			<td><span style=\"color:rgb(0, 0, 0); font-family:roboto,sans-serif\">DTS:X&reg; Ultra</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\"><span style=\"background-color:rgb(247, 247, 247); color:rgb(0, 0, 0); font-family:roboto,sans-serif\">B&agrave;n ph&iacute;m</span></th>\r\n			<td><span style=\"color:rgb(0, 0, 0); font-family:roboto,sans-serif\">1-Zone RGB</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Kết nối c&oacute; d&acirc;y (LAN)</th>\r\n			<td><span style=\"color:rgb(0, 0, 0); font-family:roboto,sans-serif\">10/100/1000/Gigabits Base T</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Kết nối kh&ocirc;ng d&acirc;y</th>\r\n			<td>\r\n			<p><span style=\"color:rgb(0, 0, 0); font-family:roboto,sans-serif\">802.11AX (2X2)</span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Webcam</th>\r\n			<td><span style=\"background-color:rgb(247, 247, 247); color:rgb(0, 0, 0); font-family:roboto,sans-serif\">Bluetooth</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\"><span style=\"background-color:rgb(247, 247, 247); color:rgb(0, 0, 0); font-family:roboto,sans-serif\">Bluetooth</span></th>\r\n			<td><span style=\"color:rgb(0, 0, 0); font-family:roboto,sans-serif\">v5.0</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Hệ điều h&agrave;nh</th>\r\n			<td><span style=\"color:rgb(0, 0, 0); font-family:roboto,sans-serif\">Windows 10 Home</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Pin</th>\r\n			<td><span style=\"color:rgb(0, 0, 0); font-family:roboto,sans-serif\">3 Cell 48WHr</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Trọng lượng</th>\r\n			<td><span style=\"color:rgb(0, 0, 0); font-family:roboto,sans-serif\">2.2 kg</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">K&iacute;ch thước</th>\r\n			<td><span style=\"font-family:roboto,sans-serif\">360 x 262 x 25,8 ~ 26,9 cm</span></td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">M&agrave;u sắc</th>\r\n			<td><span style=\"color:rgb(0, 0, 0); font-family:roboto,sans-serif\">Gun Metal</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h2><span style=\"font-size:22px\"><strong>Đ&aacute;nh gi&aacute; chi tiết laptop ASUS TUF Gaming F15 FX506LH HN002T</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong><span style=\"font-size:20px\">Đẳng cấp chiến binh nổi trội</span></strong></h3>\r\n\r\n<p><span style=\"font-size:18px\">Laptop cao cấp vượt trội với CPU Intel Core i5-10300H&nbsp;v&agrave;&nbsp;GPU GeForce GTX&trade; 1650&nbsp;mạnh mẽ, c&aacute;c tựa game h&agrave;nh động sẽ chạy nhanh, mượt m&agrave; v&agrave; khai th&aacute;c tối đa m&agrave;n h&igrave;nh&nbsp;IPS&nbsp;tần số qu&eacute;t&nbsp;144Hz. Mặc d&ugrave; c&oacute; khung m&aacute;y di động v&agrave; nhỏ hơn so với thế hệ tiền nhiệm, chiếc laptop n&agrave;y vẫn c&oacute;&nbsp;dung lượng pin (48Wh/90Wh) cho thời lượng pin d&agrave;i. Hệ thống tản nhiệt tự l&agrave;m sạch hiệu quả kết hợp với độ bền đạt chuẩn qu&acirc;n đội của TUF gi&uacute;p chiếc m&aacute;y trở th&agrave;nh chiến binh bền bỉ đ&aacute;ng tin cậy cho c&aacute;c game thủ.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-asus-tuf-gaming-f15-fx506lh-hn002t-01_148f72df293848fba0e28096eaa316db.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><span style=\"font-size:20px\"><strong>Hiệu năng cực&nbsp;đỉnh cho mọi t&aacute;c vụ</strong></span></h3>\r\n\r\n<p><span style=\"font-size:18px\">Trang bị sức mạnh để giải quyết mọi t&aacute;c vụ. Laptop mang đến hiệu năng tin cậy để chơi game, ph&aacute;t trực tiếp v&agrave; thực hiện mọi hoạt động. CPU Intel i5 tốc độ cao c&oacute; thể k&iacute;ch hoạt nhiều&nbsp;luồng để xử l&yacute; đa nhiệm nặng. Kết hợp với&nbsp;card m&agrave;n h&igrave;nh&nbsp;GTX&trade; 1650, m&aacute;y c&oacute; thể đ&aacute;p ứng tốc độ khung h&igrave;nh cao của nhiều tựa game phổ biến. Tăng tốc độ tải ứng dụng với ổ SSD 512GB NVMe PCIe&reg; v&agrave; dễ d&agrave;ng n&acirc;ng cấp khả năng lưu trữ với ổ SSD thứ hai.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-asus-tuf-gaming-f15-fx506lh-hn002t-02_0789de19a24f4f1db1f1ab3175569840.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><span style=\"font-size:20px\"><strong>Pin l&acirc;u hơn</strong></span></h3>\r\n\r\n<p><span style=\"font-size:18px\">Mặc d&ugrave; c&oacute; khung m&aacute;y nhỏ hơn v&agrave; nhẹ hơn so với thế hệ trước,&nbsp;ASUS TUF Gaming F15&nbsp;c&oacute; pin lớn hơn v&agrave; tuổi thọ pin d&agrave;i hơn. Đ&acirc;y l&agrave;&nbsp;laptop gaming&nbsp;được trang bị bộ xử l&yacute; Intel hiệu suất sử dụng năng lượng cao v&agrave; pin dung lượng 48WHr.&nbsp;Nhẹ hơn v&agrave; thời lượng pin d&agrave;i hơn, bạn c&oacute; thể tự do sử dụng chiếc m&aacute;y n&agrave;y khi di chuyển như mong muốn.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-asus-tuf-gaming-f15-fx506lh-hn002t-03_164b8214cf794f1494f9a7cfac04645f.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><span style=\"font-size:20px\"><strong>Thiết kế&nbsp;ấn tượng</strong></span></h3>\r\n\r\n<p><span style=\"font-size:18px\">Thiết kế&nbsp;ấn tượng,&nbsp;đậm chất gaming m&agrave; vẫn c&oacute; cảm gi&aacute;c thanh tho&aacute;t, gọn nhẹ v&agrave; bền bỉ sẽ mang lại cho bạn cảm gi&aacute;c sử dụng tối&nbsp;ưu nhất.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-asus-tuf-gaming-f15-fx506lh-hn002t-04_6d30c75837b742b5b3474cfabb8d8e62.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><span style=\"font-size:20px\"><strong>Đạt ti&ecirc;u chuẩn Qu&acirc;n&nbsp;Đội</strong></span></h3>\r\n\r\n<p><span style=\"font-size:18px\">Để xứng đ&aacute;ng với t&ecirc;n gọi&nbsp;ASUS TUF Gaming, chiếc laptop n&agrave;y phải vượt qua b&agrave;i thử nghiệm độ bền&nbsp;MIL-STD-810H. Thiết bị được thử nghiệm thả rơi, rung lắc, hoạt động trong độ ẩm v&agrave; nhiệt độ khắc nghiệt để đảm bảo độ bền. Hoạt động được trong cả những điều kiện khắc nghiệt nhất, m&aacute;y&nbsp;dễ d&agrave;ng hoạt&nbsp;động tốt trong mọi m&ocirc;i trường kh&aacute;c nhau.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-asus-tuf-gaming-f15-fx506lh-hn002t-05_55a101245143485587eebbb848b338a6.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><strong><span style=\"font-size:20px\">Chơi game với tần số qu&eacute;t cao</span></strong></h3>\r\n\r\n<p><span style=\"font-size:18px\">Trang bị m&agrave;n h&igrave;nh&nbsp;IPS&nbsp;tần số qu&eacute;t l&ecirc;n tới&nbsp;144Hz&nbsp;ho&agrave;n hảo cho c&aacute;c tựa game tốc độ cao. Với adaptive sync, tần số qu&eacute;t của m&agrave;n h&igrave;nh sẽ đồng bộ với tốc độ khung h&igrave;nh của GPU để giảm thiểu hiện tượng lag, giật h&igrave;nh v&agrave; loại bỏ x&eacute; h&igrave;nh để c&oacute; trải nghiệm chơi game si&ecirc;u mượt m&agrave; v&agrave; đắm ch&igrave;m. Dễ d&agrave;ng kết nối với một m&agrave;n h&igrave;nh b&ecirc;n ngo&agrave;i&nbsp; v&agrave; ph&aacute;t c&aacute;c bộ phim, video v&agrave; chơi game 4K Ultra HD tr&ecirc;n tivi m&agrave;n h&igrave;nh lớn qua HDMI 2.0b.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-asus-tuf-gaming-f15-fx506lh-hn002t-06_36eb516c8b664c31a9c28ed3ef285b1e.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><span style=\"font-size:20px\"><strong>B&agrave;n ph&iacute;m tuyệt vời&nbsp;để chơi game</strong></span></h3>\r\n\r\n<p><span style=\"font-size:18px\">Trang bị cho bạn b&agrave;n ph&iacute;m kiểu m&aacute;y t&iacute;nh để b&agrave;n tối ưu cho hoạt động chơi game. Đ&egrave;n nền RGB đồng bộ cho ph&eacute;p bạn thể hiện c&aacute; t&iacute;nh của m&igrave;nh trong khi ph&iacute;m WASD nổi bật gi&uacute;p bạn dễ d&agrave;ng nh&igrave;n thấy ph&iacute;m để thực hiện c&aacute;c lệnh di chuyển. C&ocirc;ng nghệ Overstroke k&iacute;ch hoạt vị tr&iacute; nhận lệnh cao hơn ở mỗi ph&iacute;m để đem lại tốc độ phản hồi nhanh hơn v&agrave; dễ điều khiển hơn. L&agrave; một sản phẩm TUF thực thụ, mỗi ph&iacute;m c&oacute; độ bền tới 20 triệu lần bấm với độ ch&iacute;nh x&aacute;c v&agrave; tin cậy l&acirc;u d&agrave;i.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-asus-tuf-gaming-f15-fx506lh-hn002t-07_ed5a8a817aed49c1a7e3b61451ea9133.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><span style=\"font-size:20px\"><strong>&Acirc;m thanh v&ograve;m s&ocirc;i&nbsp;động</strong></span></h3>\r\n\r\n<p><span style=\"font-size:18px\">Hai loa n&acirc;ng cấp với bốn &acirc;m thanh đầu ra gấp 1,8 lần v&agrave; &acirc;m bass trầm hơn 2,7 lần so với thế hệ trước để c&oacute; trải nghiệm &acirc;m thanh tuyệt vời hơn. C&ocirc;ng nghệ DTS:X&trade; đem lại &acirc;m thanh v&ograve;m ảo 7.1 cho chất lượng &acirc;m thanh như trong nh&agrave; h&aacute;t với tai nghe stereo. G&acirc;y bất ngờ cho kẻ địch nhờ khả năng nhận diện kh&ocirc;ng gian tăng cường từ hệ thống &acirc;m th&agrave;nh v&ograve;m hoặc tận thưởng nhiều lớp sắc th&aacute;i &acirc;m nhạc. T&iacute;ch hợp&nbsp;8 chế độ để nghe nhạc, xem phim v&agrave; chơi game gi&uacute;p tối ưu h&oacute;a trải nghiệm của bạn trong khi bộ c&acirc;n bằng t&iacute;ch hợp sẽ gi&uacute;p bạn điều chỉnh theo &yacute; muốn.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-asus-tuf-gaming-f15-fx506lh-hn002t-08_3451cc5e6a48488fa806ce9aea416293.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><span style=\"font-size:20px\"><strong>Tản nhiệt lu&ocirc;n m&aacute;t mẻ</strong></span></h3>\r\n\r\n<p><span style=\"font-size:18px\">Hệ thống tản nhiệt to&agrave;n diện đảm bảo laptop&nbsp;c&oacute; thể duy tr&igrave; hiệu năng cao v&agrave; t&iacute;nh hiệu quả trong v&ograve;ng đời d&agrave;i của m&igrave;nh. Nhiều ống tản nhiệt v&agrave; 3 ống dẫn nhiệt đưa nhiệt những th&agrave;nh phần quan trọng v&agrave; tản nhiệt nhanh ch&oacute;ng trong qu&aacute; tr&igrave;nh chơi game nặng. Thiết kết l&agrave;m m&aacute;t tự l&agrave;m sạch đảm bảo hệ thống tản nhiệt của thiết bị hoạt động ổn định trong thời gian d&agrave;i, trong khi chế độ hoạt động c&acirc;n bằng hiệu năng v&agrave; độ ồn cho c&aacute;c t&aacute;c vụ đang xử l&yacute;.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-asus-tuf-gaming-f15-fx506lh-hn002t-09_4c8d55806b5a4a85bda10e020b7d6a3f.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><span style=\"font-size:20px\"><strong>Dễ d&agrave;ng n&acirc;ng cấp</strong></span></h3>\r\n\r\n<p><span style=\"font-size:18px\">N&acirc;ng cấp Ram&nbsp;v&agrave; SSD&nbsp;dễ d&agrave;ng nhờ thiết kế cho ph&eacute;p bạn nhanh ch&oacute;ng tiếp cận khe bộ nhớ v&agrave; khay ổ cứng. Với một chiếc tua v&iacute;t ti&ecirc;u chuẩn, bạn c&oacute; thể dễ d&agrave;ng th&aacute;o ốc ở mặt sau khung m&aacute;y để tiến h&agrave;nh n&acirc;ng cấp. C&oacute; một chiếc ốc kiểu bật l&ecirc;n đặc biệt ở g&oacute;c mặt đ&aacute;y, gi&uacute;p bạn mở m&aacute;y ra dễ d&agrave;ng. Nhanh ch&oacute;ng n&acirc;ng cấp hoặc thay thế RAM v&agrave; tăng dung lượng ổ SSD bằng c&aacute;ch th&ecirc;m ổ cứng thứ hai.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-asus-tuf-gaming-f15-fx506lh-hn002t-10_b12edf16ccc94617b0f08abd83c34a18.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><span style=\"font-size:20px\"><strong>Đa dạng cổng kết nối</strong></span></h3>\r\n\r\n<p><span style=\"font-size:18px\">Nhiều cổng kết nối&nbsp;cho ph&eacute;p bạn kết nối tới thiết bị ưa th&iacute;ch v&agrave; bắt đầu l&agrave;m việc mọi nơi. Hai cổng USB 3.1&nbsp;cho ph&eacute;p truyền dữ liệu tốc độ cao v&agrave; th&ecirc;m một&nbsp;cổng USB 2.0 nữa để c&oacute; tổng cộng 3&nbsp;cổng kết nối đến thiết bị ngoại vi dễ d&agrave;ng. Bluetooth gi&uacute;p bạn kết nối chuột, tai nghe v&agrave; c&aacute;c thiết bị tương th&iacute;ch kh&aacute;c ở chế độ l&agrave;m việc kh&ocirc;ng d&acirc;y. Sử dụng cổng HDMI&nbsp;để kết nối tới m&agrave;n h&igrave;nh cho c&ocirc;ng việc v&agrave; giải tr&iacute; thoải m&aacute;i. Kết nối mạng nhanh ch&oacute;ng với Wi-Fi 6 802.11ax (2x2) tăng tốc&nbsp;độ giải tr&iacute; v&agrave; l&agrave;m việc tối&nbsp;ưu nhất.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-asus-tuf-gaming-f15-fx506lh-hn002t-11_2f313fa4ccdd486784ab730c7b2c33c8.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><span style=\"font-size:20px\"><strong>Phần mềm&nbsp;đi k&egrave;m th&ocirc;ng minh, dễ tuỳ biến</strong></span></h3>\r\n\r\n<p><span style=\"font-size:18px\">Armoury Crate&nbsp;hợp nhất chức năng điều khiển hệ thống v&agrave; &aacute;nh s&aacute;ng để đưa những t&ugrave;y chọn c&agrave;i đặt thiết yếu đến ngay trong tầm tay bạn trong một tiện &iacute;ch duy nhất. T&ugrave;y chọn t&ugrave;y biến cho ph&eacute;p bạn c&aacute; nh&acirc;n h&oacute;a hiệu ứng thẩm mỹ, hồ sơ game v&agrave; thay đổi thiết lập &acirc;m thanh theo sở th&iacute;ch. Với Scenario Profiles, bạn c&oacute; thể định nghĩa v&agrave; t&ugrave;y chỉnh sở th&iacute;ch để tự động điều chỉnh hiệu năng v&agrave; c&aacute;c thiết lập kh&aacute;c khi bạn khởi chạy game v&agrave; ứng dụng ưa th&iacute;ch của m&igrave;nh. Ho&agrave;n to&agrave;n kiểm so&aacute;t trải nghiệm c&aacute; nh&acirc;n của bạn.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-asus-tuf-gaming-f15-fx506lh-hn002t-12_23167a9394014330b3d85f3938faf576.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><span style=\"font-size:20px\"><strong>Lời kết :</strong></span></h3>\r\n\r\n<p><span style=\"font-size:18px\">Sản phẩm laptop cấu h&igrave;nh mạnh, hiệu năng vượt trội với m&agrave;n h&igrave;nh tần số qu&eacute;t cao l&ecirc;n&nbsp;đến 144Hz. Hỗ trợ tối&nbsp;đa cho người d&ugrave;ng c&aacute;c t&aacute;c vụ thường ng&agrave;y cũng như giải tr&iacute;, chơi game mượt m&agrave;, thoải m&aacute;i. L&agrave; sản phẩm m&agrave; bạn kh&ocirc;ng thể n&agrave;o bỏ qua khi muốn t&igrave;m kiếm cho m&igrave;nh một chiếc laptop mạnh mẽ v&agrave; hợp thời trang.</span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-asus-tuf-gaming-f15-fx506lh-hn002t-11_2f313fa4ccdd486784ab730c7b2c33c8.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '2021-11-22', 1),
(27, 'Laptop ASUS TUF Gaming F15 FX506HCB HN1138W', 'laptop_asus_tuf_gaming_f15_fx506hcb_hn1138w_e42fd1c5cf0e401d8fc1a1e3ea57a0e2.jpg', 25490000, 24990000, 1, '<table border=\"1\" class=\"table\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<th style=\"width:20%\">CPU</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">RAM</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Ổ lưu trữ:</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Card đồ họa</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">M&agrave;n h&igrave;nh</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">B&agrave;n ph&iacute;m</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Audio</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Đọc thẻ nhớ</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Kết nối c&oacute; d&acirc;y (LAN)</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Kết nối kh&ocirc;ng d&acirc;y</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Webcam</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Cổng giao tiếp</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Hệ điều h&agrave;nh</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Pin</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Trọng lượng</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">K&iacute;ch thước</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">M&agrave;u sắc</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"width:20%\">Bảo mật</th>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h2>Đ&aacute;nh gi&aacute; chi tiết</h2>\r\n', 1, '2021-11-22', 1),
(28, 'Acer Predator Helios Gaming Laptop 300 PH315 54 75YD', 'predator_helios_300_ph315_54_75yd_7183d2fdd4e643ad81182e0efe78bb9c_large.png', 39990000, 0, 2, '<table border=\"1\" cellpadding=\"3\" cellspacing=\"0\" class=\"table table-bordered\" id=\"tblGeneralAttribute\" style=\"border-collapse:collapse; border-spacing:0px; border:1px solid rgb(238, 238, 238); font-family:roboto,sans-serif; line-height:20px; margin-bottom:20px; margin-left:auto; margin-right:auto; max-width:100%; min-width:500px; width:1257.33px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Manufacturer</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Acer</span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Warranty</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">12 Months</span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">CPU</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p>Intel&reg; Core&trade; i7-11800H upto 4.60GHz, 8 core 16 threads</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">RAM</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">16GB (8x2) DDR4 3200MHz (2x SO-DIMM socket, up to 32GB SDRAM)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Hard</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p>512GB M.2 PCIE SSD (upgrade up to 2TB PCIe NVMe SSD and 2TB HDD 2.5-inch 5400 RPM)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Graphics card</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p>NVIDIA&reg; GeForce RTX&trade; 3060&nbsp;6GB GDDR6</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Monitor</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p>15.6&quot; QHD (2560 x 1440) IPS, 165Hz slim bezel LCD, Acer ComfyView LED-backlit TFT LCD, 300 nits, 100% sRGB</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Sound</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">DTS&reg; X:Ultra Audio</span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Communication gateway</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p>1 x USB Type-C USB Port 3.2 Gen 2<br />\r\n			(up to 10 Gbps) 1 x USB Port 3.2 Gen 2 ports feature USB charging off<br />\r\n			power 2 x USB port 3.2 Gen 1<br />\r\n			<br />\r\n			1 x HDMI port&reg;2.1 support HDCP<br />\r\n			<br />\r\n			1 x Mini DisplayPort Port 1.4<br />\r\n			1 x Port 3.5 mm headphone/speaker 1 x Ethernet port (RJ-45)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Read memory cards</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">None</span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">LAN Standard</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p>Killer&trade; Ethernet E2600</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">WIFI Standard</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p>KillerTM Wi-Fi 6 AX 1650i</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Bluetooth</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">v5.1</span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">Keyboard</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\"><span style=\"color:rgb(0, 0, 0)\">Led RGB 4 Zones</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Webcam</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p>Acer Crystal Eye 720p</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Operating system</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Windows 10 Home</span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Battery</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">4 Cell 59 WHr</span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Weight</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">2.3&nbsp;kg</span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Colour</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Abyssal Black</span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:rgb(247, 247, 247) !important; vertical-align:top; width:239.792px\">\r\n			<p><span style=\"color:rgb(0, 0, 0)\">Dimension</span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1016.21px\">\r\n			<p>363 (W) x 255 (D) x 22.9 (H) mm</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h2>Đ&aacute;nh gi&aacute; chi tiết</h2>\r\n\r\n<h2><strong><span style=\"font-size:22px\">Acer Predator Helios 300 PH315 Gaming Laptop Review 54 75YD</span></strong></h2>\r\n\r\n<h3><strong><span style=\"font-size:18px\">Power comes from NVIDIA GeForce RTX 3060</span></strong></h3>\r\n\r\n<p><span style=\"font-size:18px\">The RTX 3060 will deliver optimal performance for gamers and creators. The&nbsp;<a href=\"https://gearvn.com/collections/vga-card-man-hinh\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background: transparent; max-width: 100%;\">video card</a>&nbsp;is powered by NVIDIA&#39;s second-generation Ampere architecture &ndash; including new Ray Tracing technology, Tensor Core and streaming capabilities with multiprocessor processors to take a leap in performance. Acer Predator Helios 300 is equipped with NVIDIA technology &reg; Max-Q 1 for the highest performance and performance.</span></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"GEARVN.COM - Acer Predator Helios 300 PH315 Gaming Laptop 54 75YD\" src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-gaming-acer-predator-helios-300-ph315-54-75yd-1_9c882d6ead08465885660b462f5f1bd0_1024x1024.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><strong><span style=\"font-size:18px\">Powerful processing power with Intel Gen 11</span></strong></h3>\r\n\r\n<p><span style=\"font-size:18px\">Hidden deep in the Acer Predator Helios 300 monster is the Intel i7 Gen 11&nbsp;<a href=\"https://gearvn.com/collections/cpu-bo-vi-xu-ly\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background: transparent; max-width: 100%;\">CPU</a>&nbsp;with the code - 11800H. Combined with 16GB&nbsp;<a href=\"https://gearvn.com/collections/ram-pc\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background: transparent; max-width: 100%;\">of RAM,</a>the Acer Predator Helios 300 PH315 54 75YD delivers incredible processing power including a variety of work and entertainment tasks.</span></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"GEARVN.COM - Acer Predator Helios 300 PH315 Gaming Laptop 54 75YD\" src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-gaming-acer-predator-helios-300-ph315-54-75yd-2_1ac85b17e40c4a469a0fe2963f1f6dd7_1024x1024.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><strong><span style=\"font-size:18px\">AeroBlade 3D Gen 5 technology</span></strong></h3>\r\n\r\n<p><span style=\"font-size:18px\">Acer Predator Helios 300 PH315 54 75YD will offer long-term performance thanks to AeroBlade 3D Gen 5 heat dissipation technology.The new design of the 5th generation AeroBlade 3D fan helps reduce noise while increasing wind flow &ndash; allowing you to maximize your performance, No matter what task you&#39;re doing. In conjunction with CoolBoost, the radiator fan adjusts to keep the temperature balance for important areas.</span></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"GEARVN.COM - Acer Predator Helios 300 PH315 Gaming Laptop 54 75YD\" src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-gaming-acer-predator-helios-300-ph315-54-75yd-3_33494c82f27646e9869392638d7c10f0_1024x1024.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><strong><span style=\"font-size:18px\">Vortex Flow</span></strong></h3>\r\n\r\n<p><span style=\"font-size:18px\">Through the critically positioned radiator, the Acer Predator Helios 300 PH315 54 75YD optimizes airflow, increasing overall cooling and reducing the surface temperature of this huge&nbsp;<a href=\"https://gearvn.com/pages/laptop-gaming\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration-line: none; background: transparent; max-width: 100%;\">gaming laptop.</a></span></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"GEARVN.COM - Acer Predator Helios 300 PH315 Gaming Laptop 54 75YD\" src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-gaming-acer-predator-helios-300-ph315-54-75yd-4_d8e3b62d52b54b07ac0fc813c5842a95_1024x1024.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><strong><span style=\"font-size:18px\">Enhance the gaming experience</span></strong></h3>\r\n\r\n<p><span style=\"font-size:18px\">Acer Predator Helios 300 PH315 54 75YD has an QHD screen, scanning frequency reaching 165Hz and 3ms response speed to provide the best gaming experience for gamers. Also avoid ghosting and tearing the screen on Acer&#39;s child.</span></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"GEARVN.COM - Acer Predator Helios 300 PH315 Gaming Laptop 54 75YD\" src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-gaming-acer-predator-helios-300-ph315-54-75yd-5_91f3033a250b475284fd769ea0d48706_1024x1024.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><strong><span style=\"font-size:18px\">Super beautiful RGB keyboard</span></strong></h3>\r\n\r\n<p><span style=\"font-size:18px\">Honoring the gaming beauty is indispensable for the 4-zone RGB LED keyboard on acer Predator Helios 300 PH315 54 75YD, prominent on the WASD keystroke. Acer also offers two function keys: Turbo that maximizes performance instantly, and PredatorSense that opens the utility app only available on Acer Predator.</span></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"GEARVN.COM - Acer Predator Helios 300 PH315 Gaming Laptop 54 75YD\" src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-gaming-acer-predator-helios-300-ph315-54-75yd-6_8bb5cff934364b0db8932f294ae19209_1024x1024.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><strong><span style=\"font-size:18px\">A variety of gateways</span></strong></h3>\r\n\r\n<p><span style=\"font-size:18px\">The Acer Predator Helios 300 is full of USB 3.2 ports - including Thunderbolt &trade; ultra-fast USB-C 4 - that support DisplayPort and Power Delivery functionality. The latest HDMI 2.1 specs also allow you to easily plug into an external screen like 8K60, 4K120 or even 10K.</span></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"GEARVN.COM - Acer Predator Helios 300 PH315 Gaming Laptop 54 75YD\" src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-gaming-acer-predator-helios-300-ph315-54-75yd-7_7ec444f4942a48249a9b5e2edba95995_1024x1024.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><strong><span style=\"font-size:18px\">Strong online connection</span></strong></h3>\r\n\r\n<p><span style=\"font-size:18px\">Equipped with Intel &reg; Killer E2600 Ethernet and Intel &reg; Killer Wi-Fi 6 AX1650i and Control Center 2.0, you have all the tools you need to have a superior network speed that delivers a seamless experience in online games.</span></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"GEARVN.COM - Acer Predator Helios 300 PH315 Gaming Laptop 54 75YD\" src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-gaming-acer-predator-helios-300-ph315-54-75yd-8_79cedf6c9b564d4fa8e4225b8b726be0_1024x1024.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n\r\n<h3><strong><span style=\"font-size:18px\">DTS:X ULTRA</span></strong></h3>\r\n\r\n<p><span style=\"font-size:18px\">The DTS:X Ultra audio technology on the Acer Predator Helios 300 delivers a great hearing experience in titles, songs, movies.</span></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"GEARVN.COM - Acer Predator Helios 300 PH315 Gaming Laptop 54 75YD\" src=\"https://file.hstatic.net/1000026716/file/gearvn-laptop-gaming-acer-predator-helios-300-ph315-54-75yd-9_e19cf00dcd024009b940c0d8afc09ba9_1024x1024.jpg\" style=\"border:0px; box-sizing:border-box; display:block; margin:5px auto; max-width:703px; vertical-align:middle\" /></p>\r\n', 1, '2021-12-06', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `id_kh` (`id_kh`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_hd`),
  ADD KEY `id_kh` (`id_kh`);

--
-- Chỉ mục cho bảng `checkout_detail`
--
ALTER TABLE `checkout_detail`
  ADD PRIMARY KEY (`id_hdct`),
  ADD KEY `id_hd` (`id_hd`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_kh`);

--
-- Chỉ mục cho bảng `loailaptop`
--
ALTER TABLE `loailaptop`
  ADD PRIMARY KEY (`id_loailaptop`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id_loai`),
  ADD KEY `id_loailaptop` (`id_loailaptop`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_loai` (`id_loai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT cho bảng `checkout_detail`
--
ALTER TABLE `checkout_detail`
  MODIFY `id_hdct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `loailaptop`
--
ALTER TABLE `loailaptop`
  MODIFY `id_loailaptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id_kh`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Các ràng buộc cho bảng `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id_kh`);

--
-- Các ràng buộc cho bảng `checkout_detail`
--
ALTER TABLE `checkout_detail`
  ADD CONSTRAINT `checkout_detail_ibfk_1` FOREIGN KEY (`id_hd`) REFERENCES `checkout` (`id_hd`),
  ADD CONSTRAINT `checkout_detail_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Các ràng buộc cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD CONSTRAINT `loaisanpham_ibfk_1` FOREIGN KEY (`id_loailaptop`) REFERENCES `loailaptop` (`id_loailaptop`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_loai`) REFERENCES `loaisanpham` (`id_loai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

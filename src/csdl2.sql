-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2023 lúc 02:21 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csdl2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baithamluan`
--

CREATE TABLE `baithamluan` (
  `MaBaiThamLuan` varchar(7) NOT NULL,
  `TenBaiThamLuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baithamluan`
--

INSERT INTO `baithamluan` (`MaBaiThamLuan`, `TenBaiThamLuan`) VALUES
('TL1', ' Ước tính và dự báo tốc độ gió phục vụ điều khiển, vận hành và quy hoạch các nhà máy điện gió'),
('TL2', 'AI trong sản xuất');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chude`
--

CREATE TABLE `chude` (
  `MaChuDe` varchar(7) NOT NULL,
  `TenChuDe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chude`
--

INSERT INTO `chude` (`MaChuDe`, `TenChuDe`) VALUES
('CD1', 'Khoa học'),
('CD2', 'giáo dục');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvicongtac`
--

CREATE TABLE `donvicongtac` (
  `MaDonViCongtac` varchar(7) NOT NULL,
  `TenDonViCongTac` text NOT NULL,
  `Diachi` text NOT NULL,
  `sdt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donvicongtac`
--

INSERT INTO `donvicongtac` (`MaDonViCongtac`, `TenDonViCongTac`, `Diachi`, `sdt`) VALUES
('TVU', 'Đại Học Trà Vinh', 'K4.P5. TP Trà Vinh', 344524555);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvitochuc`
--

CREATE TABLE `donvitochuc` (
  `MaToChuc` varchar(7) NOT NULL,
  `Ten DonViToChuc` text NOT NULL,
  `Diachi` text NOT NULL,
  `sdt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donvitochuc`
--

INSERT INTO `donvitochuc` (`MaToChuc`, `Ten DonViToChuc`, `Diachi`, `sdt`) VALUES
('tvu', 'Đại Học Trà Vinh', '126, Nguyễn Thiện Thành, K4,P4 TV', 344524555);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` int(2) NOT NULL,
  `quoc_gia` varchar(30) NOT NULL,
  `hinh_dai_dien` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`username`, `password`, `ho_ten`, `ngay_sinh`, `gioi_tinh`, `quoc_gia`, `hinh_dai_dien`) VALUES
('anh', 'fdsf', 'sam', '2023-11-01', 0, 'vn', 'hinhanh/z3980477656014_180b5a10168546100c2d1c4ef6ef2271.jpg'),
('anh2', 'fdsf', '123', '2023-11-01', 0, 'vn', 'thumuchinhanh/z3980477656014_180b5a10168546100c2d1c4ef6ef2271.jpg'),
('anh33', 'fdsf', 'sam', '2023-11-08', 0, 'vn', 'thumuchinhanh/z3980477656014_180b5a10168546100c2d1c4ef6ef2271.jpg'),
('sam', '123', 'sam', '2023-11-01', 1, 'vn', 'hinhanh/z3980477656014_180b5a10168546100c2d1c4ef6ef2271.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoithamdu`
--

CREATE TABLE `nguoithamdu` (
  `MaNguoiThamDu` varchar(7) NOT NULL,
  `TenNguoiThamDu` text NOT NULL,
  `MaVaiTro` varchar(7) DEFAULT NULL,
  `MaPhong` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoithamdu`
--

INSERT INTO `nguoithamdu` (`MaNguoiThamDu`, `TenNguoiThamDu`, `MaVaiTro`, `MaPhong`) VALUES
('1', 'Nguyễn Bảo Ân', 'NTB', 'B21.206'),
('2', 'PGS.TS. GS.TS Nguyễn Thái Sơn', 'ct', 'B21.207'),
('3', 'Võ Duy Nhất', 'NTB', 'B21.206'),
('4', 'Thạch Lê Khiêm', 'ct', 'B21.206');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phien`
--

CREATE TABLE `phien` (
  `MaPhien` varchar(7) NOT NULL,
  `ThoiGianBatDau` datetime NOT NULL,
  `ThoiGianKetThuc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phien`
--

INSERT INTO `phien` (`MaPhien`, `ThoiGianBatDau`, `ThoiGianKetThuc`) VALUES
('PSS', '2023-07-22 13:00:00', '2023-07-22 14:00:00'),
('PĐ', '2023-07-22 08:00:56', '2023-07-22 11:45:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `presentations`
--

CREATE TABLE `presentations` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `nguoi_trinh_bay` varchar(255) NOT NULL,
  `thoi_gian_bat_dau` datetime NOT NULL,
  `MaPhong` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `presentations`
--

INSERT INTO `presentations` (`id`, `tieu_de`, `nguoi_trinh_bay`, `thoi_gian_bat_dau`, `MaPhong`) VALUES
(2, ' Ước tính và dự báo tốc độ gió phục vụ điều khiển, vận hành và quy hoạch các nhà máy điện gió', 'PGS.TS. GS.TS Đỗ Đức Tôn - Đại học Nazarbayev, Kazakhstan', '2023-07-22 09:00:00', 'B21.206'),
(3, 'AI trong sản xuất', 'Mr. Võ Duy Nhất', '2023-07-22 09:15:00', 'B21.206'),
(4, ' Tinh chỉnh giáo dục lập trình: Tích hợp các thực hành kỹ thuật phần mềm thiết yếu', 'Dr. Nguyễn Bảo Ân - Tra Vinh University', '2023-07-22 10:40:00', 'B21.206');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `MaPhong` varchar(7) NOT NULL,
  `TenPhong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`MaPhong`, `TenPhong`) VALUES
('B21.206', 'Phòng Lý Thuyết'),
('B21.207', 'Phòng Máy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `MaVaiTro` varchar(7) NOT NULL,
  `TenVaiTro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`MaVaiTro`, `TenVaiTro`) VALUES
('ct', 'Chủ tọa'),
('NTB', 'Người trình bày'),
('pb', 'Phản biện'),
('tk', 'Thư ký');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baithamluan`
--
ALTER TABLE `baithamluan`
  ADD PRIMARY KEY (`MaBaiThamLuan`);

--
-- Chỉ mục cho bảng `chude`
--
ALTER TABLE `chude`
  ADD PRIMARY KEY (`MaChuDe`);

--
-- Chỉ mục cho bảng `donvicongtac`
--
ALTER TABLE `donvicongtac`
  ADD PRIMARY KEY (`MaDonViCongtac`);

--
-- Chỉ mục cho bảng `donvitochuc`
--
ALTER TABLE `donvitochuc`
  ADD PRIMARY KEY (`MaToChuc`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `nguoithamdu`
--
ALTER TABLE `nguoithamdu`
  ADD PRIMARY KEY (`MaNguoiThamDu`),
  ADD KEY `fk_nguoithamdu_mavaitro` (`MaVaiTro`),
  ADD KEY `fk_nguoithamdu_room` (`MaPhong`);

--
-- Chỉ mục cho bảng `phien`
--
ALTER TABLE `phien`
  ADD PRIMARY KEY (`MaPhien`);

--
-- Chỉ mục cho bảng `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_presentations_room` (`MaPhong`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`MaPhong`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`MaVaiTro`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `nguoithamdu`
--
ALTER TABLE `nguoithamdu`
  ADD CONSTRAINT `fk_nguoithamdu_mavaitro` FOREIGN KEY (`MaVaiTro`) REFERENCES `vaitro` (`MaVaiTro`),
  ADD CONSTRAINT `fk_nguoithamdu_room` FOREIGN KEY (`MaPhong`) REFERENCES `room` (`MaPhong`);

--
-- Các ràng buộc cho bảng `presentations`
--
ALTER TABLE `presentations`
  ADD CONSTRAINT `fk_presentations_room` FOREIGN KEY (`MaPhong`) REFERENCES `room` (`MaPhong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2020 lúc 02:57 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_ass2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(800) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unnamed.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`id`, `name`, `position`, `email`, `img`) VALUES
(1, 'Sett Williams', 'CEO & Founder', 'williams@gmail.com', 'team1.jpg'),
(2, 'George Wilson', 'Kiến trúc sư\r\n', 'GeorgeW@gmail.com', 'team2.jpg'),
(3, 'Robert Pattinson', 'Kiến trúc sư\r\n', 'ROB@gmail.com', 'team3.jpg'),
(4, 'Noah Roberts', 'Kiến trúc sư\r\n', 'Noah_12@gmail.com', 'team4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(5) NOT NULL,
  `cost` int(15) NOT NULL,
  `category` varchar(100) NOT NULL,
  `poster` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT 'house.png',
  `title` varchar(100) NOT NULL,
  `address` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `cost`, `category`, `poster`, `content`, `img`, `title`, `address`) VALUES
(1, 1234567890, 'Villa tiền tỉ', 1, 'villa siêu rộng siêu đẹp, có gái xinh', 'nha1.jpg', 'Ngôi nhà mơ ước', '345-356 Nguyễn Thị Minh Khai, phường 5, quận 3, TP.HCM'),
(2, 1020000000, 'Villa tiền tỉ', 1, 'villa siêu rộng siêu đẹp, có gái xinh', 'nha1.jpg', 'Ngôi nhà mơ ước', '51 Mậu Thân, Phường 3, Vĩnh Long, Việt Nam'),
(3, 1020000000, 'Villa tiền tỉ', 1, 'villa siêu rộng siêu đẹp, có gái xinh', 'nha2.jpg', 'Ngôi nhà mơ ước', ''),
(4, 1020000000, 'Villa tiền tỉ', 1, 'villa siêu rộng siêu đẹp, có gái xinh', 'nha3.jpg', 'Ngôi nhà mơ ước', 'ĐH60, Cẩm Sơn, Cai Lậy, Tiền Giang, Việt Nam'),
(5, 1020000000, 'Villa tiền tỉ', 1, 'villa siêu rộng siêu đẹp, có gái xinh', 'nha4.jpg', 'Ngôi nhà mơ ước', 'Unnamed Road, Cai Lậy, Tiền Giang, Việt Nam'),
(6, 1020000000, 'Villa tiền tỉ', 1, 'villa siêu rộng siêu đẹp, có gái xinh', 'nha5.jpg', 'Ngôi nhà mơ ước', 'Lâm Phú, Ninh Sơn, Ninh Thuận, Việt Nam'),
(7, 999000000, 'Nhà cấp 1', 1, 'Còn lại gì sau ...', 'nha6.jpg', 'Ngôi nhà mơ ước', 'Sơn Xuân, Sơn Hòa, Phú Yên, Việt Nam'),
(8, 999000000, 'Nhà cấp 1', 2, 'Còn lại gì sau ...', 'nha7.jpg', 'Ngôi nhà mơ ước', 'ĐT640, Phước Quang, Tuy Phước, Bình Định, Việt Nam'),
(9, 999000000, 'Nhà cấp 1', 3, 'Còn lại gì sau ...', 'nha6.jpg', 'Ngôi nhà mơ ước', 'Unnamed Road, Phước Thắng, Tuy Phước, Bình Định, Việt Nam'),
(10, 999000000, 'Nhà cấp 4', 3, 'Còn lại gì sau ...', 'nha4.jpg', 'Ngôi nhà mơ ước', 'ĐT635, Phú Hậu, Phù Cát, Bình Định, Việt Nam'),
(11, 999000000, 'Nhà cấp 4', 3, 'Còn lại gì sau ...', 'nha8.jpg', 'Ngôi nhà mơ ước', 'QL19B, Cát Tiến, Phù Cát, Bình Định, Việt Nam'),
(12, 999000000, 'Nhà cấp 4', 4, 'Còn lại gì sau ...', 'nha1.jpg', 'Ngôi nhà mơ ước', 'QL19B, Cát Tiến, Phù Cát, Bình Định, Việt Nam'),
(13, 999000000, 'Nhà cấp 4', 4, 'Còn lại gì sau ...', 'nha3.jpg', 'Ngôi nhà mơ ước', 'ĐT640, Phù Cát, Bình Định, Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `role` int(11) NOT NULL,
  `avatar` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unnamed.png',
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `birthday`, `role`, `avatar`, `phone`, `gender`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '2018-08-16', 1, 'unnamed.png', '0964410362', 'none'),
(2, 'user1', '25d55ad283aa400af464c76d713c07ad', 'user1@gmail.com', '2020-12-03', 0, 'user1.png', '0325482639', 'male'),
(3, 'user2', '25d55ad283aa400af464c76d713c07ad', 'user2gmail.com', '2020-12-11', 0, 'user2.png', '0256461116', 'female'),
(4, 'user3', '25d55ad283aa400af464c76d713c07ad', 'user3@gmail.com', '1999-05-19', 0, 'user3.png', '0322652633', 'male'),
(5, 'user4', '25d55ad283aa400af464c76d713c07ad', 'user4@gmail.com', '2020-12-22', 0, 'user4.png', '0646345469', 'female');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

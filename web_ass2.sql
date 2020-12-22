-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2020 lúc 03:07 PM
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
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `cost` bigint(20) NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `poster` int(11) NOT NULL,
  `content` varchar(8000) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `cost`, `category`, `poster`, `content`, `img`) VALUES
(2, 1020000000, 'Villa tiền tỉ', 6, 'villa siêu rộng siêu đẹp, có gái xinh', 'img/nha1.jpg'),
(3, 1020000000, 'Villa tiền tỉ', 6, 'villa siêu rộng siêu đẹp, có gái xinh', 'img/nha2.jpg'),
(4, 1020000000, 'Villa tiền tỉ', 6, 'villa siêu rộng siêu đẹp, có gái xinh', 'img/nha3.jpg'),
(5, 1020000000, 'Villa tiền tỉ', 6, 'villa siêu rộng siêu đẹp, có gái xinh', 'img/nha4.jpg'),
(6, 1020000000, 'Villa tiền tỉ', 6, 'villa siêu rộng siêu đẹp, có gái xinh', 'img/nha5.jpg'),
(7, 999000000, 'Nhà cấp 1', 6, 'Còn lại gì sau ...', 'img/nha6.jpg'),
(8, 999000000, 'Nhà cấp 1', 6, 'Còn lại gì sau ...', 'img/nha7.jpg'),
(9, 999000000, 'Nhà cấp 1', 6, 'Còn lại gì sau ...', 'img/nha6.jpg'),
(10, 999000000, 'Nhà cấp 1', 6, 'Còn lại gì sau ...', 'img/nha4.jpg'),
(11, 999000000, 'Nhà cấp 1', 6, 'Còn lại gì sau ...', 'img/nha8.jpg'),
(12, 999000000, 'Nhà cấp 1', 6, 'Còn lại gì sau ...', 'img/nha1.jpg'),
(13, 999000000, 'Nhà cấp 1', 6, 'Còn lại gì sau ...', 'img/nha3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `birdthday` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `birdthday`, `role`) VALUES
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '30/04/1999', 0),
(7, 'user1', '25d55ad283aa400af464c76d713c07ad', 'user1@gmail.com', '30/04/1999', 1),
(8, 'user2', '25d55ad283aa400af464c76d713c07ad', 'user2@gmail.com', '30/04/1999', 1),
(9, 'user3', '25d55ad283aa400af464c76d713c07ad', 'uesr4@gmail.com', '30/04/1999', 1),
(10, 'user4', '25d55ad283aa400af464c76d713c07ad', 'user3@gmail.com', '30/04/1999', 1),
(11, 'user5', '25d55ad283aa400af464c76d713c07ad', 'user5@gmail.com', '30/04/1999', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poster` (`poster`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`poster`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

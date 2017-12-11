-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 May 2017, 14:40:28
-- Sunucu sürümü: 10.1.16-MariaDB
-- PHP Sürümü: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `users`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`id`, `comment`) VALUES
(3, 'rehterh rsthje5jm srthrjrn'),
(4, 'rehterh rsthje5jm srthrjrn'),
(5, 'rehterh rsthje5jm srthrjrn'),
(6, 'rehterh rsthje5jm srthrjrn'),
(7, 'rehterh rsthje5jm srthrjrn'),
(8, 'rehterh rsthje5jm srthrjrn'),
(9, 'rehterh rsthje5jm srthrjrn'),
(10, 'rehterh rsthje5jm srthrjrn'),
(11, 'srghethj5uj'),
(12, 'srghethj5uj'),
(13, 'srghethj5uj'),
(14, 'srghethj5uj'),
(15, 'srghethj5uj'),
(16, 'srghethj5uj'),
(17, 'srghethj5uj'),
(18, 'aefeav erhrhtgv '),
(19, 'er wt w'),
(20, 'aaaaaaaa'),
(21, 'aaaaaaaa'),
(22, 'rgthy yyyyyyy'),
(23, 'rgthy yyyyyyy'),
(24, 'denemmmm'),
(25, '111212'),
(26, 'af ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'natay', 'natay1'),
(2, 'nurullah', 'atay');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Tablo için AUTO_INCREMENT değeri `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

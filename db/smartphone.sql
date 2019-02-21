-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 Oca 2019, 02:30:42
-- Sunucu sürümü: 10.1.35-MariaDB
-- PHP Sürümü: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `smartphone`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `appoitment`
--

CREATE TABLE `appoitment` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `adress` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `contact_person` varchar(30) NOT NULL,
  `phone_type` varchar(30) NOT NULL,
  `phone_problem` varchar(30) NOT NULL,
  `phone_other` varchar(70) NOT NULL,
  `appoitment_date` varchar(50) NOT NULL,
  `appoitment_hour` varchar(30) NOT NULL,
  `technician` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `appoitment`
--

INSERT INTO `appoitment` (`id`, `name`, `surname`, `adress`, `phone`, `contact_person`, `phone_type`, `phone_problem`, `phone_other`, `appoitment_date`, `appoitment_hour`, `technician`) VALUES
(11, 'LSÅžkdaasdÅŸ', 'ÅŸlaskd', 'ÅŸaslkd', 234324, 'asdasÅŸdl', 'iPhone 7', 'Battery', 'sÅŸaldklÅŸ', 'Wed Jan 09 2019 04:19:00 GMT+0300 (GMT+03:00)', '9:00am - 10:00am', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(30) NOT NULL,
  `contact_email` varchar(30) NOT NULL,
  `contact_text` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `mark` varchar(25) NOT NULL,
  `model` varchar(25) NOT NULL,
  `screen_cost` double NOT NULL,
  `battery_cost` double NOT NULL,
  `other_parts` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `devices`
--

INSERT INTO `devices` (`id`, `mark`, `model`, `screen_cost`, `battery_cost`, `other_parts`) VALUES
(1, 'Apple', 'iPhone 6', 65, 45, 35),
(2, 'Apple', 'iPhone 6 Plus', 75, 55, 35),
(3, 'Apple', 'iPhone 6s', 65, 45, 35),
(4, 'Apple', 'iPhone 6s Plus', 70, 50, 40),
(5, 'Apple', 'iPhone 7', 85, 55, 45),
(6, 'Apple', 'iPhone 7 Plus', 125, 65, 50),
(7, 'Apple', 'iPhone 8', 135, 65, 55),
(8, 'Apple', 'iPhone 8 Plus', 145, 65, 55),
(9, 'Apple', 'iPhone X', 240, 75, 70),
(10, 'Samsung', 'S7 Edge', 345, 65, 55),
(11, 'Windows', 'Lumia', 125, 45, 76),
(12, 'Apple', 'iPhone XR', 145, 75, 85);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `disdates`
--

CREATE TABLE `disdates` (
  `id` int(11) NOT NULL,
  `datess` varchar(190) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`) VALUES
(1, 'admin', 'admin', 'info@info.com', 818522525);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `appoitment`
--
ALTER TABLE `appoitment`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `disdates`
--
ALTER TABLE `disdates`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `appoitment`
--
ALTER TABLE `appoitment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `disdates`
--
ALTER TABLE `disdates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

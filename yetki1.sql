-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Haz 2021, 09:00:59
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yetki1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `authorization`
--

CREATE TABLE `authorization` (
  `authorization_id` int(11) NOT NULL,
  `authorization_name` varchar(2000) NOT NULL,
  `authorization_color` varchar(2000) NOT NULL,
  `pages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `authorization`
--

INSERT INTO `authorization` (`authorization_id`, `authorization_name`, `authorization_color`, `pages`) VALUES
(1, 'site yöneticisi', 'primary', 'authorization_transactions'),
(2, 'site yöneticisi', 'primary', 'authorization_transactions'),
(3, 'site yöneticisi', 'primary', 'authorization_transactions,site_settings');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(2000) NOT NULL,
  `authorization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `user_name`, `authorization_id`) VALUES
(1, 'user', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `authorization`
--
ALTER TABLE `authorization`
  ADD PRIMARY KEY (`authorization_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

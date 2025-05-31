-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 12 feb 2018 om 17:52
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `forum`
--
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `category_title` varchar(64) NOT NULL,
  `category_descr` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `categories`
--

INSERT INTO `categories` (`cat_id`, `category_title`, `category_descr`) VALUES
(1, 'Coins', 'Crypto coins'),
(2, 'Mining', 'Everything there is to know about crypto mining'),
(3, 'Blockchain Dev.', 'Share your knowledge on the blockchain');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `reply_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(3) unsigned NOT NULL,
  `subcategory_id` int(3) unsigned NOT NULL,
  `topic_id` int(3) unsigned NOT NULL,
  `user_name` varchar(16) NOT NULL,
  `comment` text NOT NULL,
  `date_posted` date NOT NULL,
  PRIMARY KEY (`reply_id`),
  KEY `category_id` (`category_id`,`subcategory_id`,`topic_id`),
  KEY `subcategory_id` (`subcategory_id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `subcat_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(3) unsigned NOT NULL,
  `subcategory_title` varchar(128) NOT NULL,
  `subcategory_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`subcat_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `subcategories`
--

INSERT INTO `subcategories` (`subcat_id`, `parent_id`, `subcategory_title`, `subcategory_desc`) VALUES
(1, 1, 'Bitcoins', 'Everything about BTC'),
(2, 2, 'Hardware', 'Simple beginners guide'),
(3, 1, 'Ethereum', 'Ethereum mining'),
(4, 1, 'Litecoin', 'LTC');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(3) unsigned NOT NULL,
  `subcategory_id` int(3) unsigned NOT NULL,
  `user_name` varchar(16) NOT NULL,
  `topic_title` varchar(128) NOT NULL,
  `topic_content` text NOT NULL,
  `date_posted` date NOT NULL,
  `views` int(5) unsigned NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `category_id` (`category_id`,`subcategory_id`),
  KEY `subcategory_id` (`subcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_date` datetime NOT NULL,
  `user_level` int(8) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name_unique` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_level`) VALUES
(1, 'root', 'b78902a9d1b9265275683e05277ed0452c083702', 'dv@22fds', '2018-02-08 17:11:10', 0),
(2, 'noob', '34bcdf98deb05825ee8f40bad4b5912df89b0b95', 'noob@halo.com', '2018-02-08 17:12:14', 0);

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_3` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`),
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`subcat_id`);

--
-- Beperkingen voor tabel `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`subcat_id`),
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`cat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

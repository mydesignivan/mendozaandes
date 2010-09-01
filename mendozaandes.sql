-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-09-2010 a las 04:25:55
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mendozaandes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` varchar(500) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('edb16fa3c0bff29a8836256e1bbae995', '127.0.0.1', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.2.8', 1283307064, 'a:6:{s:8:"users_id";s:1:"2";s:8:"username";s:5:"admin";s:5:"email";s:20:"ivan@mydesign.com.ar";s:10:"date_added";s:19:"2010-08-23 19:07:45";s:13:"last_modified";s:19:"2010-08-23 19:07:54";s:9:"logged_in";s:1:"1";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE IF NOT EXISTS `contents` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `contents`
--

INSERT INTO `contents` (`content_id`, `reference`, `title`, `content`, `date_added`, `last_modified`) VALUES
(1, 'who-whe-are', 'Who Whe Are', '<p>Mendoza Andes is the combination of 4x4 trips and wine. We offer adventure excursions in a 4x4, combined with wildlife photography, trekking, fishing, horseback riding, camping, hiking, wine, and good manners. We invite the visitor to enjoy an unforgettable experience prepared specifically for them. Explore and discover unique treasures located in the Andes. We can provide guides in the following languages:</p>\n<p><img src="/trabajos/mendozaandesv2.git/uploads/kcfinder/image/flag-argentina.png" alt="" width="32" height="32" />&nbsp; <img src="/trabajos/mendozaandesv2.git/uploads/kcfinder/image/flag-united-kingdom.png" alt="" width="32" height="32" />&nbsp; <img src="/trabajos/mendozaandesv2.git/uploads/kcfinder/image/flag-france.png" alt="" width="32" height="32" />&nbsp; <img src="/trabajos/mendozaandesv2.git/uploads/kcfinder/image/flag-netherlands.png" alt="" width="32" height="32" />&nbsp; <img src="/trabajos/mendozaandesv2.git/uploads/kcfinder/image/flag-germany.png" alt="" width="32" height="32" /></p>', '2010-08-30 17:25:37', '2010-08-30 19:11:27'),
(2, 'our-products', 'Our Products', '', '2010-08-30 17:26:13', '2010-08-30 17:26:13'),
(3, 'advise', 'Advise', '', '2010-08-30 17:27:12', '2010-08-30 17:27:12'),
(4, 'travel-tips', 'Travel Tips', '', '2010-08-30 17:27:12', '2010-08-30 17:27:12'),
(5, 'contact-us', 'Contact Us', '<div class="clear">\n<p><strong>Mendoza office:</strong><br /> Sarmiento 681 &ndash; CP 5500. Ciudad  . Mendoza . Argentina<br /> <strong>Cell:</strong> 0261-155 393304 o 0261- 156 528990<br /> <strong>Intl:</strong> (0054 9) 261 6528990<br /> <strong>Skype:</strong> Mendozaandes</p>\n<p>Monday to Friday from 9:00 AM until 8:00 PM<br /> Saturday from 9:00 AM until 8:00 PM</p>\n<p><strong>Contact:</strong> Mat&iacute;as Tarquini<br /> <strong>Cell:</strong> 0261 155-393304<br /> <strong>Email:</strong> info@mendozaandes.com</p>\n</div>', '2010-08-30 17:27:12', '2010-08-30 18:54:21'),
(6, 'footer', 'Footer', '<p><strong>Mendoza office:</strong> Sarmiento 681 &ndash; CP 5500. Ciudad  . Mendoza . Argentina<br /> <strong>Cell:</strong> 0261-155 393304 o 0261- 156 528990<br /> <strong>Intl:</strong> (0054 9) 261 6528990</p>', '2010-08-30 19:28:27', '2010-08-30 19:40:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `width` tinyint(4) NOT NULL,
  `height` tinyint(4) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `gallery`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_name` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `order` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `products`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `codegm` text NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`users_id`, `username`, `password`, `email`, `codegm`, `date_added`, `last_modified`) VALUES
(2, 'admin', '4MEt6GePFtXIXW1EHlEJ3Tecv47sl5v9DqXIJg==', 'ivan@mydesign.com.ar', '<iframe width="420" height="265" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?ie=UTF8&hl=es&msa=0&msid=113252492302745252179.00048e85c2a5df93dab75&ll=-32.888777,-68.849859&spn=0.00955,0.017982&z=15&output=embed" style="border:1px solid #D0CAC7;"></iframe>', '2010-08-23 19:07:45', '2010-08-23 19:07:54'),
(3, 'mydesignadmin', 'OrmiymWohgi/n2XcZ+6351KhtLrdq+xQctiRbQ==', 'ivan@mydesign.com.ar', '', '2010-08-23 19:09:30', '2010-08-23 19:09:33');

-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-09-2010 a las 19:51:01
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.3.0

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
('751ab2e3a743f8f17ace6d83398e61fd', '127.0.0.1', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.1.9', 1283518902, ''),
('3a2736c0df767cab2feb24bcc813da33', '192.168.0.2', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.1.9', 1283518906, ''),
('49f7c55743668f45d7669910b922bc29', '192.168.0.2', 'Mozilla/5.0 (X11; U; Linux i686; en-US) AppleWebKi', 1283524072, 'a:6:{s:8:"users_id";s:1:"2";s:8:"username";s:5:"admin";s:5:"email";s:20:"ivan@mydesign.com.ar";s:10:"date_added";s:19:"2010-08-23 19:07:45";s:13:"last_modified";s:19:"2010-08-23 19:07:54";s:9:"logged_in";s:1:"1";}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcar la base de datos para la tabla `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `products_id`, `thumb`, `image`, `width`, `height`, `order`) VALUES
(1, 1, '2_12834325874c7fa08bb7202__f1_thumb.jpg', '2_12834325874c7fa08bb7202__f1.jpg', 127, 76, 1),
(2, 1, '2_12834325944c7fa09284f89__f3_thumb.jpg', '2_12834325944c7fa09284f89__f3.jpg', 127, 67, 2),
(3, 1, '2_12834326054c7fa09d64cd5__f4_thumb.jpg', '2_12834326054c7fa09d64cd5__f4.jpg', 127, 66, 3),
(4, 1, '2_12834326134c7fa0a5df2d3__f13_thumb.jpg', '2_12834326134c7fa0a5df2d3__f13.jpg', 127, 60, 4),
(5, 1, '2_12834326694c7fa0dd306b3__f5_thumb.jpg', '2_12834326694c7fa0dd306b3__f5.jpg', 127, 100, 5),
(6, 2, '2_12834377184c7fb496b1474__f1_thumb.jpg', '2_12834377184c7fb496b1474__f1.jpg', 127, 76, 1),
(7, 2, '2_12834377234c7fb49b63a39__f3_thumb.jpg', '2_12834377234c7fb49b63a39__f3.jpg', 127, 67, 2),
(8, 3, '2_12834510294c7fe89587c04__f1_thumb.jpg', '2_12834510294c7fe89587c04__f1.jpg', 127, 76, 1),
(9, 3, '2_12834510364c7fe89c28832__f4_thumb.jpg', '2_12834510364c7fe89c28832__f4.jpg', 127, 66, 2),
(10, 3, '2_12834510504c7fe8aa8289c__f3_thumb.jpg', '2_12834510504c7fe8aa8289c__f3.jpg', 127, 67, 3),
(11, 4, '2_12834512604c7fe97ca387c__camino_1_thumb.jpg', '2_12834512604c7fe97ca387c__camino_1.jpg', 127, 100, 1),
(12, 4, '2_12834512654c7fe9815e004__f1_thumb.jpg', '2_12834512654c7fe9815e004__f1.jpg', 127, 53, 2),
(13, 4, '2_12834512694c7fe9859d37d__f3_thumb.jpg', '2_12834512694c7fe9859d37d__f3.jpg', 127, 56, 3),
(14, 5, '2_12834515174c7fea7dd4a25__f5_thumb.jpg', '2_12834515174c7fea7dd4a25__f5.jpg', 127, 75, 1),
(15, 6, '2_12834517134c7feb4131e05__f1_thumb.jpg', '2_12834517134c7feb4131e05__f1.jpg', 127, 70, 1),
(16, 7, '2_12834518884c7febf0551c1__f1_thumb.jpg', '2_12834518884c7febf0551c1__f1.jpg', 127, 69, 1),
(17, 8, '2_12834520714c7feca720172__f3_thumb.jpg', '2_12834520714c7feca720172__f3.jpg', 127, 56, 1),
(18, 8, '2_12834520754c7fecabf3143__f7_thumb.jpg', '2_12834520754c7fecabf3143__f7.jpg', 127, 55, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_name` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_width` tinyint(4) NOT NULL,
  `image_height` tinyint(4) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `color` char(7) NOT NULL,
  `order` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `products`
--

INSERT INTO `products` (`products_id`, `products_name`, `reference`, `image_name`, `image_width`, `image_height`, `description`, `content`, `color`, `order`, `date_added`, `last_modified`) VALUES
(1, 'Dakar Day Intensive', 'dakar-day-intensive', '2_12834320774c7f9e8de388c__dakar-day-intensive.jpg', 127, 68, 'We start heading towards Chile passing by the Portillos reservoir until we reach the town of Uspallata', '<p>We start heading towards Chile passing by the Portillos reservoir until we reach the town of Uspallata.  We take the same route as the original Rally Dakar 2009, reliving 92km of the adventure.  We visit the V&iacute;a Crucis where we do a 20 minute trek after which we arrive at the summit of the 7 colors where Darwin discovered the Petrified Forest and the abandoned mine "La Mendocina".  We eat lunch at 3100ms at the Cord&oacute;n del Tigre viewpoint, where we can see the majestic Aconcagua.  While returning we pass by the Villavicencio Hotel.  During the tour we will witness the native fauna such as guanacos and condors.</p>\n<p><strong><span style="text-decoration: underline;">The service includes:</span></strong></p>\n<ul>\n<li>Transportation from and to the city</li>\n<li>Guides in Spanish, English, French, Dutch, and Germany</li>\n<li>Lunch with wine</li>\n<li>4x4 vehicle</li>\n</ul>', '#AA7501', 9, '2010-09-02 10:04:36', '2010-09-02 15:44:42'),
(2, 'Dakar Day Aconcagua', 'dakar-day-aconcagua', '2_12834377334c7fb4a596cad__dakar-day-aconcagua.jpg', 127, 68, 'We start heading towards Chile passing by the Portillos reservoir until we reach the town of Uspallata', '<p>We start heading towards Chile passing by the Portillos reservoir until we reach the town of Uspallata.&nbsp; We take 180 km of the same route that is used by the Dakar Rally.&nbsp; We arrive at the Aconcagua National Park where we start our trek to Laguna Horcones, a panoramic viewpoint where we can see the south face of Aconcagua and its summit at 6986 m.&nbsp; We continue on our way in our 4x4 and we climb to 4000m until we arrive at the Cristo Redentor, on the border between Argentina and Chile.&nbsp; Once we return to our vehicle we head to have lunch in the town of Las Cuevas where we enjoy a typical mountain lunch, then relax and enjoy the view from the restaurant.&nbsp; We then head to the famous Puente del Inca where we observe the artisan market and the magnificent view of the impressive bridge.&nbsp; The day is almost over and we return to the city of Mendoza.</p>\n<p><strong>The service includes: </strong></p>\n<ul>\n<li>Transportation from and to the city</li>\n<li>Guides in Spanish, English, French, Dutch, and Germany</li>\n<li>Lunch</li>\n<li>Adventure Insurance</li>\n<li>4x4 vehicle</li>\n</ul>', '#81B6DE', 7, '2010-09-02 11:29:10', '2010-09-02 15:30:27'),
(3, 'Dakar ATV Intensive', 'dakar-atv-intensive', '2_12834509944c7fe87299c52__dakar-atv-intensive.jpg', 127, 68, 'We head to the Cristo de los Cerros, located in the town of Tunuyan, a panoramic viewpoint of the Cordón del Plata', '<p>We head to the Cristo de los Cerros, located in the town of Tunuyan, a panoramic viewpoint of the Cord&oacute;n del Plata, by way of the town El Salto whose name comes from the mountain that it is located beneath.&nbsp; The circuit starts in a 4x4 in order to see the best views of the Cord&oacute;n del Plata. We climb in our vehicle until we reach 1800 m, where we can see the imposing Volcano Tupungato, whose name was given by the Huarpes: Viewpoint of the stars, with a summit of 6800 m.&nbsp; We pass by the valley of Las Carreras, a livestock area; it is a great contrast with the rest of the pass.&nbsp; At this point we enjoy a picnic accompanied by a good Malbec wine.&nbsp; We continue our trip passing by tiny towns surrounded by streams and creeks.&nbsp; In order to conclude our day of adventure, you will do your own circuit for an hour in an ATV.&nbsp; &nbsp;<br />The service includes:</p>\n<p><br /><strong>Transportation from and to the city</strong></p>\n<ul>\n<li>Guides in Spanish, English, French, Dutch, and Germany</li>\n<li>Lunch </li>\n<li>Adventure Insurance</li>\n<li>4X4 vehicle</li>\n<li>ATV rental</li>\n</ul>', '#B7624E', 8, '2010-09-02 15:12:00', '2010-09-02 15:45:19'),
(4, 'Dakar Mix', 'dakar-mix', '2_12834511554c7fe913eafaa__dakar-mix.jpg', 127, 68, 'We leave by route 7 towards the town of Potrerillos, where we walk until we arrive at the west bank of the reservoir', '<p>We leave by route 7 towards the town of Potrerillos, where we walk until we arrive at the west bank of the reservoir where we can appreciate the reflection in the water in its totality.&nbsp; We return on our way, passing by the town of El Salto heading towards the Valle del Sol at 1800 m.&nbsp; We enjoy a welcome breakfast where we can view the high mountains before beginning our two hour ride.&nbsp; Upon finishing our ride we have lunch in a mountain hut at 3000 m, where we enjoy foods typical of the high mountain.&nbsp; Finally, we return to the town of Potrerillos in order to start our ATV tour.</p>\n<p><br /><strong>The service includes:</strong></p>\n<ul>\n<li>Transportation from and to the city</li>\n<li>Guides in Spanish, English, French, Dutch, and Germany</li>\n<li>Lunch </li>\n<li>Adventure Insurance</li>\n<li>4X4 vehicle</li>\n<li>ATV rental</li>\n</ul>', '#5D4718', 12, '2010-09-02 15:16:19', '2010-09-02 15:54:44'),
(5, 'Personalized Wine Tour', 'personalized-wine-tour', '2_12834514584c7fea4263c2b__personalized-wine-tour.jpg', 127, 68, 'We start by leaving in a 4x4 along the famous route 40, the way to the south of the Mendoza providence, then after traveling 37 km we head', '<p><strong>Uco Valley</strong><br />We start by leaving in a 4x4 along the famous route 40, the way to the south of the Mendoza providence, then after traveling 37 km we head to the west by route RT89, we arrive at Las Carreras where we can appreciate the entirety of the Uco Valley, a privileged place for the cultivation of high altitude vineyards.&nbsp; The vineyards cover the stretch from 1100 m to 1500 m.&nbsp; We visit two of the most important wineries of our providence.&nbsp; We visit one of the most important wineries of the providence; we try their wines and visit their art gallery.&nbsp; Then we travel 15 km in order to have lunch, a lunch of international caliber awaits us, which is prepared by the chef of the winery.&nbsp; Once finished with lunch we enjoy the gardens before we return back to the city of Mendoza. &nbsp;</p>\n<p><br /><strong>The service includes: </strong></p>\n<ul>\n<li>Transportation from and to the city</li>\n<li>Guides in Spanish, English, French, Dutch, and Germany</li>\n<li>Lunch </li>\n<li>Adventure Insurance</li>\n<li>Entrance to the winery</li>\n</ul>\n<p>&nbsp;<br /><br /><strong>Lujan de Cuyo</strong><br />Lujan de Cuyo is a department of the city of Mendoza where you can find the oldest and most prestigious vineyards in Argentina.&nbsp; Our tour starts by the famous route 40 to the south of the Mendoza providence, then we travel 37 km where we arrive at one of the most amazing wineries of our providence and enjoy their wines.&nbsp; After enjoying the beautiful views from the terrace of the winery, we continue on our way to have lunch in a Spanish owned winery.&nbsp; After touring the facilities and understanding the process of making wine, we enjoy lunch, where we try 4 types of wine that are paired with each plate.&nbsp; Lastly, we visit a boutique winery, where we meet the wine maker, who explains to us the process that he goes through to make his wines.&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</p>\n<p><br /><strong>The service includes: </strong></p>\n<ul>\n<li>Transportation from and to the city</li>\n<li>Guides in Spanish, English, French, Dutch, and Germany</li>\n<li>Lunch</li>\n<li>Adventure Insurance</li>\n<li>Entrance to the winery</li>\n</ul>', '#6D1444', 5, '2010-09-02 15:20:49', '0000-00-00 00:00:00'),
(6, 'Dakar Photography', 'dakar-photography', '2_12834517554c7feb6b29eee__dakar-photography.jpg', 127, 68, 'From the city we travel until the Valle del Sol where we are welcomed with a hot drink', '<p>From the city we travel until the Valle del Sol where we are welcomed with a hot drink.&nbsp; We travel in our 4x4 through the valleys in order to appreciate the virgin landscapes and photograph the flora and fauna.&nbsp; Passing through the valley we arrive in Salto where we can visit a brewery, after which we travel down to the Potrerillos reservoir, travelling by the Mendoza river and old train tracks in order to have unique views of the Andes mountain range combined with the important Mendoza river and the Potrerillos reservoir.<br /><br /><strong>The service includes: </strong></p>\n<ul>\n<li>Transportation from and to the city</li>\n<li>Guides in Spanish, English, French, Dutch, and Germany</li>\n<li>Lunch box</li>\n<li>Insurance</li>\n<li>4x4 vehicle</li>\n</ul>', '#4B8B01', 10, '2010-09-02 15:23:29', '0000-00-00 00:00:00'),
(7, 'Dakar Trekking', 'dakar-trekking', '2_12834518474c7febc71bbc8__dakar-trekking.jpg', 127, 68, 'We travel from the city to the heart of the Cordón del Plata', '<p>We travel from the city to the heart of the Cord&oacute;n del Plata.&nbsp; We arrive at our base and more than 2000 m where we are welcomed with a hot drink.&nbsp; After traveling in 4x4 until the &ldquo;puesto de las Lajas&rdquo; where we are close to an old summer settlement of the Huarpe culture. The Morteritos prairie has been a strategic location of that culture, which has left the only visible trace of the Morteritos stone.&nbsp; We begin our trek up to 2700 m passing by the path of the condor in order to be able to view them.<br /><br /><strong>The service includes: </strong></p>\n<ul>\n<li>Transportation from and to the city</li>\n<li>Guides in Spanish, English, French, Dutch, and Germany</li>\n<li>Lunch box</li>\n<li>Insurance</li>\n<li>4x4 vehicle</li>\n</ul>', '#87888A', 11, '2010-09-02 15:25:26', '0000-00-00 00:00:00'),
(8, 'Gaucho Day', 'gaucho-day', '2_12834521524c7fecf8a44e0__gaucho-day.jpg', 127, 68, 'We go to the heart of the valleys that form the Cordón del Plata, in the town of Vallecitos in order to find a true Gaucho', '<p>We go to the heart of the valleys that form the Cord&oacute;n del Plata, in the town of Vallecitos in order to find a true Gaucho.&nbsp; We share a breakfast of typical pastries and mate prepared by his wife.&nbsp; We begin the ride along a unique route leaving civilization and enjoying nature.&nbsp; The route takes us to 3000 m where we enjoy lunch in the heart of the Andes, accompanied with a bottle of Malbec.&nbsp; On this Gaucho Day you can live the Argentina customs and traditions.<br /><br /><strong>The service includes: </strong></p>\n<ul>\n<li>Transportation from and to the city</li>\n<li>Guides in Spanish, English, French, Dutch, and Germany</li>\n<li>Lunch with wine</li>\n<li>Insurance</li>\n<li>4x4 vehicle</li>\n</ul>', '#858024', 6, '2010-09-02 15:29:16', '0000-00-00 00:00:00');

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

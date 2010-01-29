-- phpMyAdmin SQL Dump
-- version 3.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 29 Sty 2010, 22:04
-- Wersja serwera: 5.1.37
-- Wersja PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `morgin`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`),
  UNIQUE KEY `link_2` (`link`),
  UNIQUE KEY `link_3` (`link`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `title`, `link`) VALUES
(1, 'Web', 'web'),
(2, 'Picture', 'picture'),
(3, 'Draw', 'draw');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `thumb` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `images`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `link` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `pages`
--

INSERT INTO `pages` (`id`, `link`, `title`, `content`, `date`) VALUES
(1, 'contact', 'Kontakt', '<table class="kontakt">\r\n					<tr>\r\n						<td>						\r\n							<b>Gg:</b> 3975885<br />\r\n							<b>Email:</b><a href="mailto:urumbumburu@gmail.com"> urumbumburu@gmail.com</a><br />\r\n						</td>\r\n						<td>\r\n						<h3>Formularz kontaktowy</h3>\r\n						Twój Email: <br/><input/><br />\r\n						Teść:<br/>\r\n						<textarea rows="5" cols="5"></textarea>\r\n						</td>\r\n					</tr>\r\n					</table>', 1262694955),
(2, 'cv', 'Curriculum Vitae', '<img src="media/images/img/cvFoto.png" width="162" height="200" alt="" class="foto"/>\n					<h3>Dane osobowe:</h3>\n					<table>\n					<tr>\n						<td style="width: 140px;">Imię i nazwisko:</td>\n						<td>Piotr Szkałuba</td>\n					</tr>\n					<tr>\n						<td>Data urodzenia:</td>\n						<td>21.06.1986</td>\n					</tr>\n					<tr>\n						<td>Telefon:</td>\n						<td>792 536 432</td>\n					</tr>\n					<tr>\n						<td>E-mail:</td>\n						<td><a href="mailto:urumbumburu@gmail.com">urumbumburu@gmail.com</a></td>\n					</tr>\n					</table>\n					<h3>Wykształcenie:</h3>\n					<table>\n					<tr>\n						<td style="width: 140px;">0.0.0000</td>\n						<td><b>Zespół szkół technicznych nr. 5 w Lublinie</b><br /> - Technik kucharz</td>\n					</tr>\n					<tr>\n						<td>2009 - Obecnie</td>\n						<td><b>Studium policealne "Kursor" w Lublinie</b><br />  - Informatyka</td>\n					</tr>\n					<tr>\n						<td>2009 - Obecnie</td>\n						<td><b>Polsko japońska wyższa szkoła technik komputerowych w Warszawie</b><br />  - Sztuka nowych mediów</td>\n					</tr>				\n					</table>\n					<h3>Doświadczenie zawodowe:</h3>\n					<table>\n					<tr>\n						<td style="width: 140px;"><b>Panorama Osiedla</b></td>\n						<td>Wolontariat pomoc w tworzeniu portalu\n						</td>\n					</tr>\n					<tr>\n						<td style="width: 140px;"><b>Freelancer</b></td>\n						<td>Cięcie stron, Webdesign, Wizytówki\n						</td>\n					</tr>\n					<tr>\n						<td><b>Ado technologies</b></td>\n						<td>Stała współpraca<br /> - Webdesign, Developer, Projektant</td>\n					</tr>\n					<tr>\n						<td><b>Gnm - audycja radiowa</b></td>\n						<td>Stała współpraca<br />- Webdesign, Developer, Reklama, Projektant </td>\n					</tr>\n					<tr>\n						<td><b>Radio Centrum</b></td>\n						<td>Stała współpraca<br />- Projektant</td>\n					</tr>\n					<tr>\n						<td><b>Komfar</b></td>\n						<td>Stała współpraca<br />- Developer</td>\n					</tr>	\n					</table>\n					<h3>Umiejętnośći:</h3>\n					<table>				\n					<tr>\n						<td style="width: 140px;"><b>Adobe Photoshop</b></td>\n						<td>Bardzo dobra znajomość \n						</td>\n					</tr>\n					<tr>\n						<td><b>Adobe ilustrator</b></td>\n						<td>Dobra znajomość</td>\n					</tr>\n					<tr>\n						<td><b>Adobe Flash</b></td>\n						<td>Dobra znajomość</td>\n					</tr>\n					<tr>\n						<td><b>XHTML, W3C</b></td>\n						<td>Bardzo dobra znajomośc \n						</td>\n					</tr>\n					<tr>\n						<td><b>Język angielski</b></td>\n						<td>Dobra znajomość</td>\n					</tr>	\n					</table>\n					<h3>Dodatkowe Informacje:</h3>\n					<table>				\n					<tr>\n						<td style="width: 140px;"><b>Prawojazdy Kat.</b></td>\n						<td>B\n						</td>\n					</tr>\n				\n					</table>\n					<h3>Hobby:</h3>\n					<b>Gotowanie</b><br />\n					<b>Jazda konna</b><br />\n					<b>Kostka rubika</b><br />\n					<div class="cb"></div>', 1263048495);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Możliwość logowania; aktywuje konto'),
(2, 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `roles_users`
--

CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `roles_users`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `nick` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `users`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `user_tokens`
--

CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `user_tokens`
--


--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(64) NOT NULL,
  `title` varchar(64) NOT NULL,
  `link` varchar(64) NOT NULL,
  `keywords` text,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `link` (`link`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7;

INSERT INTO `categories` VALUES(1, 'Strony', 'Strony internetowe', 'web', NULL);
INSERT INTO `categories` VALUES(2, 'Rysunki', 'Rysunki komputerowe', 'computer-graphics', NULL);
INSERT INTO `categories` VALUES(3, 'Do druku', 'Poligrafia', 'printings', NULL);
INSERT INTO `categories` VALUES(4, 'Ręczne', 'Ręcznie robione', 'hand-made', NULL);
INSERT INTO `categories` VALUES(5, 'Animacje', 'Animacje flash', 'flash', NULL);
INSERT INTO `categories` VALUES(6, 'WIP', 'Prace w toku', 'wip', 'work in progress, prace w toku');

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `file` varchar(64) NOT NULL,
  `attributes` text,
  `date` int(11) unsigned NOT NULL,
  `project_id` int(11) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `file` (`file`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(64) NOT NULL,
  `link` varchar(64) NOT NULL,
  `description` text,
  `file` varchar(64) default NULL,
  `priority` int(11) unsigned NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `keywords` text,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `link` (`link`,`file`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `active` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;

INSERT INTO `users` VALUES(1, 'admin', '216d9ff49da5db91ffbadc33b822f4d42c332c5e58c26fb037 ', 1);


ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

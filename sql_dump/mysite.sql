-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生日期: 2013 年 09 月 27 日 12:46
-- 伺服器版本: 5.5.32
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `mysite`
--

-- --------------------------------------------------------

--
-- 表的結構 `ci_backend_menu`
--

CREATE TABLE IF NOT EXISTS `ci_backend_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `name__1` varchar(30) NOT NULL,
  `name__2` varchar(30) NOT NULL,
  `name__3` varchar(30) NOT NULL,
  `url` varchar(0) NOT NULL,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 轉存資料表中的資料 `ci_backend_menu`
--

INSERT INTO `ci_backend_menu` (`id`, `deleted`, `name__1`, `name__2`, `name__3`, `url`, `lft`, `rgt`) VALUES
(1, 0, 'ROOT', 'ROOT', 'ROOT', '', 1, 2);

-- --------------------------------------------------------

--
-- 表的結構 `ci_base_language`
--

CREATE TABLE IF NOT EXISTS `ci_base_language` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `map` varchar(10) NOT NULL,
  `datepicker` varchar(10) NOT NULL,
  `editor` varchar(10) NOT NULL,
  `browser` varchar(10) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `jqgrid` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 轉存資料表中的資料 `ci_base_language`
--

INSERT INTO `ci_base_language` (`id`, `name`, `map`, `datepicker`, `editor`, `browser`, `deleted`, `jqgrid`) VALUES
(1, '繁', 'zh-TW', 'zh-TW', 'zh', 'zh-tw', 0, 'tw'),
(2, 'EN', 'en', '', 'en', 'en-us', 0, 'en'),
(3, '簡', 'zh-CN', 'zh-CN', 'zh-cn', 'zh-cn', 0, 'cn');

-- --------------------------------------------------------

--
-- 表的結構 `ci_meta_entity`
--

CREATE TABLE IF NOT EXISTS `ci_meta_entity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 轉存資料表中的資料 `ci_meta_entity`
--

INSERT INTO `ci_meta_entity` (`id`, `name`, `table_name`, `deleted`) VALUES
(1, 'entity', 'meta_entity', 0),
(2, 'property', 'meta_property', 0),
(3, 'type', 'meta_type', 0),
(4, 'language', 'base_language', 0),
(5, 'backend_menu', 'backend_menu', 0);

-- --------------------------------------------------------

--
-- 表的結構 `ci_meta_property`
--

CREATE TABLE IF NOT EXISTS `ci_meta_property` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `column_name` varchar(50) NOT NULL,
  `width` int(10) unsigned DEFAULT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `length` int(10) DEFAULT NULL,
  `editable` tinyint(1) NOT NULL,
  `nullable` tinyint(1) NOT NULL,
  `updatable` tinyint(1) NOT NULL,
  `multilingual` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 轉存資料表中的資料 `ci_meta_property`
--

INSERT INTO `ci_meta_property` (`id`, `parent_id`, `name`, `column_name`, `width`, `type_id`, `length`, `editable`, `nullable`, `updatable`, `multilingual`, `deleted`) VALUES
(1, 1, 'id', 'id', NULL, 1, 10, 0, 0, 0, 0, 0),
(2, 1, 'name', 'name', NULL, 2, 30, 1, 0, 1, 0, 0),
(3, 1, 'table_name', 'table_name', NULL, 2, 50, 1, 0, 1, 0, 0),
(4, 1, 'deleted', 'deleted', NULL, 3, 1, 0, 0, 0, 0, 0),
(5, 2, 'id', 'id', NULL, 1, 10, 0, 0, 0, 0, 0),
(6, 2, 'parent_id', 'parent_id', NULL, 1, 10, 0, 0, 0, 0, 0),
(7, 2, 'name', 'name', NULL, 2, 30, 1, 0, 1, 0, 0),
(8, 2, 'column_name', 'column_name', NULL, 2, 50, 1, 0, 1, 0, 0),
(9, 2, 'type_id', 'type_id', NULL, 1, 10, 1, 0, 1, 0, 0),
(10, 2, 'length', 'length', NULL, 1, 10, 1, 0, 1, 0, 0),
(11, 2, 'nullable', 'nullable', NULL, 3, 1, 1, 0, 1, 0, 0),
(12, 2, 'updatable', 'updatable', NULL, 3, 1, 1, 0, 1, 0, 0),
(13, 2, 'multilingual', 'multilingual', NULL, 3, 1, 1, 0, 1, 0, 0),
(14, 2, 'deleted', 'deleted', NULL, 3, 1, 0, 0, 0, 0, 0),
(15, 3, 'id', 'id', NULL, 1, 10, 0, 0, 0, 0, 0),
(16, 3, 'name', 'name', NULL, 2, 20, 1, 0, 1, 0, 0),
(17, 3, 'length', 'length', NULL, 1, 10, 1, 0, 1, 0, 0),
(18, 3, 'class_name', 'class_name', NULL, 2, 80, 1, 0, 1, 0, 0),
(19, 3, 'formatter', 'formatter', NULL, 2, 100, 1, 0, 1, 0, 0),
(20, 3, 'deleted', 'deleted', NULL, 3, 1, 0, 0, 0, 0, 0),
(21, 4, 'id', 'id', NULL, 1, 10, 0, 0, 0, 0, 0),
(22, 4, 'name', 'name', NULL, 2, 20, 1, 0, 1, 0, 0),
(23, 4, 'map', 'map', NULL, 2, 10, 1, 0, 1, 0, 0),
(24, 4, 'datepicker', 'datepicker', NULL, 2, 10, 1, 0, 1, 0, 0),
(25, 4, 'editor', 'editor', NULL, 2, 10, 1, 0, 1, 0, 0),
(26, 4, 'browser', 'browser', NULL, 2, 10, 1, 0, 1, 0, 0),
(27, 4, 'deleted', 'deleted', NULL, 3, 1, 0, 0, 0, 0, 0),
(28, 2, 'editable', 'editable', NULL, 3, 1, 1, 0, 1, 0, 0),
(29, 3, 'column_type', 'column_type', NULL, 2, 30, 1, 0, 1, 0, 0),
(30, 5, 'name', 'name', NULL, 2, 30, 1, 0, 1, 1, 0),
(31, 5, 'url', 'url', NULL, 6, 100, 1, 0, 1, 0, 0),
(32, 5, 'lft', 'lft', NULL, 1, 10, 0, 0, 0, 0, 0),
(33, 5, 'rgt', 'rgt', NULL, 1, 10, 0, 0, 0, 0, 0),
(34, 4, 'jqgrid', 'jqgrid', NULL, 2, 10, 1, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的結構 `ci_meta_type`
--

CREATE TABLE IF NOT EXISTS `ci_meta_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `length` int(10) unsigned DEFAULT NULL,
  `class_name` varchar(80) NOT NULL,
  `formatter` varchar(1000) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `column_type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 轉存資料表中的資料 `ci_meta_type`
--

INSERT INTO `ci_meta_type` (`id`, `name`, `length`, `class_name`, `formatter`, `deleted`, `column_type`) VALUES
(1, 'int', 10, 'int', '', 0, 'INT'),
(2, 'string', 0, 'string', '', 0, 'VARCHAR'),
(3, 'boolean', 1, 'boolean', '', 0, 'TINYINT'),
(4, 'double', 0, 'double', '', 0, 'DOUBLE'),
(5, 'text', 0, 'string', '', 0, 'TEXT'),
(6, 'url', 255, 'string', '', 0, 'VARCHAR'),
(7, 'email', 255, 'string', '', 0, 'VARCHAR');

-- --------------------------------------------------------

--
-- 表的結構 `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 轉存資料表中的資料 `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0b438055da04af539f4317318c493b3a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:23.0) Gecko/20100101 Firefox/23.0', 1379392081, ''),
('2cfca358277b0dc27ecc5ae92037dd41', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:22.0) Gecko/20100101 Firefox/22.0 FirePHP/0.7.2', 1375067771, ''),
('98a2313499e487cbbdadaaeee8d62043', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:24.0) Gecko/20100101 Firefox/24.0', 1380161649, '');

--
-- 匯出資料表的 Constraints
--

--
-- 資料表的 Constraints `ci_meta_property`
--
ALTER TABLE `ci_meta_property`
  ADD CONSTRAINT `ci_meta_property_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `ci_meta_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

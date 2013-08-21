-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生日期: 2013 年 08 月 21 日 12:44
-- 伺服器版本: 5.5.32
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫: `mysite`
--
CREATE DATABASE IF NOT EXISTS `mysite` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mysite`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 轉存資料表中的資料 `ci_meta_entity`
--

INSERT INTO `ci_meta_entity` (`id`, `name`, `table_name`, `deleted`) VALUES
(1, 'entity', 'meta_entity', 0),
(2, 'property', 'meta_property', 0);

-- --------------------------------------------------------

--
-- 表的結構 `ci_meta_property`
--

CREATE TABLE IF NOT EXISTS `ci_meta_property` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `column_name` varchar(50) NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `length` int(10) DEFAULT NULL,
  `nullable` tinyint(1) NOT NULL,
  `updatable` tinyint(1) NOT NULL,
  `multilingual` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 轉存資料表中的資料 `ci_meta_property`
--

INSERT INTO `ci_meta_property` (`id`, `parent_id`, `name`, `column_name`, `type_id`, `length`, `nullable`, `updatable`, `multilingual`, `deleted`) VALUES
(1, 1, 'id', 'id', 1, 10, 0, 0, 0, 0),
(2, 1, 'name', 'name', 2, 30, 0, 1, 0, 0),
(3, 1, 'table_name', 'table_name', 2, 50, 0, 1, 0, 0),
(4, 1, 'deleted', 'deleted', 3, 1, 0, 0, 0, 0),
(5, 2, 'id', 'id', 1, 10, 0, 0, 0, 0),
(6, 2, 'parent_id', 'parent_id', 1, 10, 0, 0, 0, 0),
(7, 2, 'name', 'name', 2, 30, 0, 1, 0, 0),
(8, 2, 'column_name', 'column_name', 2, 50, 0, 1, 0, 0),
(9, 2, 'type_id', 'type_id', 1, 10, 0, 1, 0, 0),
(10, 2, 'length', 'length', 1, 10, 0, 1, 0, 0),
(11, 2, 'nullable', 'nullable', 3, 1, 0, 1, 0, 0),
(12, 2, 'updatable', 'updatable', 3, 1, 0, 1, 0, 0),
(13, 2, 'multilingual', 'multilingual', 3, 1, 0, 1, 0, 0),
(14, 2, 'deleted', 'deleted', 3, 1, 0, 1, 0, 0);

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
('2cfca358277b0dc27ecc5ae92037dd41', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:22.0) Gecko/20100101 Firefox/22.0 FirePHP/0.7.2', 1375067771, '');

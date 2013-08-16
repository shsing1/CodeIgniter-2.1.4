-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生日期: 2013 年 08 月 15 日 10:39
-- 伺服器版本: 5.5.32
-- PHP 版本: 5.4.16

--
-- 資料庫: `mysite`
--

-- --------------------------------------------------------

--
-- 表的結構 `ci_meta_entity`
--

CREATE TABLE IF NOT EXISTS `ci_meta_entity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `class_name` varchar(80) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的結構 `ci_meta_property`
--

CREATE TABLE IF NOT EXISTS `ci_meta_property` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `column_name` varchar(50) NOT NULL,
  `nullable` tinyint(1) NOT NULL,
  `updatable` tinyint(1) NOT NULL,
  `multilingual` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

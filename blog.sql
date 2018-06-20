-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-06-20 10:03:06
-- 服务器版本： 5.7.21
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `blog_menu`
--

DROP TABLE IF EXISTS `blog_menu`;
CREATE TABLE IF NOT EXISTS `blog_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(15) NOT NULL COMMENT '名称',
  `ico` varchar(20) NOT NULL COMMENT '图标',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '菜单ID，父id',
  `addtime` int(11) NOT NULL COMMENT '时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态，1为允许，0为禁止',
  `url` varchar(20) NOT NULL COMMENT '菜单路由',
  `token` varchar(32) NOT NULL COMMENT '修改检验值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_menu`
--

INSERT INTO `blog_menu` (`id`, `name`, `ico`, `pid`, `addtime`, `status`, `url`, `token`) VALUES
(4, 'gd', 'ff', 2, 1529402615, 1, 'fdd', '1'),
(5, 'admin', 'ambulance', 0, 1529485461, 1, 'menu/edit', '14487c907fb189c919635ae989a5fb93');

-- --------------------------------------------------------

--
-- 表的结构 `blog_user`
--

DROP TABLE IF EXISTS `blog_user`;
CREATE TABLE IF NOT EXISTS `blog_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(10) NOT NULL COMMENT '用户名',
  `phone` int(11) NOT NULL COMMENT '手机',
  `qq` bigint(20) NOT NULL COMMENT 'qq号',
  `adddate` int(11) NOT NULL COMMENT '添加时间',
  `ip` int(11) NOT NULL COMMENT '登录IP',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态:1允许，0，禁止',
  `password` varchar(20) NOT NULL COMMENT '密码',
  `token` varchar(10) NOT NULL COMMENT '密码加密值',
  `password_check` char(32) NOT NULL COMMENT '密码检测',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_user`
--

INSERT INTO `blog_user` (`id`, `name`, `phone`, `qq`, `adddate`, `ip`, `status`, `password`, `token`, `password_check`) VALUES
(1, 'admin', 11, 11, 1528450811, 1, 1, 'admin', '123457654', '8bfbd635c12351a9e8299ad52dc7fe2a');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

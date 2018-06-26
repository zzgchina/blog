-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-06-26 10:09:08
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
-- 表的结构 `blog_article`
--

DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE IF NOT EXISTS `blog_article` (
  `id` int(11) NOT NULL COMMENT '文章',
  `name` char(15) NOT NULL COMMENT '名称',
  `content` text NOT NULL COMMENT '内容',
  `author` char(15) NOT NULL COMMENT '作者',
  `way` tinyint(4) NOT NULL DEFAULT '1' COMMENT '文章来源：1;原创，2：装载',
  `url` varchar(100) NOT NULL COMMENT '装载来源地址',
  `adddate` int(11) NOT NULL COMMENT '添加时间',
  `hot` int(11) NOT NULL DEFAULT '0' COMMENT '点击率',
  `private` tinyint(4) NOT NULL DEFAULT '1' COMMENT '文章属性：1：公开，2：私密',
  `sort` int(11) NOT NULL COMMENT '栏目分类ID',
  `talk` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:可评论，2，不可评论'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `blog_column`
--

DROP TABLE IF EXISTS `blog_column`;
CREATE TABLE IF NOT EXISTS `blog_column` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类表',
  `name` varchar(15) NOT NULL COMMENT '名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态，1允许',
  `adddate` int(11) NOT NULL COMMENT '添加日期',
  `descript` text NOT NULL COMMENT '分类描述',
  `token` char(32) NOT NULL COMMENT '插入验证',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_column`
--

INSERT INTO `blog_column` (`id`, `name`, `status`, `adddate`, `descript`, `token`) VALUES
(1, 'php', 1, 1529999787, 'df', '9e9d7f3d6e63930ae57264313ddf1405'),
(2, '前端', 1, 1530000034, '前端内容', '3317763459f6bbea52af518bf809976e');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_menu`
--

INSERT INTO `blog_menu` (`id`, `name`, `ico`, `pid`, `addtime`, `status`, `url`, `token`) VALUES
(5, '分类管理', 'th-list', 0, 1529983041, 1, '1', '2abdf34ab11a6e3fbc7dc27021e79570'),
(6, '分类列表', 'hand-o-right', 5, 1529983952, 1, 'column/index', '69d3522e9cf9cac20ad703420fd4df6e'),
(7, '文章管理', 'file', 0, 1530000123, 1, '1', 'a3bd8adc4ca4a568732f924e59112943'),
(10, '文章列表', 'file-text', 7, 1530000192, 1, 'article/index', '624ba0d9f1108d42902e05925a736183'),
(11, 'sf vx', 'ambulance', 5, 1529920192, 1, 'sfs', 'ccbd1b57959cffc3e224375521c1f9b4'),
(12, 'sf', 'ambulance', 10, 1529920202, 1, 'sf', '04b2e81944143ed5a60dead5fc30402c');

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

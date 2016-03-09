-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-03-07 15:30:10
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii2basic`
--

-- --------------------------------------------------------

--
-- 表的结构 `binner_attachment`
--

CREATE TABLE IF NOT EXISTS `binner_attachment` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogid` int(10) unsigned NOT NULL DEFAULT '0',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `filesize` int(10) NOT NULL DEFAULT '0',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `addtime` bigint(20) NOT NULL DEFAULT '0',
  `width` int(10) NOT NULL DEFAULT '0',
  `height` int(10) NOT NULL DEFAULT '0',
  `mimetype` varchar(40) NOT NULL DEFAULT '',
  `thumfor` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`),
  KEY `blogid` (`blogid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `binner_blog`
--

CREATE TABLE IF NOT EXISTS `binner_blog` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `date` bigint(20) NOT NULL,
  `content` longtext NOT NULL,
  `excerpt` longtext NOT NULL,
  `alias` varchar(200) NOT NULL DEFAULT '',
  `author` int(10) NOT NULL DEFAULT '1',
  `sortid` int(10) NOT NULL DEFAULT '-1',
  `type` varchar(20) NOT NULL DEFAULT 'blog',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `comnum` int(10) unsigned NOT NULL DEFAULT '0',
  `attnum` int(10) unsigned NOT NULL DEFAULT '0',
  `top` enum('n','y') NOT NULL DEFAULT 'n',
  `sortop` enum('n','y') NOT NULL DEFAULT 'n',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `checked` enum('n','y') NOT NULL DEFAULT 'y',
  `allow_remark` enum('n','y') NOT NULL DEFAULT 'y',
  `password` varchar(255) NOT NULL DEFAULT '',
  `template` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`gid`),
  KEY `date` (`date`),
  KEY `author` (`author`),
  KEY `sortid` (`sortid`),
  KEY `type` (`type`),
  KEY `views` (`views`),
  KEY `comnum` (`comnum`),
  KEY `hide` (`hide`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `binner_blog`
--

INSERT INTO `binner_blog` (`gid`, `title`, `date`, `content`, `excerpt`, `alias`, `author`, `sortid`, `type`, `views`, `comnum`, `attnum`, `top`, `sortop`, `hide`, `checked`, `allow_remark`, `password`, `template`) VALUES
(1, '欢迎使用emlog', 1457360158, '恭喜您成功安装了emlog，这是系统自动生成的演示文章。编辑或者删除它，然后开始您的创作吧！', '', '', 1, -1, 'blog', 0, 0, 0, 'n', 'n', 'n', 'y', 'y', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `binner_comment`
--

CREATE TABLE IF NOT EXISTS `binner_comment` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `date` bigint(20) NOT NULL,
  `poster` varchar(20) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `mail` varchar(60) NOT NULL DEFAULT '',
  `url` varchar(75) NOT NULL DEFAULT '',
  `ip` varchar(128) NOT NULL DEFAULT '',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  PRIMARY KEY (`cid`),
  KEY `gid` (`gid`),
  KEY `date` (`date`),
  KEY `hide` (`hide`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `binner_link`
--

CREATE TABLE IF NOT EXISTS `binner_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sitename` varchar(30) NOT NULL DEFAULT '',
  `siteurl` varchar(75) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `taxis` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `binner_link`
--

INSERT INTO `binner_link` (`id`, `sitename`, `siteurl`, `description`, `hide`, `taxis`) VALUES
(1, 'emlog', 'http://www.emlog.net', 'emlog官方主页', 'n', 0);

-- --------------------------------------------------------

--
-- 表的结构 `binner_navi`
--

CREATE TABLE IF NOT EXISTS `binner_navi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naviname` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(75) NOT NULL DEFAULT '',
  `newtab` enum('n','y') NOT NULL DEFAULT 'n',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `taxis` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `isdefault` enum('n','y') NOT NULL DEFAULT 'n',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `binner_navi`
--

INSERT INTO `binner_navi` (`id`, `naviname`, `url`, `newtab`, `hide`, `taxis`, `pid`, `isdefault`, `type`, `type_id`) VALUES
(1, '首页', '', 'n', 'n', 1, 0, 'y', 1, 0),
(2, '微语', 't', 'n', 'n', 2, 0, 'y', 2, 0),
(3, '登录', 'admin', 'n', 'n', 3, 0, 'y', 3, 0);

-- --------------------------------------------------------

--
-- 表的结构 `binner_options`
--

CREATE TABLE IF NOT EXISTS `binner_options` (
  `option_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(255) NOT NULL,
  `option_value` longtext NOT NULL,
  PRIMARY KEY (`option_id`),
  KEY `option_name` (`option_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- 转存表中的数据 `binner_options`
--

INSERT INTO `binner_options` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'blogname', '点滴记忆'),
(2, 'bloginfo', '使用emlog搭建的站点'),
(3, 'site_title', ''),
(4, 'site_description', ''),
(5, 'site_key', 'emlog'),
(6, 'log_title_style', '0'),
(7, 'blogurl', 'http://localhost/src/'),
(8, 'icp', ''),
(9, 'footer_info', ''),
(10, 'admin_perpage_num', '15'),
(11, 'rss_output_num', '0'),
(12, 'rss_output_fulltext', 'y'),
(13, 'index_lognum', '10'),
(14, 'index_comnum', '10'),
(15, 'index_twnum', '10'),
(16, 'index_newtwnum', '5'),
(17, 'index_newlognum', '5'),
(18, 'index_randlognum', '5'),
(19, 'index_hotlognum', '5'),
(20, 'comment_subnum', '20'),
(21, 'nonce_templet', 'default'),
(22, 'admin_style', 'default'),
(23, 'tpl_sidenum', '1'),
(24, 'comment_code', 'n'),
(25, 'comment_needchinese', 'y'),
(26, 'comment_interval', '60'),
(27, 'isgravatar', 'y'),
(28, 'isthumbnail', 'y'),
(29, 'att_maxsize', '20480'),
(30, 'att_type', 'rar,zip,gif,jpg,jpeg,png,txt,pdf,docx,doc,xls,xlsx'),
(31, 'att_imgmaxw', '420'),
(32, 'att_imgmaxh', '460'),
(33, 'comment_paging', 'y'),
(34, 'comment_pnum', '10'),
(35, 'comment_order', 'newer'),
(36, 'login_code', 'n'),
(37, 'reply_code', 'n'),
(38, 'iscomment', 'y'),
(39, 'ischkcomment', 'y'),
(40, 'ischkreply', 'n'),
(41, 'isurlrewrite', '0'),
(42, 'isalias', 'n'),
(43, 'isalias_html', 'n'),
(44, 'isgzipenable', 'n'),
(45, 'isxmlrpcenable', 'n'),
(46, 'ismobile', 'n'),
(47, 'isexcerpt', 'n'),
(48, 'excerpt_subnum', '300'),
(49, 'istwitter', 'y'),
(50, 'istreply', 'n'),
(51, 'topimg', 'content/templates/default/images/top/default.jpg'),
(52, 'custom_topimgs', 'a:0:{}'),
(53, 'timezone', '8'),
(54, 'active_plugins', ''),
(55, 'widget_title', 'a:13:{s:7:"blogger";s:12:"个人资料";s:8:"calendar";s:6:"日历";s:7:"twitter";s:12:"最新微语";s:3:"tag";s:6:"标签";s:4:"sort";s:6:"分类";s:7:"archive";s:6:"存档";s:7:"newcomm";s:12:"最新评论";s:6:"newlog";s:12:"最新文章";s:10:"random_log";s:12:"随机文章";s:6:"hotlog";s:12:"热门文章";s:4:"link";s:6:"链接";s:6:"search";s:6:"搜索";s:11:"custom_text";s:15:"自定义组件";}'),
(56, 'custom_widget', 'a:0:{}'),
(57, 'widgets1', 'a:5:{i:0;s:8:"calendar";i:1;s:7:"archive";i:2;s:7:"newcomm";i:3;s:4:"link";i:4;s:6:"search";}'),
(58, 'widgets2', ''),
(59, 'widgets3', ''),
(60, 'widgets4', '');

-- --------------------------------------------------------

--
-- 表的结构 `binner_reply`
--

CREATE TABLE IF NOT EXISTS `binner_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(10) unsigned NOT NULL DEFAULT '0',
  `date` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `ip` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `gid` (`tid`),
  KEY `hide` (`hide`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `binner_sort`
--

CREATE TABLE IF NOT EXISTS `binner_sort` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortname` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(200) NOT NULL DEFAULT '',
  `taxis` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `template` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `binner_tag`
--

CREATE TABLE IF NOT EXISTS `binner_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` varchar(60) NOT NULL DEFAULT '',
  `gid` text NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `tagname` (`tagname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `binner_twitter`
--

CREATE TABLE IF NOT EXISTS `binner_twitter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `author` int(10) NOT NULL DEFAULT '1',
  `date` bigint(20) NOT NULL,
  `replynum` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `author` (`author`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `binner_twitter`
--

INSERT INTO `binner_twitter` (`id`, `content`, `img`, `author`, `date`, `replynum`) VALUES
(1, '使用微语记录您身边的新鲜事', '', 1, 1457360158, 0);

-- --------------------------------------------------------

--
-- 表的结构 `binner_user`
--

CREATE TABLE IF NOT EXISTS `binner_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  `nickname` varchar(20) NOT NULL DEFAULT '',
  `role` varchar(60) NOT NULL DEFAULT '',
  `ischeck` enum('n','y') NOT NULL DEFAULT 'n',
  `photo` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `accessToken` varchar(100) NOT NULL DEFAULT '',
  `authKey` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `binner_user`
--

INSERT INTO `binner_user` (`uid`, `username`, `password`, `nickname`, `role`, `ischeck`, `photo`, `email`, `description`, `accessToken`, `authKey`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', 'admin', 'n', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

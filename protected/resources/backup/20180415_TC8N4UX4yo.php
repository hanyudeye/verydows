# -------------------------------------------------------------
# <?php die();?>
# Verydows Database Backup
# Program: Verydows 2.0 Release 20161112
# MySql: 5.7.21-0ubuntu0.16.04.1 
# Database: shop1 
# Creation: 2018-04-15 20:11:22
# Official: http://www.verydows.com
# -------------------------------------------------------------

DROP TABLE IF EXISTS `verydows_admin`;
CREATE TABLE `verydows_admin` (
  `user_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(16) NOT NULL,
  `password` char(32) NOT NULL,
  `name` varchar(60) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `last_ip` char(15) NOT NULL DEFAULT '',
  `last_date` int(10) unsigned NOT NULL DEFAULT '0',
  `created_date` int(10) unsigned NOT NULL DEFAULT '0',
  `hash` char(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `verydows_admin` VALUES
('1','admin','66f6c3af2d69b6a619660b7e3cc474ef','','yuanwei9467@126.com','127.0.0.1','1502846673','1502846465','eadc29d5a4e88a2cf59812cb6d375c3b1e406313');


DROP TABLE IF EXISTS `verydows_admin_active`;
CREATE TABLE `verydows_admin_active` (
  `sess_id` char(32) NOT NULL DEFAULT '',
  `user_id` smallint(5) unsigned NOT NULL,
  `ip` char(15) NOT NULL DEFAULT '0.0.0.0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `expires` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`sess_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_admin_role`;
CREATE TABLE `verydows_admin_role` (
  `user_id` smallint(5) unsigned NOT NULL,
  `role_id` smallint(5) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_adv`;
CREATE TABLE `verydows_adv` (
  `adv_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `type` char(5) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `codes` text NOT NULL,
  `start_date` int(10) unsigned NOT NULL DEFAULT '0',
  `end_date` int(10) unsigned NOT NULL DEFAULT '0',
  `seq` tinyint(2) unsigned NOT NULL DEFAULT '99',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`adv_id`),
  KEY `position_id` (`position_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `verydows_adv` VALUES
('1','1','首页广告1','image','{\"src\":\"http:\\/\\/127.0.0.1\\/verydows\\/upload\\/adv\\/image\\/59939f4e4357fsvgOqw98Mb67579.jpg\",\"width\":\"100\",\"height\":\"100\",\"title\":\"\",\"link\":\"http::\\/www.baidu.com\"}','<a href=\"http::/www.baidu.com\"><img src=\"http://127.0.0.1/verydows/upload/adv/image/59939f4e4357fsvgOqw98Mb67579.jpg\" width=\"100\" height=\"100\" border=\"0\" /></a>','1502812800','1510848000','99','1');


DROP TABLE IF EXISTS `verydows_adv_position`;
CREATE TABLE `verydows_adv_position` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `width` smallint(4) unsigned NOT NULL DEFAULT '0',
  `height` smallint(4) unsigned NOT NULL DEFAULT '0',
  `codes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `verydows_adv_position` VALUES
('1','首页广告','100','100','<img src=\"\">');


DROP TABLE IF EXISTS `verydows_aftersales`;
CREATE TABLE `verydows_aftersales` (
  `as_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `order_id` char(15) NOT NULL DEFAULT '',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_qty` smallint(5) unsigned NOT NULL DEFAULT '1',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `cause` text NOT NULL,
  `mobile` char(11) NOT NULL DEFAULT '',
  `created_date` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`as_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_aftersales_message`;
CREATE TABLE `verydows_aftersales_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `as_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `admin_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `as_id` (`as_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_article`;
CREATE TABLE `verydows_article` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `title` varchar(180) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `brief` varchar(240) NOT NULL DEFAULT '',
  `meta_keywords` varchar(240) NOT NULL DEFAULT '',
  `meta_description` varchar(240) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created_date` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cate_id` (`cate_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_article_cate`;
CREATE TABLE `verydows_article_cate` (
  `cate_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(60) NOT NULL,
  `meta_keywords` varchar(240) NOT NULL DEFAULT '',
  `meta_description` varchar(240) NOT NULL DEFAULT '',
  `seq` tinyint(2) unsigned NOT NULL DEFAULT '99',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_brand`;
CREATE TABLE `verydows_brand` (
  `brand_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(60) NOT NULL DEFAULT '',
  `brand_logo` varchar(255) NOT NULL DEFAULT '',
  `seq` tinyint(2) unsigned NOT NULL DEFAULT '99',
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_email_queue`;
CREATE TABLE `verydows_email_queue` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL DEFAULT '',
  `tpl_id` char(30) NOT NULL DEFAULT '',
  `subject` varchar(240) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `is_html` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `last_err` varchar(255) NOT NULL DEFAULT '',
  `err_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_email_subscription`;
CREATE TABLE `verydows_email_subscription` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL DEFAULT '',
  `created_date` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_email_template`;
CREATE TABLE `verydows_email_template` (
  `id` char(30) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `subject` varchar(240) NOT NULL DEFAULT '',
  `is_html` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `verydows_email_template` VALUES
('email_captcha','邮箱验证码','验证码','1');


DROP TABLE IF EXISTS `verydows_feedback`;
CREATE TABLE `verydows_feedback` (
  `fb_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(120) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `mobile` char(11) NOT NULL DEFAULT '',
  `created_date` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fb_id`),
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_feedback_message`;
CREATE TABLE `verydows_feedback_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fb_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `admin_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fb_id` (`fb_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_friendlink`;
CREATE TABLE `verydows_friendlink` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_date` int(10) unsigned NOT NULL DEFAULT '0',
  `seq` tinyint(2) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_goods`;
CREATE TABLE `verydows_goods` (
  `goods_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `brand_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `goods_name` varchar(180) NOT NULL DEFAULT '',
  `goods_sn` char(20) NOT NULL DEFAULT '',
  `now_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `original_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `goods_image` varchar(300) NOT NULL DEFAULT '',
  `goods_brief` text NOT NULL,
  `goods_content` text NOT NULL,
  `goods_weight` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `stock_qty` smallint(4) unsigned NOT NULL DEFAULT '0',
  `meta_keywords` varchar(240) NOT NULL DEFAULT '',
  `meta_description` varchar(240) NOT NULL DEFAULT '',
  `created_date` int(10) unsigned NOT NULL DEFAULT '0',
  `newarrival` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `recommend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `bargain` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`goods_id`),
  KEY `cate_id` (`cate_id`),
  FULLTEXT KEY `indexing` (`goods_name`,`meta_keywords`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

INSERT INTO `verydows_goods` VALUES
('20','1','0','华为 HUAWEI Nova (CAZ-AL10) 全网通版','00100219953','2099.00','0.00','115ad33e9f97427.jpg','<p>精美金属机身，舒适握感！4K高清视频拍摄！美颜自拍！DTS音效！张艺兴，关晓彤的选择！</p>','<div class=\"content\"><p style=\"text-align: center;\"><img src=\"http://demo.verydows.com/upload/goods/editor/1611/5826a662b4f22Dw8GRU7cJ568921.jpg\" _src=\"http://demo.verydows.com/upload/goods/editor/1611/5826a662b4f22Dw8GRU7cJ568921.jpg\"/></p></div>','0.00','100','华为 HUAWEI Nova (CAZ-AL10) 全网通版','华为 HUAWEI Nova (CAZ-AL10) 全网通版','1523793622','0','0','0','1'),
('19','1','0','Apple iPhone 7 (A1660) 国行版','00100117376','5199.00','0.00','835ad33efabdf93.jpg','','<div class=\"content\"><div style=\"text-align:center\"><p><img src=\"http://demo.verydows.com/upload/goods/editor/1611/58269f91f3b9b2VpJYC3XAE50145.jpg\" _src=\"http://demo.verydows.com/upload/goods/editor/1611/58269f91f3b9b2VpJYC3XAE50145.jpg\" style=\"\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/1611/58269f9632bf6ytEal405iH30662.jpg\" _src=\"http://demo.verydows.com/upload/goods/editor/1611/58269f9632bf6ytEal405iH30662.jpg\" style=\"\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/1611/58269f9cc7a2fbJOx0R7N8X67972.jpg\" _src=\"http://demo.verydows.com/upload/goods/editor/1611/58269f9cc7a2fbJOx0R7N8X67972.jpg\" style=\"\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/1611/58269fa2500b2oH9pZarjJO59866.jpg\" _src=\"http://demo.verydows.com/upload/goods/editor/1611/58269fa2500b2oH9pZarjJO59866.jpg\" style=\"\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/1611/58269fa65620fuhvobJ8qHk91264.jpg\" _src=\"http://demo.verydows.com/upload/goods/editor/1611/58269fa65620fuhvobJ8qHk91264.jpg\" style=\"\"/></p></div></div>','0.00','100','Apple iPhone 7 (A1660) 国行版','Apple iPhone 7 (A1660) 国行版','1523793691','0','0','0','1'),
('16','1','0','Apple iPhone 6s Plus','00100116500','4688.00','0.00','935ad33f756c41f.jpg','','','0.00','100','Apple iPhone 6s Plus','Apple iPhone 6s Plus','1523793783','0','0','0','1'),
('13','1','0','vivo Xplay5 全网通4G手机 4GB+128GB 双卡双待 香槟金','00101513635','3698.00','0.00','915ad33fdb4ee8a.jpg','','<div class=\"content\"><div align=\"center\"><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e6c6405bf3bw2T3JtxeM558784.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e6c64a81c98BuJ9V5C0D426836.jpg\"/></p></div></div>','0.00','100','vivo Xplay5 全网通4G手机 4GB+128GB 双卡双待 香槟金','vivo Xplay5 全网通4G手机 4GB+128GB 双卡双待 香槟金','1523793884','0','0','0','1'),
('3','1','0','小米4 MI4 2GB内存版 移动 联通 电信 4G手机','0010033521','1299.00','0.00','http://demo.verydows.com/upload/goods/prime/150x150/356e2fa344ec51.jpg','','<div class=\"content\"><div align=\"center\"><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e2fad802f73JXclAK3DV07838.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e2fae1ea2e2F6Y1lpxjE250520.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e2fae836e9fugT70NKaUe75951.jpg\"/></p></div>','0.00','100','小米4 MI4 2GB内存版 移动 联通 电信 4G手机','小米4 MI4 2GB内存版 移动 联通 电信 4G手机','1503024254','0','0','0','1'),
('2','1','0','华为 Mate8 3GB+32GB版 全网通 移动版 月光银 苍穹灰','0010022030','2999.00','0.00','http://demo.verydows.com/upload/goods/prime/150x150/256e2f30e7256c.jpg','','<div class=\"content\"><div align=\"center\"><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e2f2abed2195dHIXDVxa295565.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e2f26836850PvsUtf5CjI32491.jpg\"/></p></div>','0.00','100','华为 Mate8 3GB+32GB版 全网通 移动版 月光银 苍穹灰','华为 Mate8 3GB+32GB版 全网通 移动版 月光银 苍穹灰','1503024255','0','0','0','1'),
('1','1','0','Apple iPhone 6s (A1700) 移动联通电信4G手机','0010011563','4888.00','0.00','http://demo.verydows.com/upload/goods/prime/150x150/156e2d4fa488d0.jpg','','<div class=\"content\"><div align=\"center\"><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e2daaf5dc64IiTXQnmG6Z66363.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e2dc22524ec5iENqzFsIB51238.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e2dc2ed68dbTJKr2HGiBQ34101.jpg\"/></p></div>','0.00','100','Apple iPhone 6s (A1700) 移动联通电信4G手机','Apple iPhone 6s (A1700) 移动联通电信4G手机','1503024255','0','0','0','1'),
('21','2','0','Teclast/台电 Tbook16s 64GB平板电脑二合一 Win10 双系统 11.6英寸','00801920813','1679.00','0.00','535ad33df59eb06.jpg','<p><img alt=\"\" class=\"\" src=\"https://img14.360buyimg.com/imgzone/jfs/t18511/89/1650510640/217747/1b496370/5ad1a22bNf4677706.jpg\" style=\"border: 0px; vertical-align: middle; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;\"/><br style=\"color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;\"/><img alt=\"\" class=\"\" src=\"https://img12.360buyimg.com/cms/jfs/t5728/14/3226878180/80101/5590f4ec/5938fc1dNf26a8903.jpg\" style=\"border: 0px; vertical-align: middle; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;\"/><br style=\"color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;\"/><img alt=\"\" class=\"\" src=\"https://img12.360buyimg.com/imgzone/jfs/t18910/3/1660902940/177052/461ff647/5ad1d263Nec1b61a4.jpg\" style=\"border: 0px; vertical-align: middle; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;\"/><br style=\"color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;\"/><img alt=\"\" class=\"\" src=\"https://img10.360buyimg.com/cms/jfs/t211/217/2276357196/11371/b33931ab/54110c74N7b688406.jpg\" style=\"border: 0px; vertical-align: middle; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;\"/><br style=\"color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;\"/><img alt=\"\" class=\"\" src=\"https://img10.360buyimg.com/imgzone/jfs/t15100/183/1902062074/497166/30945b20/5a606401N52802290.jpg\" style=\"border: 0px; vertical-align: middle; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;\"/><br style=\"color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;\"/><img alt=\"\" class=\"\" src=\"https://img10.360buyimg.com/imgzone/jfs/t14761/132/1911032738/696878/7c47a019/5a606400N0aa7d20d.jpg\" style=\"border: 0px; vertical-align: middle; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;\"/><br style=\"color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;\"/><img alt=\"\" class=\"\" src=\"https://img10.360buyimg.com/imgzone/jfs/t15571/210/1777624688/371463/24685fa2/5a606400Nef1da14c.jpg\" style=\"border: 0px; vertical-align: middle; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;\"/><br style=\"color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;\"/><img alt=\"\" class=\"\" src=\"https://img10.360buyimg.com/imgzone/jfs/t19522/28/239092394/302311/2b6b857d/5a65a50eN44b9e4ca.jpg\" style=\"border: 0px; vertical-align: middle; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;\"/></p>','<div class=\"content\"><div style=\"text-align: center;\"><p><img src=\"http://demo.verydows.com/upload/goods/editor/1611/582910e7a171fSlIJ76QfM512361.jpg\" _src=\"http://demo.verydows.com/upload/goods/editor/1611/582910e7a171fSlIJ76QfM512361.jpg\" style=\"\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/1611/582910eb76dd0MjiUoWEGkI75987.jpg\" _src=\"http://demo.verydows.com/upload/goods/editor/1611/582910eb76dd0MjiUoWEGkI75987.jpg\" style=\"\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/1611/582910ed4e16f06SHLRFIUN36079.jpg\" _src=\"http://demo.verydows.com/upload/goods/editor/1611/582910ed4e16f06SHLRFIUN36079.jpg\" style=\"\"/></p></div></div>','0.00','100','Teclast/台电 Tbook16s 64GB平板电脑二合一 Win10 双系统 11.6英寸','Teclast/台电 Tbook16s 64GB平板电脑二合一 Win10 双系统 11.6英寸','1523793424','0','0','0','1'),
('17','2','0','微软 Microsoft Surface Pro 3 平板电脑','00801817082','0.01','0.00','135ad33f49809ff.jpg','','<div class=\"content\"><p><span style=\"font-size:16px\">i7i87i87i</span></p></div>','0.00','100','微软 Microsoft Surface Pro 3 平板电脑','微软 Microsoft Surface Pro 3 平板电脑','1523793740','0','0','0','1'),
('9','2','0','诺基亚（Nokia）N1 7.9英寸平板电脑','0000009639','1099.00','0.00','255ad3406691a64.jpg','','<div class=\"content\"><div align=\"center\"><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e404e0a51a58MblFa9Jn152056.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e404e6555ca5o90xsbOah31334.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e404eb65c8bZyJVI760NU84987.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e404f152c6f6iFm8oWvgq47192.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e404f5ec67ffxakSiFUmN92775.jpg\"/></p></div></div>','0.00','100','诺基亚（Nokia）N1 7.9英寸平板电脑','诺基亚（Nokia）N1 7.9英寸平板电脑','1523794024','0','0','0','1'),
('8','2','0','Apple iPad Air 2 MH0W2CH/A 9.7英寸平板电脑','0080018206','3288.00','0.00','http://demo.verydows.com/upload/goods/prime/150x150/856e3fba434963.jpg','','<div class=\"content\"><div align=\"center\"><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e4008736b14kWtqo0HygS54399.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e4008e6fc68FW01pSODne25515.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e40093ecb183MHgfX2PFV79431.jpg\"/></p></div>','0.00','100','Apple iPad Air 2 MH0W2CH/A 9.7英寸平板电脑','Apple iPad Air 2 MH0W2CH/A 9.7英寸平板电脑','1503024255','0','0','0','1'),
('7','2','0','三星(SAMSUNG)900X5L-K01 15.0英寸超薄笔记本电脑','0070097259','8999.00','0.00','http://demo.verydows.com/upload/goods/prime/150x150/756e3f9459edf9.jpg','','<div class=\"content\"></div>','0.00','100','三星(SAMSUNG)900X5L-K01 15.0英寸超薄笔记本电脑','三星(SAMSUNG)900X5L-K01 15.0英寸超薄笔记本电脑','1503024255','0','0','0','1'),
('6','2','0','宏碁（acer）V3-372-P47B 13.3英寸轻薄笔记本电脑','0070076922','2999.00','0.00','http://demo.verydows.com/upload/goods/prime/150x150/656e3f5f12fd03.jpg','','<div class=\"content\"><div align=\"center\"><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e3f5d64aca8H4Ums25rXt87027.jpg\"/></p></div>','0.00','100','宏碁（acer）V3-372-P47B 13.3英寸轻薄笔记本电脑','宏碁（acer）V3-372-P47B 13.3英寸轻薄笔记本电脑','1503024255','0','0','0','1'),
('5','2','0','戴尔（DELL）Ins14MR-7508R 14.0英寸笔记本电脑 （i5-6200U 4G 500G Win10）','0070065228','4399.00','0.00','http://demo.verydows.com/upload/goods/prime/150x150/556e3f1ea40b41.jpg','','<div class=\"content\"><div align=\"center\"><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e3f3d10866cKyN8ADTlm775049.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e3f3d857b8fjc8pRygfUY79695.jpg\"/></p></div>','0.00','100','戴尔（DELL）Ins14MR-7508R 14.0英寸笔记本电脑 （i5-6200U 4G 500G Win10）','戴尔（DELL）Ins14MR-7508R 14.0英寸笔记本电脑 （i5-6200U 4G 500G Win10）','1503024255','0','0','0','1'),
('4','2','0','Apple MacBook Air MJVE2CH/A 13.3英寸宽屏笔记本电脑','0070014005','6666.00','0.00','http://demo.verydows.com/upload/goods/prime/150x150/456e3dfe6d22c1.jpg','','<div class=\"content\"><div align=\"center\"><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e3df31c8fb7iRwAu3PbmC99819.jpg\" _src=\"http://demo.verydows.com/upload/goods/editor/56e3df31c8fb7iRwAu3PbmC99819.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e3df4023401NJv1Rc3LfM73993.jpg\" _src=\"http://demo.verydows.com/upload/goods/editor/56e3df4023401NJv1Rc3LfM73993.jpg\"/></p></div>','0.00','100','Apple MacBook Air MJVE2CH/A 13.3英寸宽屏笔记本电脑','Apple MacBook Air MJVE2CH/A 13.3英寸宽屏笔记本电脑','1503024256','0','0','0','1'),
('15','3','0','奥克斯 AUX KFR-25GW/FK01+3 1匹 挂壁式家用冷暖空调','01401715715','1499.00','0.00','655ad33f99affdb.jpg','','','0.00','100','奥克斯 AUX KFR-25GW/FK01+3 1匹 挂壁式家用冷暖空调','奥克斯 AUX KFR-25GW/FK01+3 1匹 挂壁式家用冷暖空调','1523793819','0','0','0','1'),
('14','3','0','美的 Midea KFR-51LW/WYAA2 2匹 除PM2.5超静音变频柜机 物联网版','01401614386','6699.00','0.00','805ad33fb75773a.jpg','','','0.00','100','美的 Midea KFR-51LW/WYAA2 2匹 除PM2.5超静音变频柜机 物联网版','美的 Midea KFR-51LW/WYAA2 2匹 除PM2.5超静音变频柜机 物联网版','1523793849','0','0','0','1'),
('12','3','0','索尼 SONY U90 55英寸4K超高清 安卓5.0智能系统液晶电视','00901212289','8999.00','0.00','435ad33ff6d0387.jpg','','<div class=\"content\"><div align=\"center\"><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e5203fa7fbeiAu3Jpt1BI19575.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e52045e8048Gui7A89S4Y21703.jpg\"/></p></div></div>','0.00','100','索尼 SONY U90 55英寸4K超高清 安卓5.0智能系统液晶电视','索尼 SONY U90 55英寸4K超高清 安卓5.0智能系统液晶电视','1523793912','0','0','0','1'),
('11','3','0','飞利浦 PHILIPS 48PFL5445/T3 48英寸 全高清LED智能电视','00901111459','2999.00','0.00','975ad3401b861c2.jpg','','','0.00','100','飞利浦 PHILIPS 48PFL5445/T3 48英寸 全高清LED智能电视','飞利浦 PHILIPS 48PFL5445/T3 48英寸 全高清LED智能电视','1523793949','0','0','0','1'),
('10','3','0','飞利浦 PHILIPS 49PFL3445/T3 49英寸 全高清LED液晶电视','00901110039','2399.00','0.00','285ad3403abaf7d.jpg','','<div class=\"content\"><div align=\"center\"><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e5197255a8dKT69YEHpMO28069.jpg\"/></p><p><img src=\"http://demo.verydows.com/upload/goods/editor/56e5196a0b5e2wgTuQ6I5Bd43172.jpg\"/></p></div></div>','0.00','100','飞利浦 PHILIPS 49PFL3445/T3 49英寸 全高清LED液晶电视','飞利浦 PHILIPS 49PFL3445/T3 49英寸 全高清LED液晶电视','1523793980','0','0','0','1');


DROP TABLE IF EXISTS `verydows_goods_album`;
CREATE TABLE `verydows_goods_album` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) unsigned NOT NULL,
  `image` varchar(300) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;

INSERT INTO `verydows_goods_album` VALUES
('150','20','375ad33ed424e2c.jpg'),
('153','19','685ad33f191b53c.jpg'),
('151','19','125ad33f18eb55c.jpg'),
('152','19','705ad33f190bb0c.jpg'),
('21','3','http://demo.verydows.com/upload/goods/prime/50x50/356e2fa344ec51.jpg'),
('22','3','http://demo.verydows.com/upload/goods/album/50x50/56e2fa344f384iqwXgUJ4OM64483.jpg'),
('23','3','http://demo.verydows.com/upload/goods/album/50x50/56e2fa344f2e0XPhivetwqd36656.jpg'),
('24','3','http://demo.verydows.com/upload/goods/album/50x50/56e2fa344f23ctCfyjL1WAZ46687.jpg'),
('25','3','http://demo.verydows.com/upload/goods/album/50x50/56e2fa344f195JtQsiem0Hy2366.jpg'),
('26','3','http://demo.verydows.com/upload/goods/album/50x50/56e2fa344f0eamoiRIGQUST26183.jpg'),
('27','3','http://demo.verydows.com/upload/goods/album/50x50/56e2fa344f02cY1uRU7wkr339310.jpg'),
('28','2','http://demo.verydows.com/upload/goods/prime/50x50/256e2f30e7256c.jpg'),
('29','2','http://demo.verydows.com/upload/goods/album/50x50/56e2f30e72928BSOzT93IkP9639.jpg'),
('30','2','http://demo.verydows.com/upload/goods/album/50x50/56e2f30e729e9TJ9pqaSYQZ87527.jpg'),
('31','2','http://demo.verydows.com/upload/goods/album/50x50/56e2f30e72a98gP0RSdCui37720.jpg'),
('32','2','http://demo.verydows.com/upload/goods/album/50x50/56e2f30e72b41PyGKWtfZ0311691.jpg'),
('33','2','http://demo.verydows.com/upload/goods/album/50x50/56e2f5332bff4rao5t7snf261816.jpg'),
('34','2','http://demo.verydows.com/upload/goods/album/50x50/56e2f5332c0d0YT4xyB0kAd82509.jpg'),
('35','1','http://demo.verydows.com/upload/goods/prime/50x50/156e2d4fa488d0.jpg'),
('36','1','http://demo.verydows.com/upload/goods/album/50x50/56e2d943368b959ynGbQ7lW80201.jpg'),
('37','1','http://demo.verydows.com/upload/goods/album/50x50/56e2d94336995XcJQWpDSwE86673.jpg'),
('51','8','http://demo.verydows.com/upload/goods/prime/50x50/856e3fba434963.jpg'),
('52','8','http://demo.verydows.com/upload/goods/album/50x50/56e3fba434df3FvpI1ea2z011388.jpg'),
('53','8','http://demo.verydows.com/upload/goods/album/50x50/56e3fba434ebdgGnoHcM62f69789.jpg'),
('54','8','http://demo.verydows.com/upload/goods/album/50x50/56e3fba434f6bOk0oljHqRg88606.jpg'),
('55','7','http://demo.verydows.com/upload/goods/prime/50x50/756e3f9459edf9.jpg'),
('56','7','http://demo.verydows.com/upload/goods/album/50x50/56e3f9459f26416pkIfzRxL94522.jpg'),
('57','7','http://demo.verydows.com/upload/goods/album/50x50/56e3f9459f329V1m5ivX80J61533.jpg'),
('58','7','http://demo.verydows.com/upload/goods/album/50x50/56e3f9459f3d75RjAoGYxNI60323.jpg'),
('59','6','http://demo.verydows.com/upload/goods/prime/50x50/656e3f5f12fd03.jpg'),
('60','6','http://demo.verydows.com/upload/goods/album/50x50/56e3f5f13024fewM0GFa5Vt49870.jpg'),
('61','6','http://demo.verydows.com/upload/goods/album/50x50/56e3f5f13032bKUPf8uecMz91660.jpg'),
('62','6','http://demo.verydows.com/upload/goods/album/50x50/56e3f5f1303d9oYudLMSe7y99233.jpg'),
('63','6','http://demo.verydows.com/upload/goods/album/50x50/56e3f5f130486e4w0WSoUmZ13763.jpg'),
('64','5','http://demo.verydows.com/upload/goods/prime/50x50/556e3f1ea40b41.jpg'),
('65','5','http://demo.verydows.com/upload/goods/album/50x50/56e3f1ea40f58mkRSp4lMJA2728.jpg'),
('66','5','http://demo.verydows.com/upload/goods/album/50x50/56e3f1ea4101alQtjuWg7G16579.jpg'),
('67','5','http://demo.verydows.com/upload/goods/album/50x50/56e3f1ea410c87IodqvTUXH31299.jpg'),
('68','5','http://demo.verydows.com/upload/goods/album/50x50/56e3f1ea41174sdoGeHNpL541450.jpg'),
('69','4','http://demo.verydows.com/upload/goods/prime/50x50/456e3dfe6d22c1.jpg'),
('70','4','http://demo.verydows.com/upload/goods/album/50x50/56e3dfe6d279cuDlyS83YL155115.jpg'),
('71','4','http://demo.verydows.com/upload/goods/album/50x50/56e3dfe6d288aDoQdTKf6nJ56044.jpg'),
('89','7','http://demo.verydows.com/upload/goods/prime/50x50/756e3f9459edf9.jpg'),
('90','7','http://demo.verydows.com/upload/goods/album/50x50/56e3f9459f26416pkIfzRxL94522.jpg'),
('91','7','http://demo.verydows.com/upload/goods/album/50x50/56e3f9459f329V1m5ivX80J61533.jpg'),
('92','7','http://demo.verydows.com/upload/goods/album/50x50/56e3f9459f3d75RjAoGYxNI60323.jpg'),
('93','6','http://demo.verydows.com/upload/goods/prime/50x50/656e3f5f12fd03.jpg'),
('94','6','http://demo.verydows.com/upload/goods/album/50x50/56e3f5f13024fewM0GFa5Vt49870.jpg'),
('95','6','http://demo.verydows.com/upload/goods/album/50x50/56e3f5f13032bKUPf8uecMz91660.jpg'),
('96','6','http://demo.verydows.com/upload/goods/album/50x50/56e3f5f1303d9oYudLMSe7y99233.jpg'),
('97','6','http://demo.verydows.com/upload/goods/album/50x50/56e3f5f130486e4w0WSoUmZ13763.jpg'),
('98','5','http://demo.verydows.com/upload/goods/prime/50x50/556e3f1ea40b41.jpg'),
('99','5','http://demo.verydows.com/upload/goods/album/50x50/56e3f1ea40f58mkRSp4lMJA2728.jpg'),
('100','5','http://demo.verydows.com/upload/goods/album/50x50/56e3f1ea4101alQtjuWg7G16579.jpg'),
('101','5','http://demo.verydows.com/upload/goods/album/50x50/56e3f1ea410c87IodqvTUXH31299.jpg'),
('102','5','http://demo.verydows.com/upload/goods/album/50x50/56e3f1ea41174sdoGeHNpL541450.jpg'),
('103','4','http://demo.verydows.com/upload/goods/prime/50x50/456e3dfe6d22c1.jpg'),
('104','4','http://demo.verydows.com/upload/goods/album/50x50/56e3dfe6d279cuDlyS83YL155115.jpg'),
('105','4','http://demo.verydows.com/upload/goods/album/50x50/56e3dfe6d288aDoQdTKf6nJ56044.jpg'),
('149','21','845ad33e092d2ac.jpg'),
('147','21','485ad33e08e99c8.jpg'),
('148','21','225ad33e090f798.jpg'),
('119','8','http://demo.verydows.com/upload/goods/prime/50x50/856e3fba434963.jpg'),
('120','8','http://demo.verydows.com/upload/goods/album/50x50/56e3fba434df3FvpI1ea2z011388.jpg'),
('121','8','http://demo.verydows.com/upload/goods/album/50x50/56e3fba434ebdgGnoHcM62f69789.jpg'),
('122','8','http://demo.verydows.com/upload/goods/album/50x50/56e3fba434f6bOk0oljHqRg88606.jpg');


DROP TABLE IF EXISTS `verydows_goods_attr`;
CREATE TABLE `verydows_goods_attr` (
  `goods_id` mediumint(8) unsigned NOT NULL,
  `attr_id` mediumint(8) NOT NULL,
  `value` varchar(160) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_goods_cate`;
CREATE TABLE `verydows_goods_cate` (
  `cate_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `cate_name` varchar(60) NOT NULL DEFAULT '',
  `meta_keywords` varchar(240) NOT NULL DEFAULT '',
  `meta_description` varchar(240) NOT NULL DEFAULT '',
  `seq` tinyint(2) unsigned NOT NULL DEFAULT '99',
  PRIMARY KEY (`cate_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `verydows_goods_cate` VALUES
('1','0','手机','手机','手机','99'),
('2','0','电脑','电脑','电脑','99'),
('3','0','家电','家电','家电','99'),
('4','0','汽车用品','汽车用品','汽车用品','99'),
('5','0','个护化妆','个护化妆','个护化妆','99'),
('6','0','珠宝饰品','珠宝饰品','珠宝饰品','99'),
('7','0','食品酒类','食品酒类','食品酒类','99'),
('8','2','平板电脑','平板电脑','平板电脑','99'),
('9','2','笔记本','笔记本','笔记本','99'),
('10','3','电视','电视','电视','99'),
('11','3','空调','空调','空调','99'),
('12','6','项链','项链','项链','99'),
('13','6','手链','手链','手链','99');


DROP TABLE IF EXISTS `verydows_goods_cate_attr`;
CREATE TABLE `verydows_goods_cate_attr` (
  `attr_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `name` varchar(60) NOT NULL DEFAULT '',
  `opts` text NOT NULL,
  `uom` varchar(20) NOT NULL DEFAULT '',
  `filtrate` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `seq` tinyint(2) unsigned NOT NULL DEFAULT '99',
  PRIMARY KEY (`attr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_goods_cate_brand`;
CREATE TABLE `verydows_goods_cate_brand` (
  `cate_id` smallint(5) unsigned NOT NULL,
  `brand_id` smallint(5) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_goods_optional`;
CREATE TABLE `verydows_goods_optional` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `opt_text` varchar(80) NOT NULL DEFAULT '',
  `opt_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=717 DEFAULT CHARSET=utf8;

INSERT INTO `verydows_goods_optional` VALUES
('693','240','20','香槟金(白)','0.00'),
('692','240','20','香槟金(黑)','0.00'),
('691','240','20','玫瑰金','0.00'),
('690','240','20','皓月银','0.00'),
('689','241','20','64GB','300.00'),
('688','241','20','32GB','0.00'),
('687','242','20','皓月银','0.00'),
('686','242','20','玫瑰金','0.00'),
('685','242','20','香槟金(白)','0.00'),
('701','244','19','256GB','1500.00'),
('700','243','19','黑色','0.00'),
('699','243','19','亮黑色','0.00'),
('698','243','19','玫瑰金','0.00'),
('697','243','19','金色','0.00'),
('696','243','19','银色','0.00'),
('715','247','16','移动版','0.00'),
('714','246','16','玫瑰金','0.00'),
('713','246','16','金色','0.00'),
('712','246','16','深空灰','0.00'),
('711','246','16','银色','0.00'),
('710','245','16','16G','0.00'),
('709','245','16','64G','800.00'),
('708','245','16','128G','1800.00'),
('612','248','3','白色','0.00'),
('613','248','3','黑色','0.00'),
('614','249','3','联通','0.00'),
('615','249','3','电信','0.00'),
('616','249','3','移动','0.00'),
('617','250','2','苍穹灰','0.00'),
('618','250','2','月光银','0.00'),
('619','251','2','移动版','0.00'),
('620','251','2','全网通','200.00'),
('621','252','1','银色','0.00'),
('622','252','1','深空灰','0.00'),
('623','252','1','金色','0.00'),
('624','252','1','玫瑰金','50.00'),
('625','253','1','16G','0.00'),
('626','253','1','128G','1700.00'),
('627','253','1','64G','700.00'),
('682','254','21','套餐一','100.00'),
('681','254','21','套餐二','200.00'),
('680','254','21','套餐三','300.00'),
('707','261','17','中文版','0.00'),
('706','261','17','专业版','0.00'),
('634','256','8','银色','0.00'),
('635','256','8','灰色','100.00'),
('636','256','8','金色','0.00'),
('637','257','8','128G WiFi版','1500.00'),
('638','257','8','16G WiFi版','0.00'),
('639','257','8','64G WiFi版','700.00'),
('640','258','4','256G','1333.00'),
('641','258','4','128G','0.00'),
('642','259','4','256G','1333.00'),
('643','259','4','128G','0.00'),
('679','260','21','套餐三','300.00'),
('678','260','21','套餐二','200.00'),
('705','255','17','中文版','0.00'),
('704','255','17','专业版','0.00'),
('650','262','8','银色','0.00'),
('651','262','8','灰色','100.00'),
('652','262','8','金色','0.00'),
('653','263','8','128G WiFi版','1500.00'),
('654','263','8','16G WiFi版','0.00'),
('655','263','8','64G WiFi版','700.00'),
('677','260','21','官方标配','0.00'),
('676','260','21','套餐一','100.00'),
('684','242','20','香槟金(黑)','0.00'),
('683','254','21','官方标配','0.00'),
('694','239','20','32GB','0.00'),
('695','239','20','64GB','300.00'),
('702','244','19','128GB','800.00'),
('703','244','19','32GB','0.00'),
('716','247','16','全网通','200.00');


DROP TABLE IF EXISTS `verydows_goods_optional_type`;
CREATE TABLE `verydows_goods_optional_type` (
  `type_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=264 DEFAULT CHARSET=utf8;

INSERT INTO `verydows_goods_optional_type` VALUES
('239','机身存储'),
('240','颜色'),
('241','机身存储'),
('242','颜色'),
('243','颜色'),
('244','机身存储'),
('245','机身存储'),
('246','颜色'),
('247','网络类型'),
('248','颜色'),
('249','网络类型'),
('250','颜色'),
('251','网络类型'),
('252','颜色'),
('253','机身存储'),
('254','版本'),
('255','版本'),
('256','颜色'),
('257','机身存储'),
('258','机身存储'),
('259','机身存储'),
('260','版本'),
('261','版本'),
('262','颜色'),
('263','机身存储');


DROP TABLE IF EXISTS `verydows_goods_related`;
CREATE TABLE `verydows_goods_related` (
  `goods_id` mediumint(8) NOT NULL,
  `related_id` mediumint(8) NOT NULL,
  `direction` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`goods_id`,`related_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_goods_review`;
CREATE TABLE `verydows_goods_review` (
  `review_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` char(15) NOT NULL DEFAULT '',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `rating` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `content` text NOT NULL,
  `created_date` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `replied` text NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `goods_id` (`goods_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_help`;
CREATE TABLE `verydows_help` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `meta_keywords` varchar(240) NOT NULL DEFAULT '',
  `meta_description` varchar(240) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `seq` tinyint(2) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cate_id` (`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_help_cate`;
CREATE TABLE `verydows_help_cate` (
  `cate_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(60) NOT NULL DEFAULT '',
  `seq` tinyint(2) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_navigation`;
CREATE TABLE `verydows_navigation` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `position` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `target` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `seq` tinyint(2) unsigned NOT NULL DEFAULT '99',
  `visible` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_oauth`;
CREATE TABLE `verydows_oauth` (
  `party` char(10) NOT NULL DEFAULT '',
  `name` varchar(30) NOT NULL,
  `params` text NOT NULL,
  `instruction` varchar(240) NOT NULL DEFAULT '',
  `enable` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`party`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `verydows_oauth` VALUES
('qq','腾讯QQ','{\"app_id\":\"\",\"app_key\":\"\"}','QQ互联开放平台为第三方网站提供了丰富的API。第三方网站接入QQ互联开放平台后，即可通过调用平台提供的API实现用户使用QQ帐号登录网站功能，且可以获取到腾讯QQ用户的相关信息。','1'),
('weibo','新浪微博','{\"app_key\":\"\",\"app_secret\":\"\"}','网站接入是微博针对第三方网站提供的社会化网络接入方案。接入微连接让您的网站支持用微博帐号登录，基于OAuth2.0协议，使用微博 Open API 进行开发， 即可用微博帐号登录你的网站， 让你的网站降低新用户注册成本，快速获取大量用户。','1');


DROP TABLE IF EXISTS `verydows_order`;
CREATE TABLE `verydows_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` char(15) NOT NULL DEFAULT '',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `shipping_method` smallint(5) unsigned NOT NULL DEFAULT '0',
  `payment_method` smallint(5) unsigned NOT NULL DEFAULT '0',
  `order_status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `goods_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `shipping_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `order_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `memos` varchar(240) NOT NULL DEFAULT '',
  `created_date` int(10) unsigned NOT NULL DEFAULT '0',
  `payment_date` int(10) unsigned NOT NULL DEFAULT '0',
  `thirdparty_trade_id` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_order_consignee`;
CREATE TABLE `verydows_order_consignee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` char(15) NOT NULL DEFAULT '',
  `receiver` varchar(20) NOT NULL DEFAULT '',
  `province` varchar(20) NOT NULL DEFAULT '',
  `city` varchar(20) NOT NULL DEFAULT '',
  `borough` varchar(20) NOT NULL DEFAULT '',
  `address` varchar(240) NOT NULL DEFAULT '',
  `zip` char(6) NOT NULL DEFAULT '',
  `mobile` char(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_order_goods`;
CREATE TABLE `verydows_order_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` char(15) NOT NULL DEFAULT '',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_name` varchar(180) NOT NULL DEFAULT '',
  `goods_image` varchar(30) NOT NULL DEFAULT '',
  `goods_qty` smallint(5) NOT NULL DEFAULT '1',
  `goods_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `is_reviewed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_order_goods_optional`;
CREATE TABLE `verydows_order_goods_optional` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `map_id` int(10) unsigned NOT NULL DEFAULT '0',
  `opt_id` int(10) unsigned NOT NULL DEFAULT '0',
  `opt_type` varchar(20) NOT NULL DEFAULT '',
  `opt_text` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_order_log`;
CREATE TABLE `verydows_order_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` char(15) NOT NULL DEFAULT '',
  `admin_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `operate` char(10) NOT NULL,
  `cause` varchar(240) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_order_shipping`;
CREATE TABLE `verydows_order_shipping` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` char(15) NOT NULL DEFAULT '',
  `carrier_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `tracking_no` varchar(20) NOT NULL DEFAULT '',
  `memos` varchar(240) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_payment_method`;
CREATE TABLE `verydows_payment_method` (
  `id` tinyint(3) unsigned NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pcode` varchar(20) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `instruction` varchar(240) NOT NULL DEFAULT '',
  `seq` tinyint(2) unsigned NOT NULL DEFAULT '99',
  `enable` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `verydows_payment_method` VALUES
('1','余额支付','0','balance','[\"\"]','','2','1'),
('2','货到付款','1','cod','[\"\"]','','3','1'),
('3','支付宝','0','alipay','{\"seller\":\"\",\"partner\":\"\",\"key\":\"\"}','','1','1');


DROP TABLE IF EXISTS `verydows_request_error`;
CREATE TABLE `verydows_request_error` (
  `ip` char(15) NOT NULL DEFAULT '0.0.0.0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `count` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `lockout` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ip`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_role`;
CREATE TABLE `verydows_role` (
  `role_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL DEFAULT '',
  `role_desc` varchar(240) NOT NULL DEFAULT '',
  `role_acl` text NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_sendmail_limit`;
CREATE TABLE `verydows_sendmail_limit` (
  `ip` char(15) NOT NULL DEFAULT '',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type` char(30) NOT NULL DEFAULT '',
  `count` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_setting`;
CREATE TABLE `verydows_setting` (
  `sk` varchar(30) NOT NULL,
  `sv` text NOT NULL,
  PRIMARY KEY (`sk`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `verydows_setting` VALUES
('site_name','shop 开源电商系统'),
('home_title','shop 开源电子商务系统 | 轻松开启电商之旅'),
('home_keywords',''),
('home_description',''),
('footer_info','<div class=\"copyright mt10\"><p>联系邮箱：service@verydows.com<span class=\"sep\">|</span>QQ交流群：372701906<span class=\"sep\">|</span>Copyright © 2016 Verydows.com 版权所有</p></div>'),
('goods_search_per_num','20'),
('upload_filetype','.jpg|.jpeg|.gif|.png|.bmp|.swf|.flv|.avi|.rmvb'),
('upload_filesize','2MB'),
('captcha_admin_login','2'),
('captcha_user_login','2'),
('captcha_user_register','1'),
('captcha_feedback','1'),
('smtp_server','smtp.163.com'),
('smtp_user','test@163.com'),
('smtp_password',''),
('smtp_port','25'),
('smtp_secure',''),
('admin_mult_ip_login','0'),
('upload_goods_filesize','300KB'),
('visitor_stats','1'),
('goods_hot_searches',''),
('cate_goods_per_num','20'),
('goods_history_num','5'),
('goods_related_num','5'),
('goods_review_per_num','10'),
('upload_goods_filetype','.jpg|.png|.gif'),
('show_goods_stock','0'),
('order_cancel_expires','2'),
('goods_img_thumb','[{\"w\":350,\"h\":350},{\"w\":150,\"h\":150},{\"w\":100,\"h\":100},{\"w\":50,\"h\":50}]'),
('goods_album_thumb','[{\"w\":350,\"h\":350},{\"w\":50,\"h\":50}]'),
('enabled_theme','default'),
('user_consignee_limits','15'),
('upload_avatar_filesize','200KB'),
('order_delivery_expires','7'),
('user_register_email_verify','0'),
('user_review_approve','0'),
('rewrite_enable','1'),
('data_cache_lifetime','7200'),
('goods_fulltext_query','0'),
('debug','1'),
('rewrite_rule','{\"m\\/pay\\/return\\/<pcode>.html\":\"mobile\\/pay\\/return\",\"pay\\/return\\/<pcode>.html\":\"pay\\/return\",\"api\\/pay\\/notify\\/<pcode>\":\"api\\/pay\\/notify\",\"api\\/oauth\\/callback\\/<party>\":\"api\\/oauth\\/callback\",\"m\\/index.html\":\"mobile\\/main\\/index\",\"m\\/<c>\\/<a>.html\":\"mobile\\/<c>\\/<a>\",\"api\\/<c>\\/<a>\":\"api\\/<c>\\/<a>\",\"404.html\":\"main\\/404\",\"index.html\":\"main\\/index\",\"<c>\\/<a>.html\":\"<c>\\/<a>\"}'),
('encrypt_key','9e290273e0f7eeb6747911efb164b0b7');


DROP TABLE IF EXISTS `verydows_shipping_carrier`;
CREATE TABLE `verydows_shipping_carrier` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `tracking_url` varchar(255) NOT NULL DEFAULT '',
  `service_tel` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_shipping_method`;
CREATE TABLE `verydows_shipping_method` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `instruction` varchar(240) NOT NULL DEFAULT '',
  `seq` tinyint(2) unsigned NOT NULL DEFAULT '99',
  `enable` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `verydows_shipping_method` VALUES
('1','普通快递','{\"0\":{\"type\":\"fixed\",\"area\":\"0\",\"charges\":\"0\"}}','全国范围免邮','1','1'),
('2','邮政快递','{\"0\":{\"type\":\"fixed\",\"area\":[\"1\",\"2\"],\"charges\":\"20\"}}','','99','1'),
('3','邮政速递2','{\"0\":{\"type\":\"weight\",\"area\":[\"1\",\"2\",\"3\",\"4\"],\"first_weight\":\"5\",\"first_charges\":\"10\",\"added_weight\":\"1\",\"added_charges\":\"2\"}}','','99','1');


DROP TABLE IF EXISTS `verydows_user`;
CREATE TABLE `verydows_user` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(16) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `mobile` char(11) NOT NULL DEFAULT '',
  `avatar` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `email_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `mobile_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_user_account`;
CREATE TABLE `verydows_user_account` (
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `balance` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `points` int(10) unsigned NOT NULL DEFAULT '0',
  `exp` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_user_account_log`;
CREATE TABLE `verydows_user_account_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `admin_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `points` int(10) unsigned NOT NULL DEFAULT '0',
  `exp` int(10) unsigned NOT NULL DEFAULT '0',
  `cause` varchar(255) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_user_consignee`;
CREATE TABLE `verydows_user_consignee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `receiver` varchar(20) NOT NULL DEFAULT '',
  `province` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `city` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `borough` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `address` varchar(240) NOT NULL DEFAULT '',
  `zip` char(6) NOT NULL DEFAULT '',
  `mobile` char(11) NOT NULL DEFAULT '',
  `is_default` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_user_favorite`;
CREATE TABLE `verydows_user_favorite` (
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_id` mediumint(8) unsigned NOT NULL,
  `created_date` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`goods_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_user_group`;
CREATE TABLE `verydows_user_group` (
  `group_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(60) NOT NULL,
  `min_exp` int(10) unsigned NOT NULL DEFAULT '0',
  `discount_rate` tinyint(3) unsigned NOT NULL DEFAULT '100',
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `verydows_user_group` VALUES
('1','初级会员','0','100'),
('2','中级会员','2000','100'),
('3','高级会员','7000','100');


DROP TABLE IF EXISTS `verydows_user_oauth`;
CREATE TABLE `verydows_user_oauth` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `party` char(10) NOT NULL DEFAULT '',
  `oauth_key` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_user_profile`;
CREATE TABLE `verydows_user_profile` (
  `user_id` mediumint(8) unsigned NOT NULL,
  `nickname` varchar(30) NOT NULL DEFAULT '',
  `gender` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `birth_year` smallint(4) unsigned NOT NULL DEFAULT '0',
  `birth_month` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `birth_day` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `qq` varchar(15) NOT NULL DEFAULT '',
  `signature` varchar(120) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_user_record`;
CREATE TABLE `verydows_user_record` (
  `user_id` mediumint(8) unsigned NOT NULL,
  `created_date` int(10) unsigned NOT NULL DEFAULT '0',
  `created_ip` char(15) NOT NULL DEFAULT '0.0.0.0',
  `last_date` int(10) unsigned NOT NULL DEFAULT '0',
  `last_ip` char(15) NOT NULL DEFAULT '0.0.0.0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `verydows_visitor_stats`;
CREATE TABLE `verydows_visitor_stats` (
  `sessid` char(32) NOT NULL DEFAULT '',
  `ip` char(15) NOT NULL DEFAULT '0.0.0.0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `pv` smallint(5) unsigned NOT NULL DEFAULT '1',
  `referrer` varchar(80) NOT NULL DEFAULT '',
  `browser` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `platform` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `area` char(10) NOT NULL DEFAULT '',
  KEY `sessid` (`sessid`) USING BTREE,
  KEY `ip` (`ip`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `verydows_visitor_stats` VALUES
('078b7fef6aa03b5a7647a69c1eddd5a9','114.251.205.2','1502812800','14','127.0.0.1','3','1','北京市'),
('','127.0.0.1','1502869582','1','','1','0',''),
('','127.0.0.1','1502869935','1','','1','0',''),
('','127.0.0.1','1502870361','1','','1','0',''),
('','127.0.0.1','1502870374','1','','1','0',''),
('','127.0.0.1','1502870385','1','','1','0',''),
('','127.0.0.1','1502870423','1','','1','0',''),
('','127.0.0.1','1502870460','1','','1','0',''),
('','127.0.0.1','1502870621','1','','1','0',''),
('rbsfquca5q1riun4fb4nm8t0d1','127.0.0.1','1502870698','2','','2','0',''),
('vsu9n975eq4eut295jot14acm3','127.0.0.1','1503038739','1','','1','0',''),
('47261a37cf302a8acf6820e6099969b4','114.251.205.2','1502985600','2','127.0.0.1','3','1','北京市'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.164','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.166','1523721600','2','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','218.205.17.144','1523721600','1','verydows.com','2','3','江苏省无锡市'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.141','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.146','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.143','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.142','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','218.205.17.138','1523721600','2','verydows.com','2','3','江苏省无锡市'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.135','1523721600','2','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.167','1523721600','2','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','218.205.17.143','1523721600','1','verydows.com','2','3','江苏省无锡市'),
('9ef6b94d19994f0f5afb980cb00ea3d5','218.205.17.168','1523721600','1','verydows.com','2','3','江苏省无锡市'),
('9ef6b94d19994f0f5afb980cb00ea3d5','218.205.17.174','1523721600','1','verydows.com','2','3','江苏省无锡市'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.193','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.131','1523721600','3','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.151','1523721600','2','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.196','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.153','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','218.205.17.140','1523721600','1','verydows.com','2','3','江苏省无锡市'),
('9ef6b94d19994f0f5afb980cb00ea3d5','218.205.17.149','1523721600','1','verydows.com','2','3','江苏省无锡市'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.201','1523721600','2','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.206','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.160','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.130','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.186','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','218.205.17.148','1523721600','1','verydows.com','2','3','江苏省无锡市'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.195','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.202','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','218.205.17.209','1523721600','1','verydows.com','2','3','江苏省无锡市'),
('9ef6b94d19994f0f5afb980cb00ea3d5','218.205.17.163','1523721600','1','verydows.com','2','3','江苏省无锡市'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.163','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.182','1523721600','1','verydows.com','2','3','江苏省'),
('9ef6b94d19994f0f5afb980cb00ea3d5','221.178.182.162','1523721600','1','verydows.com','2','3','江苏省');



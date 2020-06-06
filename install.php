<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
   require_once("incfiles/config.php");
session_start();
session_unset(); 
session_destroy(); 
// --> Table account <--
mysql_query("CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50)  NOT NULL,
  `password` varchar(50)  NOT NULL,
  `email` varchar(50)  NOT NULL,
  `right` int(11)  NOT NULL,
  `vnd` int(11) NOT NULL,
  `postblog` int(11)  NOT NULL,
  `about` varchar(255) NOT NULL,
  `avt` varchar(255) NOT NULL,
  `color` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `google`  varchar(255) NOT NULL,
  `twitter`  varchar(255) NOT NULL,
  `status` int(11)  NOT NULL,
  PRIMARY KEY (`id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
");
// --> Table chuyenmuc <--
mysql_query("CREATE TABLE IF NOT EXISTS `chuyenmuc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mota` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
");
// --> Table contact <--
mysql_query("CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50)  NOT NULL,
  `email` varchar(50)  NOT NULL,
  `messger` text NOT NULL,
  `ghichu` text NOT NULL,
  PRIMARY KEY (`id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
");
// --> Table postblog <--
mysql_query("CREATE TABLE IF NOT EXISTS `postblog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namecm` int(11) NOT NULL,
  `user_id` varchar(50)  NOT NULL,
  `userpost` varchar(50)  NOT NULL,
  `title` varchar(255)  NOT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(255)  NOT NULL,
  `date` text NOT NULL,
  `view` int(11) NOT NULL,
  `tag` varchar(255)  NOT NULL,
  PRIMARY KEY (`id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
");
echo '<center><h2>Lắp đặt thành công! <p></h2> => Bước tiếp theo (Bước 3): <b>Đăng ký tài khoản</b></center>';
echo '<meta http-equiv="refresh" content="1;/registration.php">
';

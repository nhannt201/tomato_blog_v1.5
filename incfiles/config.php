<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
error_reporting(0);
$servername = "localhost"; 
$username = "";
$password = "";
$dbname = "";
$home = ''; //Địa chỉ trang chủ
//Máy chủ cập nhật
$txt_server_update = "https://www.giantcms.net/";
//Trang Facebook
$txt_url_page_fb = "https://www.facebook.com/Giant-Team-257084824766656/"; 
//Thiết lập hiển thị trang chủ
$show_cgt_home  = "true"; //Tắt hiển thị false
$num_show_thread = "3"; //Số bài viết mới hiển thị

require_once("mysql.php");


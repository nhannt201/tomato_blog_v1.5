<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí k
session_start();
require_once("incfiles/head.php"); 
require_once("incfiles/config.php"); 
 $keyadmin = md5(date("Y/m/d").$_SERVER['SERVER_NAME']);
 if($user['right'] ==1) {
if (isset($_GET['keyadmin'])) {
    $data = $_GET['keyadmin'];
    if ($data == $keyadmin) {
if (isset($_GET['up'])) {
    $link_up = base64_decode($_GET['up']);
    echo 'Please download Tomato Blog new...<p>';
    set_time_limit(0); 
$file = file_get_contents($link_up);
file_put_contents('upz.zip', $file);
echo 'Download complete!<p>';
echo 'Start unzip...<p>';
system('unzip -o upz.zip');
echo '<p>Update complete!<p>';
$myfile = fopen("admin/ver.txt", "w+") or die("Không thể thay thế phiên bản!");
 $ver = get_by_curl($txt_server_update."/ver/ver.txt");
fwrite($myfile, $ver);
fclose($myfile);
echo 'Cập nhật phiên bản mới hoàn tất!';
echo '<meta http-equiv="refresh" content="2;/admin/">';
//Chua ghi de duoc
}
} 
}
}
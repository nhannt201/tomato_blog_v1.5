<?php 
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
require_once("head.php");
#require_once("func.php");
require_once("../include/lang/vi-VN.php");
if($user['id'] && $user['right'] == 1 ){
    echo'<ul class="breadcrumb">
    <li class="active"><b>Dashboard</b></li></ul>';
 
//echo '<div><a href="addcm.php" class="btn btn-sm btn-default">Kiểm tra cập nhật</a></div><p>';
echo'<div class="panel-group"><div class="panel panel-default"><div class="panel-heading"> Thống Kê </div>
<div class="list-group-item">Tổng số bài viết :  '.$bv.'</div>
<div class="list-group-item"> Tổng số tác giả : '.$tg.'</div>
<div class="list-group-item"> Tổng lượt xem bài viết : '.$view.'   </div>
</div></div>';
   //kiem tra update
    echo '<form action="" method="POST">
<input type="submit"  class="btn btn-default" name="check_update" value="Kiểm tra cập nhật tự động" />
<input type="submit"  class="btn btn-default" name="check_update_tay" value="Kiểm tra cập nhật thủ công" />

</form>';
if (isset($_POST['check_update'])) {
   $ver = get_by_curl($txt_server_update."/ver/ver.txt");
   $txt_dw = get_by_curl($txt_server_update."/ver/down.txt");
    $link_up = base64_encode(get_by_curl($txt_server_update."/ver/url_up.txt"));
if (file_exists("ver.txt")) {
    $myfile = fopen("ver.txt", "r") or die("Ko the doc");
$ver_ht =  fgets($myfile);
//kiem tra ver
if ($ver_ht == $ver) {
    echo '<b>Kiểm tra cập nhật:</b> <i>Đây là phiên bản mới nhất!</i><p>';
} else {
    echo 'Yêu cầu máy chủ: '.$txt_dw.'<p>';
    $keyadmin = md5(date("Y/m/d").$_SERVER['SERVER_NAME']);
    echo '<meta http-equiv="refresh" content="2;/update.php?up='.$link_up.'&keyadmin='.$keyadmin.'">';
}
//dong kt ver
fclose($myfile);
} else {
$myfile = fopen("ver.txt", "w+") or die("Ko the check");
$txt = "1.1";
fwrite($myfile, $txt);
fclose($myfile);
}
}
//kiem tra thu cong
if (isset($_POST['check_update_tay'])) {
   $ver = get_by_curl($txt_server_update."/ver/ver.txt");
   $txt_dw = get_by_curl($txt_server_update."/ver/down.txt");
    $link_up = base64_encode(get_by_curl($txt_server_update."/ver/url_up.txt"));
if (file_exists("ver.txt")) {
    $myfile = fopen("ver.txt", "r") or die("Ko the doc");
$ver_ht =  fgets($myfile);
//kiem tra ver
if ($ver_ht == $ver) {
    echo '<b>Kiểm tra cập nhật:</b> <i>Đây là phiên bản mới nhất!</i><p>';
} else {
    echo 'Yêu cầu máy chủ: '.$txt_dw.'<p>';
    echo 'Bạn đang cập nhật thủ công. Vui lòng tải bạn cập nhật ở đây <a href="'.base64_decode($link_up).'">'.base64_decode($link_up).'</a>. Thông tin bản mới đã được cập nhật!<p>Điều này có nghĩa kiểm tra Update lần nữa sẽ không có bản cập nhật nào!<p>Do đó bạn tải bản cập nhật trên và giải nén bằng thủ công.';
  $myfile2 = fopen("ver.txt", "w+") or die("Không thể thay thế phiên bản!");
 $ver = get_by_curl($txt_server_update."/ver/ver.txt");
fwrite($myfile2, $ver);
fclose($myfile2);
}
//dong kt ver
fclose($myfile);
} else {
$myfile = fopen("ver.txt", "w+") or die("Ko the check");
$txt = "1.1";
fwrite($myfile, $txt);
fclose($myfile);
}
//end kt tc
}
//end kiem tra update
} 
require_once("foot.php");
?>


<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
$conn= mysql_connect($servername,$username,$password) or die("<html lang='vi'><head><title>Tomato Blog V.1</title><body>Cấu hình Config sai, không thể kết nối máy chủ!</body></html>");
mysql_select_db($dbname,$conn);
mysql_set_charset("utf8");
mysql_query("SET NAMES 'UTF8'");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
  if (!$conn->set_charset("utf8")) {
     // printf("Error loading character set utf8: %s", $conn->error);
  } else {
    //  printf("Current character set: %s", $conn->character_set_name());
  }
if ($conn->connect_error) {
    die("Kết nối thất bại, lỗi: " . $conn->connect_error);
} 

#Cấu hình META Blog
        //Thư mục cấu hình Blog
	    $folder_st = "admin/blog_st";
	    //Lấy thông tin Blog
        $title = $folder_st.'/title.txt'; if (file_exists($title)) {   $RDI = fopen($title, "r") or die("Thất bại khi đọc I!");  $titles = fgets($RDI); } else { $titles = "";}
    	$des = $folder_st.'/des.txt'; if (file_exists($des)) { $RDII = fopen($des, "r") or die("Thất bại khi đọc II!");  $description = fgets($RDII); } else { $description = "";}
	    $kw = $folder_st.'/kw.txt'; if (file_exists($kw)) {  $RDIII = fopen($kw, "r") or die("Thất bại khi đọc III!");  $keywords = fgets($RDIII); } else { $keywords = "";}
	    $intro = $folder_st.'/intro.txt'; if (file_exists($intro)) {  $RDIV = fopen($intro, "r") or die("Thất bại khi đọc III!");  $gioithieu = fgets($RDIV); } else { $gioithieu = "";}

	    //Tác giả
	     $author = "Giant Team";
?>
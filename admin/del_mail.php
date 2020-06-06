<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
session_start();
	require_once("../incfiles/config.php");
	require_once("../incfiles/func.php");
	require_once("../include/lang/vi-VN.php");
		if($user['id'] && $user['right'] ==1 ){
		    //xoa email thong bao contact
		   if (isset($_GET['id_mail'])) {
		       $ids = ($_GET['id_mail']);
		    $sql = "DELETE FROM contact WHERE id='$ids'";

if ($conn->query($sql) === TRUE) {
    echo "Email đã xoá!";
    echo'<meta http-equiv="refresh" content="0;url=ctc.php">  ';
} else {
     echo'<meta http-equiv="refresh" content="0;url=ctc.php">  ';
}
}
//xoa chuyen muc
		   if (isset($_GET['id_cmn'])) {
		       $ids = ($_GET['id_cmn']);
		    $sql = "DELETE FROM chuyenmuc WHERE id='$ids'";

if ($conn->query($sql) === TRUE) {
    echo "Chuyên mục đã xoá!";
    echo'<meta http-equiv="refresh" content="0;url=cmn.php">  ';
} else {
     echo'<meta http-equiv="refresh" content="0;url=cmn.php">  ';
}
		   } elseif (isset($_GET['id_bv'])) {
		       $ids = ($_GET['id_bv']);
		       $users = ($_GET['user']);
		       //tru bv cua member
		       $sql = "UPDATE account SET postblog = postblog - 1 WHERE username='$users'";

if (mysqli_query($conn, $sql)) {}
		       //xoa bai viet
		    $sql = "DELETE FROM postblog WHERE id='$ids'";

if ($conn->query($sql) === TRUE) {
    echo "Bài viết đã xoá!";
    echo'<meta http-equiv="refresh" content="0;url=posts.php">  ';
} else {
     echo'<meta http-equiv="refresh" content="0;url=posts.php">  ';
}
		   } 
		}else{
echo'<meta http-equiv="refresh" content="0;url=/">  ';
}
<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
require_once("incfiles/head.php"); 
require_once("include/lang/vi-VN.php");
require_once("incfiles/func.php");
	$id = intval($_GET['id']);
		$key_admin = base64_decode($_GET['keyadmintiontoken']);
	$baiviet = mysql_query("select * from postblog where id=".$id."");
	$row= mysql_fetch_array($baiviet);
	if(!$row['id']==0){
	        //check quyen edit admin
		   	if (isset($_GET['keyadmintiontoken'])) {
		   	    if ($key_admin == "TktsHH576699SD58_1sad5^_Sasd265_SSA444010120172") {
	     if(isset($_POST['del'])) {
						  	mysql_query("DELETE FROM postblog where id=".$id." ");
						  	echo'<div class="alert alert-success">Xoá bài viết thàng công</div>';
								exit;
						  }
	   echo'<div class="alert alert-warning" role="alert">Bạn có chắc chắn muốn xoá bài viết " '.($row['title']).' " không ?</div> ';
	    echo'<form method="POST"> 
						  <input type="submit" name="del" class="btn btn-success" value="Xác nhận">
						  </form>';

	}else{
echo'<center><div class="alert alert-danger" role="alert">Bài Viết Không Tồn Tại</div><center>';
}
} else {
    if ($user['id'] == $row['user_id']) {
	     if(isset($_POST['del'])) {
						  	mysql_query("DELETE FROM postblog where id=".$id." ");
						  	echo'<div class="alert alert-success">Xoá bài viết thàng công</div>';
								exit;
						  }
	 echo'<div class="alert alert-warning" role="alert">Bạn có chắc chắn muốn xoá bài viết " '.($row['title']).' " không ? </div>';
	    echo'<form method="POST"> 
						  <input type="submit" name="del" class="btn btn-success" value="Xác nhận">
						  </form>';
	}
}
}
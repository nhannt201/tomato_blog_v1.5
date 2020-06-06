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
		        if(isset($_POST['edit'])) {
							 	$title= (htmlspecialchars($_POST['title']));
								$noidung=$_POST['noidung'];
								$thumbnail=$_POST['thumbnail'];
								$date= gmdate("H:i:s | d-m-Y", time() + 3600*($timezone+date("I")));
								$chuyenmuc=$_POST['chuyenmuc'];
							if ($title=='' || $noidung=='')
							{
								echo'<div class="alert alert-danger" role="alert">'. $txt_not_empty.'</div> ';
							}
							else {
									$capnhat = "UPDATE postblog SET namecm='$chuyenmuc', title='$title', content='$noidung', thumbnail='$thumbnail', date='$date' WHERE id='$id'";
if ($conn->query($capnhat) === TRUE) {
 	   echo '<div class="alert alert-success" role="alert">'.$txt_edit_ok.'</div>';
 	    	   echo '<meta http-equiv="refresh" content="1;/">';
} else {
 //  echo "Error updating record: " . $conn->error; 
    echo '<div class="alert alert-danger" role="alert">'.$txt_edit_fail.'</div>';
}
							
								   	exit;
							}
							}
							echo'<div class="list-group-item"><form method="POST" action="edit_post.php?id='.$id.'&keyadmintiontoken='.base64_encode($key_admin).'">
							<label>Tiêu đề *:</label>
								      <input type="text" class="form-control" name ="title" placeholder="tên bài viết" value="'.($row['title']).'">
								      <label>Nội dung *:</label>
								      <textarea name="noidung" class="ckeditor" rows="10" cols="80">
								      		'.($row['content']).'
								      </textarea>
								      <label>Ảnh Thumbnail *:</label>
								      <input type="text" class="form-control" name ="thumbnail" placeholder="Đường dẩn ảnh" value="'.$row['thumbnail'].'"><label>Chuyên Mục *:</label>
								      <select class="form-control" name="chuyenmuc">';
								 
								  	$str="select * from chuyenmuc";
				  					$kq= mysql_query($str);
				  					//Bat dau cai nay: Cai nay se kiem tra chuyen muc luu truoc do
				  					$id_cm = $row['namecm'];
				  						$cm_chinh ="select * from chuyenmuc where id='$id_cm'";
				  							$lums = mysql_query($cm_chinh);
				  							$lumx = $row=mysql_fetch_array($lums);
				  						if ($lumx['name'] == "") {} else {echo'<option value="'.$lumx['id'].'">'.$lumx['name'].'</label>'; }
				  					//Roi lai het cai nay
								  	while($row=mysql_fetch_array($kq))
							  			{ 
							  			    if ($lumx['id'] == $row['id']) { } else { echo'<option value="'.$row['id'].'">'.$row['name'].'</label>'; }
							  			}
								      echo'</select><br><button type="submit" name="edit" class="btn btn-defualt">Edit</button></form></div><br/>'; 
		    } else{
	    echo'<div class="alert alert-danger" role="alert">'.$txt_no_edit_thread.'</div>';
	}
		   	} 
		    else { //nguoc lai thi check quyen tacgia
	if($user['id'] == $row['user_id']) {

	 if(isset($_POST['edit'])) {
							 	$title= (htmlspecialchars($_POST['title']));
								$noidung=($_POST['noidung']);
								$thumbnail=$_POST['thumbnail'];
								$date= gmdate("H:i:s | d-m-Y", time() + 3600*($timezone+date("I")));
								$chuyenmuc=$_POST['chuyenmuc'];
							if ($title=='' || $noidung=='')
							{
								echo'<div class="alert alert-danger" role="alert">'. $txt_not_empty.'</div> ';
							}
							else {
								$capnhat = "UPDATE postblog SET namecm='$chuyenmuc', title='$title', content='$noidung', thumbnail='$thumbnail', date='$date' WHERE id='$id'";
if ($conn->query($capnhat) === TRUE) {
 	   echo '<div class="alert alert-success" role="alert">'.$txt_edit_ok.'</div>';
 	   echo '<meta http-equiv="refresh" content="1;/">';

} else {
 //  echo "Error updating record: " . $conn->error; 
    echo '<div class="alert alert-danger" role="alert">'.$txt_edit_fail.'</div>';
}
							
								   	exit;
							}
							}
							echo'<div class="list-group-item"><form method="POST" action="edit_post.php?id='.$id.'">
							<label>Tiêu đề *:</label>
								      <input type="text" class="form-control" name ="title" placeholder="tên bài viết" value="'.($row['title']).'">
								      <label>Nội dung *:</label>
								      <textarea name="noidung" class="ckeditor" rows="10" cols="80">
								      		'.($row['content']).'
								      </textarea>
								      <label>Ảnh Thumbnail *:</label>
								      <input type="text" class="form-control" name ="thumbnail" placeholder="Đường dẩn ảnh" value="'.$row['thumbnail'].'"><label>Chuyên Mục *:</label>
								      <select class="form-control" name="chuyenmuc">';
								 
								  	$str="select * from chuyenmuc";
				  					$kq= mysql_query($str);
								  	//Bat dau cai nay: Cai nay se kiem tra chuyen muc luu truoc do
				  					$id_cm = $row['namecm'];
				  						$cm_chinh ="select * from chuyenmuc where id='$id_cm'";
				  							$lums = mysql_query($cm_chinh);
				  							$lumx = $row=mysql_fetch_array($lums);
				  									  						if ($lumx['name'] == "") {} else {echo'<option value="'.$lumx['id'].'">'.$lumx['name'].'</label>'; }
				  					//Roi lai het cai nay
								  	while($row=mysql_fetch_array($kq))
							  			{ 
							  			    if ($lumx['id'] == $row['id']) { } else { echo'<option value="'.$row['id'].'">'.$row['name'].'</label>'; }
							  			}
								      echo'</select><br><button type="submit" name="edit" class="btn btn-defualt">Edit</button></form></div><br/>';
	}else{
	    echo'<div class="alert alert-danger" role="alert">'.$txt_no_edit_thread.'</div>';
	}
		    }
	}else{
	     echo'<center><div class="alert alert-danger" role="alert">'.$txt_none_thread.'</div><center>';
	}
					
	require_once("incfiles/foot.php"); 
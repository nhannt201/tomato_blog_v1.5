<?php 
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
require_once("head.php");
if($user['id'] && $user['right'] ==1 ){
							 if(isset($_POST['addcm'])) {
							 	$name= $_POST['name'];
								$mota=$_POST['mota'];
								$sql = "select * from chuyenmuc where name = '$name'";
								$query = mysql_query($sql);
								$num_rows = mysql_num_rows($query);
								if ($num_rows>0) {
										echo '<div class="alert alert-warning" role="alert">'.$txt_cg_name.'</div>';
									}
								else 
									if ($name == '')
										echo '<div class="alert alert-danger" role="alert">'.$txt_not_empty.'</div>';
									else 
									{
							mysql_query("INSERT INTO `chuyenmuc`(`name`, `mota`) VALUES ('".$name."','".$mota."')");
										echo '<div class="alert alert-success" role="alert">'.$txt_add_db.'</div>';
									}
								
							 }
							 echo'<div class="panel panel-default">
      <div class="panel-heading">Tổng số Chuyên Mục : '.$cm.'</div><div class="list-group-item">';
echo'<form action="addcm.php" method="POST"><label>Tên Chuyên Mục:</label><input type="text" class="form-control" name ="name" placeholder="'.$txt_post_phl_name.'"><label>Mô tả:</label>
<textarea type="text" class="form-control" name="mota" placeholder="'.$txt_post_phl_des.'"></textarea>
<br/><button type="submit" name="addcm" class="btn btn-default">'.$txt_btn_post.'</button></form></div></div></div>';




}
require_once("incfiles/foot.php");
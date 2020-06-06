<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
 require_once("incfiles/head.php");
 require_once("include/lang/vi-VN.php");
if (isset($_SESSION['username']) && $user['status']==1) {
   if(isset($_POST['post'])) {
							 	$tieude=  (strip_tags(htmlspecialchars($_POST['tieude'])));
								$noidung= ($_POST['noidung']);
								$thumbnail=$_POST['thumbnail'];
								$date= gmdate("H:i:s | d-m-Y", time() + 3600*($timezone+date("I")));
								$chuyenmuc = $_POST['chuyenmuc'];
								if ($chuyenmuc == "") {
								    $chuyenmuc = "None";
								}
								$usernamepost = $_SESSION['username'];
								$useridpost = $user['id'];
								$datetime = date("Y-m-d H:i:s");
			                 	$time = time();
			                 
							if ($tieude=='' || $noidung==''  ||  $chuyenmuc=='')
							{
								echo '<div class="alert alert-danger" role="alert">'.$txt_not_empty.'</div>';
							}
							else {
							//	mysql_query("INSERT INTO 'postblog'('namecm','userpost', 'title','content','thumbnail','date') 
						//	VALUES (".$chuyenmuc.",".$usernamepost.",".$tieude.",".$noidung.",".$thumbnail.",".$date.")");
							
								//add db
							mysql_query("UPDATE `account` SET `vnd`='" . ($user['vnd'] + 500) . "', `postblog`='" . ($user['postblog'] + 1) . "' WHERE `id` = '".$user['id']."'");
								$sql = "INSERT INTO postblog (namecm, user_id, userpost, title, content, thumbnail, date)
VALUES ('$chuyenmuc', '$useridpost', '$usernamepost', '$tieude', '$noidung', '$thumbnail','$date')";

if ($conn->query($sql) === TRUE) {
   	echo '<div class="alert alert-success" role="alert">'.$txt_add_thead.' ...... '.$bv.'</div>';
   	
   	echo "<meta http-equiv='refresh' content='0;url=/'>";
   		exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
								//end add
							
}
							
								
							
							
							 }  








 echo '	<div class="list-group-item"><form action="write_post.php" method="POST"> <label>Chủ đề *:</label>
 <input type="text" class="form-control" name ="tieude" placeholder="'.$txt_post_phl_title.'">
 <label>Nội dung *:</label><textarea id="editor1" name="noidung" rows="10"></textarea>';
?> <script>CKEDITOR.replace( 'editor1' );</script> <?php
 echo'<br/>
<label>Ảnh Thumbnail:</label>
<input type="text" class="form-control" name ="thumbnail" placeholder="'.$txt_post_phl_path.'"><label>Chuyên mục *:</label><select class="form-control" name="chuyenmuc">';
								  	$str="select * from chuyenmuc";
				  					$kq= mysql_query($str);
								  	while($row=mysql_fetch_array($kq))
							  			{ 
							  			echo'<option value="'.$row['id'].'">'.$row['name'].'</option>'; 
							  			}
								
							 echo' </select><br/><button type="submit" name="post" class="btn btn-defualt">'.$txt_btn_add.'</button>
							</form></div><br/>';
}else{
   echo'<div class="alert alert-danger" role="alert">Bạn không có quyền đăng bài!</div>'; 
}
 require_once("incfiles/foot.php");
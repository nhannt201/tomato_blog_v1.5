<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
require_once("incfiles/head.php");
require_once("incfiles/func.php");
#Ngôn Ngữ
require_once("include/lang/vi-VN.php");
if (isset($_SESSION['username'])) {
   if(isset($_POST['post'])) {
       $pass = htmlspecialchars($_POST['password']);
       $about = htmlspecialchars($_POST['about']);
       $email = htmlspecialchars($_POST['email']);
       $avt = htmlspecialchars($_POST['avt']);
       $facebook = htmlspecialchars($_POST['facebook']);
       $google = htmlspecialchars($_POST['google']);
       $twitter = htmlspecialchars($_POST['twitter']);
							if ($pass=='')
							{
								echo '<div class="alert alert-danger" role="alert">'.$txt_not_empty.'</div>';
							}else {
							   mysql_query("UPDATE `account` SET `password`='" .$pass. "', `email`='" .$email. "', `about`='" .$about. "', `avt`='" .$avt. "', `color`='" .$color. "', `facebook`='" .$facebook. "', `google`='" .$google. "', `twitter`='" .$twitter. "' WHERE `id` = '".$user['id']."'"); 
							   echo '<div class="alert alert-success" role="alert">Chỉnh Sửa Thành Công </div>';
							
								   	exit;
							    
							}
   }
   
   
echo '	<div class="list-group-item"><form action="edit_user.php" method="POST"> <label>Username *:</label>
 <input type="text" class="form-control" placeholder="Tên đăng nhập của bạn (Vui lòng viết liền không dấu)" value="'.$user['username'].'" disabled>
 <label>Password *:</label>
 <input type="text" class="form-control" name ="password" placeholder="Mật Khẩu của bạn" value="'.$user['password'].'">
 <label>Email *:</label>
 <input type="email" class="form-control" name ="email" placeholder="Nhập Email của bạn" value="'.$user['email'].'">
 <label>About *:</label><textarea class="form-control" name="about" rows="5">';
 if(!$user['about']){
 echo 'Con người sinh ra không phải để tan biến đi như một hạt cát vô danh. Họ sinh ra để in dấu lại trên mặt đất, in dấu lại trong trái tim người khác';
}else{
  echo $user['about'];  
}
 echo'</textarea>
 <label>AVT:</label>
<input type="url" class="form-control" name ="avt" placeholder="Nhập đường dẫn Avt Của bạn" value="'.$user['avt'].'">
 <label> Facebook :</label>
 <input type="text" class="form-control" name ="facebook" placeholder="Link trang cá nhân facebook của bạn" value="'.$user['facebook'].'">
 <label>Google :</label>
 <input type="text" class="form-control" name ="google" placeholder="link trang cá nhân google plus của bạn or gmail của bạn" value="'.$user['google'].'">
 <label>Twitter:</label>
 <input type="text" class="form-control" name ="twitter" placeholder="link trang cá nhân twitter của bạn" value="'.$user['twitter'].'">
<br/><button type="submit" name="post" class="btn btn-defualt">Cập Nhật</button>
							</form></div><br/>';   
   
   
   
   
}


	require_once("incfiles/foot.php"); 
<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
require_once("incfiles/head.php");
require_once("incfiles/func.php");
#Ngôn Ngữ
#require_once("include/lang/vi-VN.php");
$id = $_GET['user'];
$data = mysql_query("select * from account where username='$id'");
	$row= mysql_fetch_array($data);
	echo'<div class="container">';
	if(!$row['id']==0){
echo'<div class="panel panel-default"><div class="list-group-item"><div class="row">
      <div class="col-md-2">';
        if(!$row['avt']){
          echo' <img src="http://i.imgur.com/A8S2aBq.jpg" class="media-object img-thumbnail" alt="" style="width: 100%; height: auto;" />';
        }else{
 echo' <img src="'.$row['avt'].'"  class="media-object img-thumbnail" alt="" style="width: 100%; height: auto;"/>';
        }
           echo'</div><div class="col-md-10"><div class="panel-body">
        <h4 class="media-heading" style="text-transform: capitalize;"><b><i class="fa fa-user"></i> '.$row['username'].' </b><br/><small>';
        if($row['right']==1){
                echo'Administrator';
                }else{
                    echo'Tác giả';
                }
        echo'</small></h4>';
                
                if(!$row['about']) {
                echo'<span><i class="fa fa-bullhorn" aria-hidden="true"></i> Con người sinh ra không phải để tan biến đi như một hạt cát vô danh. Họ sinh ra để in dấu lại trên mặt đất, in dấu lại trong trái tim người khác</span>';
                }else{
                    
             echo'<span><i class="fa fa-bullhorn" aria-hidden="true"></i> '.$row['about'].'</span>';
                }
                if($user['username'] == $row['username']){
                    echo'<small><hr style=" margin-top: 5px; margin-bottom: 5px; ">Tiền lương :  '.$row['vnd'].' VND <br/> Số bài đăng :  '.$row['postblog'].' bài </small>';
                    echo '<br/><a href="/edit_user.php" class="btn btn-sm btn-default"> Chỉnh Sửa</a> ';
                }
           echo'</div></div></div></div><div class="btn-group btn-group-justified">
    <a class="btn btn-default" href="'.$row['facebook'].'" ><i class="fa fa-facebook"></i> Facebook </a> 
    <a class="btn btn-default" href="'.$row['google'].'" ><i class="fa fa-google"></i> Google </a> 
    <a class="btn btn-default" href="'.$row['twitter'].'" ><i class="fa fa-twitter"></i> Twitter </a> 
     </div>  </div> ';
}else{
    echo'<div class="alert alert-danger" role="alert">Người Dùng Không Tồn Tại</div>';
}
echo'</div>';
	require_once("incfiles/foot.php"); 
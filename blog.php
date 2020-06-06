<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
require_once("incfiles/head.php"); 
require_once("include/lang/vi-VN.php");
$name = $_GET['name'];
	$id = intval($_GET['id']);
	$baiviet = mysql_query("select * from postblog where id=".$id."");
	$row= mysql_fetch_array($baiviet);
	if($row['id'] == 0){
	    echo'<center><div class="alert alert-danger" role="alert">'. $txt_nerver_thead.'</div></center>';
	}else{
	  mysql_query("UPDATE postblog SET view = view + 1 WHERE id = $id");
	  echo'<div class="row"><div class="col-md-9">';
	echo'<div class="list-group"><div class="list-group-item">';
	
	$checktitle = (strtolower(vinarw(trim(($row['title'])))));
	$refs = $home.'/'.(strtolower(vinarw(trim(($row['title']))))).'_'.$row['id'].'.html';
	if ($name == $checktitle) {} else { echo '<meta http-equiv="refresh" content="0;'.$refs.'">'; }
			echo'<center><h1> '.(($row['title'])).' </h1>';
	//	echo'<p><a href="http://www.facebook.com/sharer/sharer.php?u='.$refs.'" class="btn btn-sm btn-default" rel="nofollow" target="_blank" title="'.$txt_share_facebook.'"><i class="fa fa-facebook" aria-hidden="true"></i> '.$txt_share_facebook.'</a>  <a href="http://plus.google.com/share?url='.$refs.'" class="btn btn-sm btn-default" rel="nofollow" target="_blank" title="'.$txt_share_google.'"><i class="fa fa-google" aria-hidden="true"></i> '.$txt_share_google.'</a>';
	//		echo'</p></center>';
			echo "<hr/>".$txt_post_by." <i><b><a href='/user.".$row['userpost'].".html'>".$row['userpost']."</a></b></i> - <b>".$row['date']." | </b>".$txt_view."<b>".$row['view']."</b></center><hr/>";
			//quyen chinh sua admin
			 if ($row0['right'] == "1") {
          		$editss = ' <a href="/edit_post.php?id='.$row['id'].'&keyadmintiontoken='.base64_encode("TktsHH576699SD58_1sad5^_Sasd265_SSA444010120172").'"> '.$txt_edit.'</a> - <a href="/del_post.php?id='.$row['id'].'&keyadmintiontoken='.base64_encode("TktsHH576699SD58_1sad5^_Sasd265_SSA444010120172").'">'.$txt_delete.'</a>';

       } else {
           	//member sua
			if ($user['id'] == $row['user_id']) $editss = ' <a href="/edit_post.php?id='.$row['id'].'"> '.$txt_edit.'</a> - <a href="/del_post.php?id='.$row['id'].'">'.$txt_delete.'</a>';
		
       }
			//end quyen
echo '<div align="right">'.$editss.'</div>';
echo ($row['content']);
			echo'</div></div>';
$usp = mysql_query("SELECT * FROM `account` WHERE `id` = '".$row['user_id']."'");
$tacgia = mysql_fetch_assoc($usp);	
	echo '<div class="panel-group"><div class="panel panel-default"><div class="panel-heading">'.$txt_about_user.' : </div>';
echo'<div class="list-group-item"><div class="media"><a class="pull-left">';
if(!$tacgia['avt']){
      echo'<img class="media-object" alt="" src="http://i.imgur.com/A8S2aBq.jpg" style="width: 64px !important;height: 64px !important;">';
}else{
     echo'<img class="media-object" alt="" src="'.$tacgia['avt'].'" style="width: 64px !important;height: 64px !important;">';
}
if ($tacgia['username'] == $txt_rp1_us) {
      $tentacgia = $txt_rp1_to;
} else {
    $tentacgia = $tacgia['username'];
}
      echo'</a><div class="media-body"><h4 class="media-heading"><small><i class="fa fa-user"> </i></small> <b style="'.$tacgia['color'].'text-transform: capitalize;"><a href="/user.'.$tentacgia.'.html">'.$tentacgia.'</a></b></h4>';
      if(!$tacgia['about']){
          echo $txt_about_tg;
      }else{
          
      echo $tacgia['about'];
      }
echo'</div></div></div></div></div>';
			echo'</div><div class="col-md-3">';
			echo'<div class="panel-group"><div class="panel panel-default"><div class="panel-heading">Chia sẻ trang này</div>';
echo'<div class="panel-body"><center><!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_google_plus"></a>
<a class="a2a_button_facebook_messenger"></a>
<a class="a2a_button_line"></a>
<a class="a2a_button_skype"></a>
</div>
<script>
var a2a_config = a2a_config || {};
a2a_config.locale = "vi";
</script>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END --></center></div>';
					  			echo'</center></div></div>';
echo'<div class="panel-group"><div class="panel panel-default"><div class="panel-heading">'.$txt_page_text_fb.'</div>';
echo'<center><div class="fb-page" data-href="'.$txt_url_page_fb.'" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="'.$txt_url_page_fb.'" class="fb-xfbml-parse-ignore"><a href="'.$txt_url_page_fb.'">'.$txt_page_name.'</a></blockquote></div>';
					  			echo'</center></div></div>';
	echo'<div class="panel-group"><div class="panel panel-default"><div class="panel-heading">'.$txt_cag_name.'</div>';
$raw = mysql_query("SELECT * FROM `chuyenmuc`");
$i = 0;
while ($res = mysql_fetch_assoc($raw)) {
echo '<a class="list-group-item" href="/cm.php?cm_id='.$res['id'].'">';
echo '<b>' .$res['name'].'</b>';
echo '</a>';
++$i;
}
echo'</div></div>';
echo'<div class="panel panel-default"><ul class="nav nav-tabs">
    <li class="active"><!--<a data-toggle="tab" href="#1">'.$txt_tab_int.'</a></li>-->
    <li><a data-toggle="tab" href="#2">'.$txt_tab_bigview.'</a></li>
    <li><a data-toggle="tab" href="#3">'.$txt_tab_in_cag.'</a></li></ul>
<div class="tab-content">
    <div id="1" class="tab-pane fade in active">';
$req = mysql_query("SELECT * FROM `postblog` WHERE `id`!='$id' ORDER BY RAND() LIMIT 10");
$total = mysql_num_rows($req);
if($total=0) {
    echo'<div class="list-group-item">'.$txt_find_not_td.'</div>';
}else{
while ($res = mysql_fetch_assoc($req)) {
echo '<a href="'.$home.'/'.(strtolower(vinarw(($res['title'])))).'_'.$res['id'].'.html" class="list-group-item">' . strip_tags(($res['title'])) . '</a>';
++$i;
}

}
echo'</div>';
echo'<div id="2" class="tab-pane fade">';
      $sql = mysql_query("SELECT * FROM `postblog` order by view desc limit 10 ");
while($arr = mysql_fetch_assoc($sql)){
echo '<a href="'.$home.'/'.(strtolower(vinarw(($arr['title'])))).'_'.$arr['id'].'.html" class="list-group-item">' . strip_tags(($arr['title'])) . '</a>';
}
echo'    </div>
    <div id="3" class="tab-pane fade">';
$reg = mysql_query("SELECT * FROM `postblog` WHERE `namecm`='".$row['namecm']."' ORDER BY RAND() LIMIT 10");
$total1 = mysql_num_rows($reg);
if($total1=0) {
    echo'<div class="list-group-item">'.$txt_find_not_td.'nào</div>';
}else{
while ($ref = mysql_fetch_assoc($reg)) {
echo '<a href="'.$home.'/'.(strtolower(vinarw(($ref['title'])))).'_'.$ref['id'].'.html" class="list-group-item">' . strip_tags(($ref['title'])) . '</a>';
++$i;
}
}
echo'</div></div></div>';

echo'</div></div>';


			echo'<style>img {
    border-radius: 5px;
    display: block;
    margin-left: auto !important;
    margin-right: auto !important;
    width: 70% !important;
    height: auto !important;
}
</style>';
echo'<div class="panel-group"><div class="panel panel-default"><div class="panel-heading">'.$txt_cmt_fb.' </div>
<div class="list-group-item"><div class="fb-comments" data-href="'.$refs.'" data-width="100%" data-numposts="5"></div></div></div></div>';
	}
	
require_once("incfiles/foot.php");
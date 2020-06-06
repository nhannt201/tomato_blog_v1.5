<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
error_reporting(0);
   require_once("incfiles/config.php");
// Check connection
$sql_test = "SELECT id FROM account";
$next = $conn->query($sql_test);
require_once("incfiles/head.php");
if ($next->num_rows <= 0) {
    //echo '<html lang="vi"><head><title>Tomato Blog v.1</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head><body><center><img src="https://s-media-cache-ak0.pinimg.com/originals/50/48/81/5048811be9c3121490b514b6dcc0e9fb.jpg"/><p><object width="50%" height="50%" data="huong-dan.txt"></object><b>Bạn chưa cài đặt Code! Vui lòng đọc tệp huong-dan.txt</b></center></body></html>';
    require_once("ins.php");
} else {

#Ngôn Ngữ
require_once("include/lang/vi-VN.php");
#Cache Index
//require_once("incfiles/top-cache.php");
//require_once("incfiles/bottom-cache.php");
    

	//  TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(id) as total from postblog');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        
        // TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = $num_show_thread;
        
        // TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
        
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        
        // Tìm Start
        $start = ($current_page - 1) * $limit;
	echo'<div class="row"><div class="col-md-9">';
	echo'<div class="panel-group"><div class="panel panel-default"><div class="panel-heading">'.$txt_show_new_thead.'</div>';
echo'<div class="list-group">';
$str="select * from postblog order by id desc limit  $start, $limit";
					  	$kq= mysql_query($str);
						if(mysql_num_rows($kq) == 0)
					  		echo '<div class="list-group-item">'.$txt_no_thread.'</div>';
					  	else 
					  		while($reg=mysql_fetch_array($kq))
					  			{
					  			    					    $dess = (strip_tags(trim(($reg['content'])))); 
					  				echo'<a class="list-group-item" href="/'.(strtolower(vinarw(convert_vi_to_en(trim(($reg['title'])))))).'_'.$reg['id'].'.html">';
					  				echo'<div class="row"> <div class="col-md-3">';
					  				//lay anh tu dong
					  			//	$html = (($reg['content']));


//$newDom = new DOMDocument();
//@$newDom->loadHTML($html);
//$tag = $newDom->getElementsByTagName('img');
//foreach ($tag as $tag1) { //dung khi muon lay nhieu anh
   //    echo $tag->getAttribute('src');
//}
					  				//ket thuc
					  				if(!$reg['thumbnail']){
					  				    echo'<img src="http://i.imgur.com/elulRf1.png" width="90%" height="120px"> ';
					  				    }else{
					  				      echo'<img src="'.$reg['thumbnail'].'" width="90%" height="120px"> ';  
					  				    }
										echo'</div><div class="col-md-9"><h4><b> '.(($reg['title'])).'</b></h4>'; 
										echo '<br/>'._substr($dess,350).'</div></div></a>';
					  			}
					  			
					  		
        // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
echo'<div class="list-group-item"><center><ul class="pagination">';
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<li><a href="index.php?page='.($current_page-1).'"><<</a> </li>';
            }
            else{
                //echo '<span>Prev</span> | ';
            }
    
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<li class="active"><a>'.$i.'</a></li> ';
                }
                else{
                    echo '<li><a href="index.php?page='.$i.'">'.$i.'</a> </li> ';
                }
            }
            
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<li><a href="index.php?page='.($current_page+1).'">>></a> </li> ';
            }
            else{
               // echo '<span>Next</span> | ';
            }
            			echo ' </ul></center>';
            			//Bắt đầu add-on trang chủ
            			if ($show_cgt_home == "true") {
            $raw = mysql_query("SELECT * FROM `chuyenmuc`");
$i = 0;
while ($res = mysql_fetch_assoc($raw)) {
					  $idss = $res['id'];
					  			echo '<div class="panel panel-default">
  <div class="panel-heading">'.$res['name'].'</div>
  <div class="panel-body">  
  <div class="row">';
                 $baitum = mysql_query("SELECT * FROM postblog WHERE namecm = '$idss' ORDER BY id DESC LIMIT 3");
                 $x = 0;
while ($gety = mysql_fetch_assoc($baitum)) {
   //Kiem tra anh thu nho
   if(!$gety['thumbnail']){
      
					  				   $linkim = "http://i.imgur.com/elulRf1.png";
					  				    }else{
					  				        $linkim = $gety['thumbnail'];
					  				    }
					  				     $check_anh = getimagesize($linkim);
					  				     $width = $check_anh[0];
                                         $height = $check_anh[1];
	//Lay data SQL
	$tieudeA = (strip_tags(trim(($gety['title'])))); 
	//end
  echo '
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img data-src="'.$linkim.'" src="'.$linkim.'" width="100%" height="120px">
      <div class="caption">
        <p>'._substr($tieudeA,200).'</p>
      

        <p><a href="/'.(strtolower(vinarw(convert_vi_to_en(trim(($gety['title'])))))).'_'.$gety['id'].'.html"" class="btn btn-primary" role="button">'.$txt_view_more.'</a> </p>
      </div>
    </div>
  </div>'; 
++$x;
}
echo '</div></div></div>';
++$i;
}
}
//Kết thúc add-on trang chủ
					  			echo'</div></div></div></div></div>'; 
					  			echo '<div class="col-md-3">';
					  			echo'<div class="panel-group"><div class="panel panel-default"><div class="panel-heading">'.$txt_thread_max_view.'</div>';
 $postview = mysql_query("SELECT * FROM `postblog` order by view desc limit 5 ");
while($arr = mysql_fetch_assoc($postview)){
echo '<a href="/'.(strtolower(vinarw(($arr['title'])))).'_'.$arr['id'].'.html" title="'.($arr['title']).'"  class="list-group-item" >' . strip_tags(($arr['title'])) . '</a>';
}
					  			echo'</div></div>';
					  			
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
echo'<div class="panel-group"><div class="panel panel-default"><div class="panel-heading">'.$txt_page_text_fb.'</div>';
echo'<center><div class="fb-page" data-href="'.$txt_url_page_fb.'" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="'.$txt_url_page_fb.'" class="fb-xfbml-parse-ignore"><a href="'.$txt_url_page_fb.'">'.$txt_page_name.'</a></blockquote></div>';
					  			echo'</center></div></div>';
echo'</div></div>';
require_once("incfiles/foot.php");
}

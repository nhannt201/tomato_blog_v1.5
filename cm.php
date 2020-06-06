<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
require_once("incfiles/head.php");
require_once("incfiles/func.php");
#Ngôn Ngữ
require_once("include/lang/vi-VN.php");
#Cache Index
#require_once("incfiles/top-cache.php");
#require_once("incfiles/bottom-cache.php");
$id=intval($_GET['cm_id']);
	$cm = mysql_query("select * from chuyenmuc where id=".$id."");
	$raw = mysql_fetch_array($cm);
	echo'<div class="row">
  <div class="col-md-9">';
					echo'<div class="panel-group"><div class="panel panel-default"><div class="panel-heading">'.$txt_cgt. $raw['name'].'  </div>'; 
					//  TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(id) as total from postblog Where namecm = '.$raw['id'].'');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        
        // TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 5;
        
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
$result=  mysql_query("select * from postblog where namecm=".$id." limit  $start, $limit");
								if(mysql_num_rows($result) == 0)
									echo'<div class="list-group-item">'.$txt_no_thread.'</div>';
								else
								while($row = mysql_fetch_array($result)){

											$url= (strtolower(vinarw(($row['title']))));
 $dess = (strip_tags(trim(($row['content']))));								
									echo'<div class="list-group-item">
										<div class="row">
											<div class="col-sm-3">
												<center>';
												if($row['thumbnail'] =='' ){ echo'<img class="thumbnail" src="http://i.imgur.com/iU8A6qT.jpg" width="90%">';
												}else{
												echo'<img class="thumbnail" src="'.$row['thumbnail'].'" width="90%">';}
												echo'</center>
											</div>
											<div class="col-sm-9">
												<h3><a href="/'.$url.'_'.$row['id'].'.html">'.($row['title']).'</a></h3>
												<i class="fa fa-user" aria-hidden="true"></i> Author : '.$row['userpost'].'<br/>
												<i class="fa fa-calendar" aria-hidden="true"></i> '.$row['date'].'<br/>'.cat($dess,300).'<br/>
												<a class="btn btn-default" href="/'.$url.'_'.$row['id'].'.html">'.$txt_next_view.'</a></div>
											</div>
										</div>';
								}
								 // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
echo'<div class="list-group-item"><center><ul class="pagination">';
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<li><a href="cm.php?cm_id='.$id.'&page='.($current_page-1).'"><<</a> </li>';
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
                    echo '<li><a href="cm.php?cm_id='.$id.'&page='.$i.'">'.$i.'</a> </li> ';
                }
            }
            
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<li><a href="cm.php?cm_id='.$id.'&page='.($current_page+1).'">>></a> </li> ';
            }
            else{
               // echo '<span>Next</span> | ';
            }
					  			 
					  			echo' </ul></center></div>';
								echo'</div></div></div><div class="col-md-3">';
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
					 $bvm="select * from postblog order by id desc limit 10";
					 echo'<div class="panel-group"><div class="panel panel-default"><div class="panel-heading">'.$txt_text_new_thread.'  </div>';
					  	$kq= mysql_query($bvm);
						if(mysql_num_rows($kq) == 0)
					  		echo '<div class="list-group-item">'.$txt_no_thread.'</div>';
					  	else 
					  		while($row=mysql_fetch_array($kq))
					  			{ 
									$url= (strtolower(vinarw(($row['title']))));
										
					  				echo'<a href="/'.$url.'_'.$row['id'].'.html" class="list-group-item"><i class="fa fa-rss"></i> '.($row['title']).'</a>'; 
					  			}
					  			
					  			echo'</div></div></div></div>';
				  								    
								require_once("incfiles/foot.php");
<?php 
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
require_once("head.php");
if($user['id'] && $user['right'] ==1 ){
    $u_mem = $_GET['mem'];
    	//  TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, "select count(id) as total from postblog where userpost='$u_mem'");
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        
        // TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;
        
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
         echo'<ul class="breadcrumb"><li>Dashboard</li>
     <li class="active"><b>Bài viết</b></li></ul>';
    echo'<div class="panel panel-default">
   <!--  <div class="panel-heading">Tổng số bài viết: '.$bv_user.'</div>-->
      <table class="table"><thead><tr>
            <th>#</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Ảnh thu nhỏ</th>
            <th>Edit/Del</th>
          </tr></thead><tbody>';
        // Tìm Start
        $start = ($current_page - 1) * $limit;
        $tuser="select * from postblog where userpost='$u_mem' limit  $start, $limit";
					  	$kq= mysql_query($tuser);
					  		while($reg=mysql_fetch_array($kq))
					  			{
         $dess = (strip_tags(($reg['content']))); 
echo '<tr>
          <td>'.$reg['id'].'</td>
            <td>'.($reg['title']).'</td>
            <td>'._substr($dess,100).'</td>
          <td><img src="'.$reg['thumbnail'].'" width="150px" height="100px"/></td>';
            echo '<td><a class="btn tbn-sm btn-default" title="edit" href="/edit_post.php?id='.$reg['id'].'&keyadmintiontoken='.base64_encode("TktsHH576699SD58_1sad5^_Sasd265_SSA444010120172").'" ><i class="fa fa-pencil-square-o"></i></a> ';
        echo '<a class="btn tbn-sm btn-default" title="del" href="del_mail.php?id_bv='.$reg['id'].'&user='.$reg['userpost'].'"><i class="fa fa-window-close"></i></a></td>';
          echo '</tr> ';
}
echo'</tbody> </table>';
 // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
echo'<div class="list-group-item"><center><ul class="pagination">';
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                  if (isset($_GET['mem'])) {
                    $mem  = $_GET['mem'];
                echo '<li><a href="bvuser.php?page='.($current_page-1).'&mem='.$mem.'"><<</a> </li>';
                    }
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
                     if (isset($_GET['mem'])) {
                    $mem  = $_GET['mem'];
                    echo '<li><a href="bvuser.php?page='.$i.'&mem='.$mem.'">'.$i.'</a> </li> ';
                    }
                }
            }
            
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                if (isset($_GET['mem'])) {
                    $mem  = $_GET['mem'];
                    echo '<li><a href="bvuser.php?page='.($current_page+1).'&mem='.$mem.'">>></a> </li> ';
                } else {
                    echo '<li><a href="bvuser.php?page='.($current_page+1).'">>></a> </li> ';
                }
            }
            else{
               // echo '<span>Next</span> | ';
            }
					  			 
					  			echo' </ul></center></div></div>';
	}
	
require_once("foot.php");
?>
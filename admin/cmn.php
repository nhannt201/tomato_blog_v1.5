<?php 
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
require_once("head.php");
if($user['id'] && $user['right'] ==1 ){
     echo'<ul class="breadcrumb"><li>Dashboard</li>
    <li class="active">Chuyên Mục<b></b></li></ul>';
    	//  TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(id) as total from chuyenmuc');
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
    echo'<div><a href="addcm.php" class="btn btn-sm btn-default">Thêm Chuyên Mục</a></div><br/><div class="panel panel-default">
      <div class="panel-heading">Tổng số Chuyên Mục : '.$cm.'</div>
      <table class="table"><thead><tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Edit/Del</th>
          </tr></thead><tbody>';
        // Tìm Start
        $start = ($current_page - 1) * $limit;
        $tuser="select * from chuyenmuc limit  $start, $limit";
					  	$kq= mysql_query($tuser);
					  		while($reg=mysql_fetch_array($kq))
					  			{
					  			    echo'<tr>
          <td>'.$reg['id'].'</td>
            <td>'.$reg['name'].'</td>
             <td>'.cat($reg['mota'],15).'</td>
            <td><a href="editcm.php?id='.$reg['id'].'" class="btn btn-sm btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a href="del_mail.php?id_cmn='.$reg['id'].'" class="btn btn-sm btn-default"><i class="fa fa-window-close" aria-hidden="true"></i></a></td>';
					  			    
					  			}
					  			    
echo'</tbody> </table>';
 // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
echo'<div class="list-group-item"><center><ul class="pagination">';
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<li><a href="cmn.php?page='.($current_page-1).'"><<</a> </li>';
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
                    echo '<li><a href="cmn.php?page='.$i.'">'.$i.'</a> </li> ';
                }
            }
            
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<li><a href="cmn.php?page='.($current_page+1).'">>></a> </li> ';
            }
            else{
               // echo '<span>Next</span> | ';
            }
					  			 
					  			echo'</ul></center></div></div>';
	}
require_once("foot.php");
?>
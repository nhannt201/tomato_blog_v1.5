<?php 
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
require_once("head.php");
$set = intval($_GET['set']);
$idu = intval($_GET['id']);
if($user['id'] && $user['right'] ==1 ){
    
    	//  TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(id) as total from account');
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
    <li class="active"><b>Tác Giả</b></li></ul>';
    echo'<div class="panel panel-default">
      <div class="panel-heading">Tổng số tác giả : '.$tg.'</div>
      <table class="table"><thead><tr>
            <th>#</th>
            <th>Username</th>
            <th>Quyền Post</th>
             <th>SET</th>
          </tr></thead><tbody>';
        // Tìm Start
        $start = ($current_page - 1) * $limit;
        $tuser="select * from account limit  $start, $limit";
					  	$kq= mysql_query($tuser);
					  		while($reg=mysql_fetch_array($kq))
					  			{
if($set==1){mysql_query("UPDATE `account` SET `status`='1' WHERE `id` = '".$idu."'"); } 
if($set==0){mysql_query("UPDATE `account` SET `status`='0' WHERE `id` = '".$idu."'"); }

echo'<tr>
          <td>'.$reg['id'].'</td>
            <td>'.$reg['username'].'</td>';
            if($reg['status'] != 1)
            echo'<td>Chưa</td>';
            else 
            echo'<td>Rồi</td>';
             echo'<td><a class="btn-sm btn-success" href="'.$home.'/admin/setpost.php?set=1&id='.$reg['id'].'"><i class="fa fa-check-circle" aria-hidden="true"></i></a>  <a class="btn-sm btn-danger" href="'.$home.'/admin/setpost.php?set=0&id='.$reg['id'].'"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>';
          echo'</tr> ';
          
}
      if (isset($_GET['set'])) {
          echo'<meta http-equiv="refresh" content="0;url=setpost.php">  ';
      }
echo'</tbody> </table>';
 // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
echo'<div class="list-group-item"><center><ul class="pagination">';
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<li><a href="user.php?page='.($current_page-1).'"><<</a> </li>';
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
                    echo '<li><a href="user.php?page='.$i.'">'.$i.'</a> </li> ';
                }
            }
            
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<li><a href="user.php?page='.($current_page+1).'">>></a> </li> ';
            }
            else{
               // echo '<span>Next</span> | ';
            }
					  			 
					  			echo' </ul></center></div></div>';
	}
	
require_once("foot.php");
?>
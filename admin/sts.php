<?php 
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
require_once("head.php");
if($user['id'] && $user['right'] ==1 ){
    //Kiểm chứng thư mục cấu hình
                                                                         //Đọc tệp
    	$folder_st = "blog_st";
	    $title = $folder_st.'/title.txt'; if (file_exists($title)) {   $OpenI = fopen($title, "r") or die("Thất bại khi đọc I!");  $KQ_I = fgets($OpenI); } else { echo 'Không thể cập nhật tiêu đề!<p>';  $KQ_I = "";}
    	$des = $folder_st.'/des.txt'; if (file_exists($des)) { $OpenII = fopen($des, "r") or die("Thất bại khi đọc II!");  $KQ_II = fgets($OpenII); } else { echo 'Không thể cập nhật mô tả!<p>'; $KQ_II = "";}
	    $kw = $folder_st.'/kw.txt'; if (file_exists($kw)) {  $OpenIII = fopen($kw, "r") or die("Thất bại khi đọc III!");  $KQ_III = fgets($OpenIII); } else { echo 'Không thể cập nhật từ khoá!<p>'; $KQ_III = "";}
	    $intro = $folder_st.'/intro.txt'; if (file_exists($intro)) {  $OpenIV = fopen($intro, "r") or die("Thất bại khi đọc IV!");  $KQ_IV = fgets($OpenIV); } else { echo 'Không thể cập nhật giới thiệu!<p>'; $KQ_IV = "";}
	    //Kết thúc đọc
    //Kết thúc kiểm chứng
                            //Kiểm tra cập nhật mới
							 if(isset($_POST['stss'])) {
							 	$tieudes = $_POST['blogname'];
								$mota = $_POST['mota'];
								$kyes = $_POST['keyword'];
								$intrI = $_POST['intros'];
								//Viết file
								$tende = fopen($title, "w+") or die("Cập nhật I thất bại!");
								$motaII = fopen($des, "w+") or die("Cập nhật II thất bại!");
								$tukhoaII = fopen($kw, "w+") or die("Cập nhật III thất bại!");
								$introII = fopen($intro, "w+") or die("Cập nhật IV thất bại!");
                                $ghiI = $tieudes;
                                $ghiII = $mota;
                                $ghiIII = $kyes;
                                $ghiIV = $intrI;
                                fwrite($tende, $ghiI);
                                fwrite($motaII, $ghiII);
                                fwrite($tukhoaII, $ghiIII);
                                fwrite($introII, $ghiIV);
                                fclose($tende);
                                fclose($motaII);
                                fclose($tukhoaII);
                                fclose($introII);
								//Kết thúc 
								//Thông báo ra
								echo '<div class="alert alert-success" role="alert">Đã cập nhật!</div>';
							 }
							 //Kết thúc kiểm tra
							 echo'<div class="panel panel-default">
      <div class="panel-heading">Cấu hình Blog</div><div class="list-group-item">';
echo '<form action="sts.php" method="POST">
<label>Tên Blog:</label>
<input type="text" class="form-control" name ="blogname" placeholder="Tên trang blog..." value="'.$KQ_I.'">
<label>Mô tả:</label>
<input type="text" class="form-control" name ="mota" placeholder="Mô tả blog..." value="'.$KQ_II.'">
<label>Từ khoá:</label>
<textarea type="text" class="form-control" name="keyword" placeholder="Từ khoá tìm kiếm trang...">'.$KQ_III.'</textarea>
<label>Giới thiệu:</label>
<textarea type="text" class="form-control" name="intros" placeholder="Mô tả trang...">'.$KQ_IV.'</textarea>
<br/><button type="submit" name="stss" class="btn btn-default">Cập nhật</button></form></div></div></div>';

//Kết thúc đọc tệp
        fclose($OpenI);
        fclose($OpenII);
        fclose($OpenIII);
//Đóng đọc tệp


}
require_once("incfiles/foot.php");
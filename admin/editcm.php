<?php 
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
require_once("head.php");
if($user['id'] && $user['right'] ==1 ){
    if (isset($_GET['id'])) {
        $idcm = $_GET['id'];
    	$sql = "select * from chuyenmuc where id = '$idcm'";
    	$result = $conn->query($sql);
    	if ($result->num_rows > 0) {
    	    $row = $result->fetch_assoc();
    	
							 if(isset($_POST['upcm'])) {
							 	$name= $_POST['name'];
								$mota=$_POST['mota'];
								$sql = "UPDATE chuyenmuc SET name='$name', mota='$mota' WHERE id='$idcm'";
							if ($conn->query($sql) === TRUE) {
                                 echo '<div class="alert alert-success" role="alert">'.$txt_up_cm_ok.'</div>';
                                 echo '<meta http-equiv="refresh" content="0;editcm.php?id='.$idcm.'">';
                            }
								
							 }
							 
							 echo'<div class="panel panel-default">
      <div class="panel-heading">Tổng số Chuyên Mục : '.$cm.'</div><div class="list-group-item">';
echo'<form action="" method="POST"><label>Tên Chuyên Mục:</label><input type="text" class="form-control"value="'.$row['name'].'" name ="name" placeholder="'.$txt_post_phl_name.'"><label>Mô tả:</label>
<textarea type="text" class="form-control"  name="mota" placeholder="'.$txt_post_phl_des.'">'.$row['mota'].'</textarea>
<br/><button type="submit" name="upcm" class="btn btn-default">'.$txt_up_cm.'</button></form></div></div></div>';

}
}

}
require_once("incfiles/foot.php");
<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
    require_once("incfiles/head.php");
    require_once("include/lang/vi-VN.php");
if (!isset($_SESSION['username'])) {//check da dang nhap chua
if (isset($_POST['submit'])) {
    $username = trim(htmlspecialchars($_POST['user']));
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);
    $repass = trim($_POST['re-pass']);
    $about = trim(htmlspecialchars($_POST['about']));
    $check_user= mysql_query("select * from account where username='".$username."' ");
    $check_mail= mysql_query("select * from account where email='".$email."' ");
    $formatname = "/^[A-Za-z0-9_¥.]{2,32}$/";
    $formatmail = "/^[A-Za-z0-9_.]{2,32}@([a-zA-Z0-9].{2,12})(.[a-zA-Z]{2,12})+$/";
    if (!empty($username) && !empty($email) && !empty($pass) && !empty($repass)){
        //kiem tra loi
	if(!preg_match($formatname ,$username, $matchs))
            $loi = $txt_reg_user_not_fomat;
        else if (mysql_num_rows($check_user) > 0 )
        $loi = $txt_ref_user_exs;
        else if(!preg_match($formatmail ,$email, $matchs))
                $loi = $txt_mail_not_fomat;
		else if (mysql_num_rows($check_mail) > 0)    $loi = "Email đã tồn tại ";
            else if ($pass != $repass)
                    $loi = "Mật khẩu không giống nhau";
                    else {
                        $str="select * from account";
					  	$kq= mysql_query($str);
						if(mysql_num_rows($kq) == 0){
                        //TAO TAI KHOAN MOI
                    mysql_query("INSERT INTO `account`(`username`, `password`, `right`, `email`, `about`, `status`) 
                        VALUES ('".$username."','".$pass."','1','".$email."','".$about."','1')");
     echo'<div class="alert alert-success"> Tài khoản được tạo là tài khoản admin . Điều này chỉ sãy ra 1 lần duy nhất sao khi bạn install xong </div>';
                    echo '<div class="list-group-item">'.$txt_reg_ok.' : <hr/> <b>'.$txt_username.'</b> : '.$username.'<br/><b> '.$txt_password.'</b>: '.$pass.'<br/><b> '.$txt_mail.'</b> : '.$email.'  <br/>
                    <a href ="/index.php" class="btn btn-sm btn-default">Xác Nhận</a></div>';
                                $_SESSION["username"] = $username;
                                	exit;
						}else{
						     mysql_query("INSERT INTO `account`(`username`, `password`, `email`, `about`, `status`) 
                        VALUES ('".$username."','".$pass."','".$email."','".$about."','0')");
                    echo '<div class="list-group-item">'.$txt_reg_ok.' : <hr/> <b>'.$txt_username.'</b> : '.$username.'<br/><b> '.$txt_password.'</b>: '.$pass.'<br/><b> '.$txt_mail.'</b> : '.$email.'  <br/>
                    <a href ="/index.php" class="btn btn-sm btn-default">Xác Nhận</a></div>';
                                $_SESSION["username"] = $username;
                                	exit;
						    
						}
                }
        
    }else{
        $loi = $txt_reg_empty_info;
    }



}
//hien thi form
				 echo' <div class="container">    
        <div style="margin-top:10px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">'.$txt_register.'</div>
                        </div>  
                        <div class="panel-body" >
                            <form class="form-horizontal"  action="/registration.php" method="post">';
                                     if(isset($loi)){ echo'<div class="alert alert-danger">'.$loi.'</div>';}
                                echo'<div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="user" placeholder="'.$txt_username.'">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                         <input type="email" class="form-control" name="email" placeholder="'.$txt_mail.'">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                       <input type="password" class="form-control" name="pass" placeholder="'.$txt_password.'">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="re-password" class="col-md-3 control-label">Re-password</label>
                                    <div class="col-md-9">
                                       <input type="password" class="form-control" name="re-pass" placeholder="'.$txt_repass.'">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="about" class="col-md-3 control-label">About</label>
                                    <div class="col-md-9">
                                         <textarea class="form-control" name="about" placeholder="'.$txt_about_yr.'" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" name="submit" class="btn btn-default">'.$txt_btn_reg.'</button>
                                    </div>
                                </div></form>
                         </div>
                    </div>

               
               
                
         </div> 
    </div>';
}else{
echo $txt_log_have; //neu da dang nhap roi
}
 require_once("incfiles/foot.php");
<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
    require_once("incfiles/head.php");
   require_once("include/lang/vi-VN.php");
    $username = trim($_POST['user']);
    $password = trim($_POST['pass']);
if (!isset($_SESSION['username'])) { //check da dang nhap chua
if (isset($_POST['submit'])) {
    $rember = $_POST['remember'];
   
    if (!empty($username) && !empty($password)){
        $query = mysql_query("select * from account where username = '".$username."' and password = '".$password."'");
        $num_rows = mysql_num_rows($query);
        if ($num_rows==0)
        $loi = $txt_login_fail;
        else {
            $query = mysql_query("select * from account where username = '".$username."' and password = '".$password."'");
            $_SESSION["username"] = $username;
            $row = mysql_fetch_array($query);
echo '<div class="alert alert-success col-sm-12">'.$txt_login_ok.'</div>';
if ($rember == "1") {
            setcookie("username", $username, time()+60*60*24*100,'/');
}
               echo "<meta http-equiv='refresh' content='0;url=/'>";

		exit;
        }

    }
    else {
       $loi= $txt_login_empty_info;
    }

    

}

///hien thi form
					     echo'<div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title">Đăng Nhập</div>
                    </div>     
                    <div style="padding-top:30px" class="panel-body" > ';
                 if($loi){ echo'<div class="alert alert-danger col-sm-12">'.$loi.'</div>';}
                        echo'<form class="form-horizontal" action="login.php" method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="user" placeholder="'.$txt_login_phl_user.'">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" class="form-control" name="pass" placeholder="'.$txt_login_phl_pass.'">
                                    </div>
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> '.$txt_remember_log.'
                                        </label>
                                      </div>
                                    </div>
                                <div style="margin-top:10px" class="form-group">
                                    <div class="col-sm-12 controls">
                                       <button type="submit" name="submit" class="btn btn-default">'.$txt_btn_login.'</button>
                                    </div>
                                </div>
                           </form>   </div></div>  </div>';
}else{
echo $txt_log_have; //neu da dang nhap roi
    echo "<meta http-equiv='refresh' content='0;url=/'>";

}
 require_once("incfiles/foot.php");
?>
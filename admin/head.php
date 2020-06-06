<?php 
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
	    session_start();
	require_once("../incfiles/config.php");
	require_once("../incfiles/func.php");
	require_once("../include/lang/vi-VN.php");
	if($user['id'] && $user['right'] ==1 ){
	        $bv = mysql_result(mysql_query("SELECT COUNT(*) FROM postblog "), 0);
    $tg = mysql_result(mysql_query("SELECT COUNT(*) FROM account "), 0);
    $cm = mysql_result(mysql_query("SELECT COUNT(*) FROM chuyenmuc "), 0);
    $ct = mysql_result(mysql_query("SELECT COUNT(*) FROM contact "), 0);
    $view = mysql_result(mysql_query("SELECT SUM(view) FROM postblog;"), 0);
     $titles = "Admin Panel";
    $description = "Tomato Blog một sản phẩm của giant team , blog được viết bằng php thuần nhằm mục đích giúp các bạn mới học php có thể tiếp cận php dể hơn qua bộ code này ";
    $keywords = "cà chua, blog cà chua , tomato, tomato blog , blog php, php tomato, tomato blog php,giant team,blog php tomato , blog v1,tomato v1";
    $author = "Giant Team";
	?>
<head>
<meta charset="UTF-8">
  <title><?php echo $titles; ?> - <?php echo $txt_my_site; ?></title>
  <meta name="description" content="<?php echo $description; ?>">
  <meta name="keywords" content="<?php echo $keywords; ?>">
  <meta name="author" content="<?php echo $author; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="//getbootstrap.com.vn/dist/css/bootstrap.min.css" rel="stylesheet">
 <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

<style>body {
  padding-top: 70px;
}
a {
    text-decoration: none !important;
}
.panel-heading {font-weight: bold;}
img {
    border-radius: 5px;
    /*display: block;
    margin-left: auto;
    margin-right: auto;
    width: 55% !important;
    height: auto !important;*/
}
</style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>  <body>
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
    <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

      <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=984368875030812";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
   <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Mã nguồn mở Tomato Blog - Bảng quản trị</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
                 <li><a href="/">Xem trang</a></li>
               <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $user['username'] ?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/user.<?php echo $user['username'] ?>.html">Trang cá nhân</a></li>
                <li><a href="/edit_user.php">Chỉnh Sửa</a></li>
                <li class="divider"></li>
                <li><a href="/index.php">Xem trang</a></li>
                <li><a href="/logout.php">Đăng Xuất</a></li>
              </ul>
            </li>     
          </ul>
        </div>
      </div>
    </div>
<div class="container-fluid">
    <div class="row">
 <div class="col-md-3 sidebar">	<ul class="list-group">
		<li class="list-group-item">
		    
			<div class="media">
				<a class="pull-left">
				    <?php if($user['avt']) {
				   echo' <img class="media-object" src="'.$user['avt'].'" alt="Ảnh đại diện của '.$user['username'].'" width="64" height="64">';
				     }else {
				         echo' <img class="media-object" src="http://i.imgur.com/A8S2aBq.jpg" alt="Ảnh đại diện của '.$user['username'].'" width="64" height="64">';
				     }
				         ?>
				    
				</a>
				<div class="media-body">
				    <h4 class="media-heading" style="text-transform: capitalize;"><?php echo $user['username'] ?></h4>
				    <span class="label label-info">Quản Trị Viên</span>	.
				</div>
			</div>
		</li>
		<?php
		//kich hoat active
		  $urel = getCurrentPageURL();
		   if ((strpos($urel , "/user.php")) !== false) {
     $a0 = '';
$a1 = "active";
$a2 = "";
$a3 = "";
$a4 = "";
$a5 = "";
$a6 = "";

  }  elseif ((strpos($urel , "/posts.php")) !== false) {
     $a0 = '';
$a1 = "";
$a2 = "active";
$a3 = "";
$a4 = "";
$a5 = "";
$a6 = "";

  }  elseif ((strpos($urel , "/bvuser.php")) !== false) {
     $a0 = '';
$a1 = "";
$a2 = "active";
$a3 = "";
$a4 = "";
$a5 = "";
$a6 = "";

  }elseif ((strpos($urel , "/cmn.php")) !== false) {
     $a0 = '';
$a1 = "";
$a2 = "";
$a3 = "active";
$a4 = "";
$a5 = "";
$a6 = "";

  } elseif ((strpos($urel , "/addcm.php")) !== false) {
     $a0 = '';
$a1 = "";
$a2 = "";
$a3 = "active";
$a4 = "";
$a5 = "";
$a6 = "";

  } elseif ((strpos($urel , "/ctc.php")) !== false) {
     $a0 = '';
$a1 = "";
$a2 = "";
$a3 = "";
$a4 = "active";
$a5 = "";
$a6 = "";

  }  elseif ((strpos($urel , "/sts.php")) !== false) {
     $a0 = '';
$a1 = "";
$a2 = "";
$a3 = "";
$a4 = "";
$a5 = "active";
$a6 = "";

  }  elseif ((strpos($urel , "/setpost.php")) !== false) {
     $a0 = '';
$a1 = "";
$a2 = "";
$a3 = "";
$a4 = "";
$a5 = "";
$a6 = "active";

  } else {
        $a0 = 'active';
$a1 = "";
$a2 = "";
$a3 = "";
$a4 = "";
$a5 = "";
$a6 = "";
  }
		?>
		<a class="list-group-item <?php echo $a0; ?>" href="/admin">
			<span class="glyphicon glyphicon-dashboard"></span> Bảng điều khiển
		</a>
		<a class="list-group-item <?php echo $a1; ?>" href="user.php">
			<span class="glyphicon glyphicon-user"></span> Tác Giả
		</a>
		<a class="list-group-item <?php echo $a2; ?>" href="posts.php">
			<span class="glyphicon glyphicon-edit"></span> Bài viết
		</a>
			<a class="list-group-item <?php echo $a3; ?>" href="cmn.php">
			<span class="glyphicon glyphicon-expand"></span> Chuyên mục
		</a>
			<a class="list-group-item <?php echo $a4; ?>" href="ctc.php">
			<span class="glyphicon glyphicon-envelope"></span> Mail liên hệ
		</a>
		<a class="list-group-item <?php echo $a5; ?>" href="sts.php">
			<span class="glyphicon glyphicon-pencil"></span> Cấu hình Blog
		</a>
			<a class="list-group-item <?php echo $a6; ?>" href="setpost.php">
			<span class="glyphicon glyphicon-cog"></span> Quyền Post
		</a>
				<a class="list-group-item" href="/logout.php">
			<span class="glyphicon glyphicon-off"></span> Thoát
		</a>
	</ul><!-- ul.list-group -->
	
</div>  
 <div class="col-md-9 sidebar">

<?php }else{
echo'<meta http-equiv="refresh" content="0;url=/">  ';
}//echo $status_wel; ?>

  
   
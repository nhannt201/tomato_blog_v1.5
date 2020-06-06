<?php 
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
	    @session_start();
	require_once("config.php");
	require_once("func.php");
	require_once("include/lang/vi-VN.php");

if (isset($_GET['id'])) {
    $ids = $_GET['id'];
    $str="select * from postblog where id='$ids'";
					  	$kq= mysql_query($str);
						if(!mysql_num_rows($kq) == 0)
					  		while($reg=mysql_fetch_array($kq))
					  			{
		$title = (($reg['title']));
			$dess = (strip_tags(($reg['content']))); 
		$description	= _substr($dess,350);
		$keywords = $title.', '.str_replace(" ",", ",$title);
		$author = $reg['userpost'];
					if (isset($title)) {
		    	$titleX = (($reg['title']));
		}
					  			}
					  		
} elseif (isset($_GET['cm_id'])) {
    $idss = $_GET['cm_id'];
    $str="select * from chuyenmuc where id='$idss'";
					  	$kq= mysql_query($str);
						if(!mysql_num_rows($kq) == 0)
					  		while($reg=mysql_fetch_array($kq))
					  			{
		$title = (($reg['name']));
		$description	= $reg['mota'];
		$keywords = $title.', '.str_replace(" ",", ",$title).', '.str_replace(" ",", ",$description);
		$author = "Giant Team";
					if (isset($title)) {
		    	$titleX = (($reg['name']));
		}
					  			}
					  		
} elseif (isset($_GET['user'])) {
    $idss = $_GET['user'];
    $str="select * from account where username='$idss'";
					  	$kq= mysql_query($str);
						if(!mysql_num_rows($kq) == 0)
					  		while($reg=mysql_fetch_array($kq))
					  			{
		$title = (($reg['username']));
		$description	= "Tài khoản ".$reg['username']." trên Blog ".$titles;
		$keywords = $title.', '.str_replace(" ",", ",$title).', '.str_replace(" ",", ",$description);
		$author = "Giant Team";
					if (isset($title)) {
		    	$titleX = (($reg['username']));
		}
					  			}
					  		
} else {
   
}

?><html><head>
<meta charset="UTF-8">
  <title><?php echo $titleX; if(!$titleX) {echo $titles;} else{ echo " - ".$titles;} ?></title>
  <meta name="description" content="<?php echo $description; ?>">
  <meta name="keywords" content="<?php echo $keywords; ?>">
  <meta name="author" content="<?php echo $author; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="//getbootstrap.com.vn/dist/css/bootstrap.min.css" rel="stylesheet">
 <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
<!--<link rel='shortcut icon' type='image/vnd.microsoft.icon' href='/favicon.ico'> <!-- IE -->
<!--<link rel='apple-touch-icon' type='image/png' href='/icon.57.png'> <!-- iPhone -->
<!--<link rel='apple-touch-icon' type='image/png' sizes='72x72' href='/icon.72.png'> <!-- iPad -->
<!--<link rel='apple-touch-icon' type='image/png' sizes='114x114' href='/icon.114.png'> <!-- iPhone4 -->
<!--<link rel='icon' type='image/png' href='/icon.114.png'> <!-- Opera Speed Dial, at least 144×114 px -->
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
<?php 	require_once("css/cs.css");?>
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
          <a class="navbar-brand" href="/"><i class="fa fa-gg" aria-hidden="true"></i> <?php echo $titles; ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <?php
              $urel = getCurrentPageURL();
             // $pos = ;
  if ((strpos($urel , "/about.php")) !== false) {
     $active_about = 'class="active"';
        $active = '';
        $active_contact = '';
         $active_profile  = '';
          $active_ref  = '';
          $active_post  = '';
         $active_log  = '';

  }  elseif ((strpos($urel , "/contact.php")) !== false) {
     $active_contact = 'class="active"';
        $active_about = '';
        $active = '';
         $active_profile  = '';
        $active_ref  = '';
        $active_log  = '';
        $active_post  = '';

  } elseif ((strpos($urel , "/registration.php")) !== false) {
     $active_contact = '';
        $active_about = '';
        $active = '';
         $active_profile  = '';
         $active_ref  = 'class="active"';
         $active_log  = '';
            $active_post  = '';

  }  elseif ((strpos($urel , "/login.php")) !== false) {
     $active_contact = '';
        $active_about = '';
        $active = '';
         $active_profile  = '';
    $active_ref  = '';
         $active_log  = 'class="active"';
   $active_post  = '';
  } elseif ((strpos($urel , "/write_post.php")) !== false) {
     $active_contact = '';
        $active_about = '';
        $active = '';
         $active_profile  = '';
    $active_ref  = '';
         $active_log  = '';
   $active_post  = 'class="active"';
  }
  elseif (isset($_GET['user'])) {
        $active = '';
         $active_about = '';
        $active_contact = '';
         $active_ref  = '';
         $active_log  = '';
   $active_post  = '';
      $active_profile  = 'class="active"';
  }else {
      $active = 'class="active"';
        $active_about = '';
        $active_contact = '';
         $active_profile  = '';
         $active_log  = '';
    $active_ref  = '';
       $active_post  = '';

  }
              ?>
            <li <?php echo $active; ?>><a href="/"><?php echo $txt_home; ?></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chuyên Mục <span class="caret"></span></a> <ul class="dropdown-menu">
              <?php
              $cm = mysql_query("SELECT * FROM `chuyenmuc`");
while ($res = mysql_fetch_assoc($cm)) {
echo '<li><a href="/cm.php?cm_id='.$res['id'].'">' .$res['name'].'</a><li>';
}
?>
 </ul>
            </li>
             <li <?php echo $active_about; ?>><a href="/about.php"><?php echo $txt_about; ?></a></li>
              <li <?php echo $active_contact; ?>><a href="/contact.php"><?php echo $txt_contact; ?></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <?php
               if (isset($_SESSION['username']) && $_SESSION['username']){
 echo '   <li '.$active_profile.'><a href="'.$home.'/user.'.$user['username'].'.html">'.$txt_page_user.'</a></li>
  <li '.$active_post.'><a href="/write_post.php">'.$txt_post.'</a></li>
            <li><a href="/logout.php">'.$txt_logout.'</a></li>';
		   //kiem tra admin
		   $users = $_SESSION['username'];
		   $sql0 = "SELECT * FROM account WHERE username='$users'";
$result0 = $conn->query($sql0);

if ($result0->num_rows > 0) {
    // output data of each row
   $row0 = $result0->fetch_assoc();
       if ($row0['right'] == "1") {
           echo '<li><a href="/admin">Admin Cpanel</a></li>';
       }
    
} else {
   // echo "0 results";
}
//$conn->close(); bat cai nay la index die
		   //end kiem tra
       }
       else{
      echo '   <li '.$active_ref.'><a href="/registration.php">'.$txt_register.'</a></li>
            <li '.$active_log.'><a href="/login.php">'.$txt_login.'</a></li>';
       }
              ?>
         
          </ul>
        </div>
      </div>
    </div>
</div>
<div class="container-fluid">



  
   
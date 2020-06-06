<?php 
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
//EX: Tahoma Srouce 
//Code by Bui Khoi, Trung Nhan
//func lang=? ex: lang("vi") & lang("en-US") 
function lang($langs = "vi") {
    echo '<!DOCTYPE html><html lang="'.$langs.'">'; 
}
//mo dau head,  open_head() 
function open_head() {
    echo '<head>';
}
//dinh dang, charset("ASCII") & charset() => UTF-8 (HTML5)
function charset($fomat = "UTF-8") {
    echo '<meta charset="'.$fomat.'">'; 
}
//danh hieu, tieu de, title("Xin chào thế giới!") & title() => Tohamo Code
function title($titles = "Tohamo Code") {
    echo '
  <title>'.$titles.'</title>';
}
//func meta, meta("mô tả", "từ khoá", "tác giả")
function meta($dest, $keyword,$author) {
   echo '
  <meta name="description" content="'.$dest.'">
  <meta name="keywords" content="'.$keyword.'">
  <meta name="author" content="'.$author.'">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
';
}
//ico, ico("http://abc.com/img/ico.ico") & ico() => ico mac dinh
function ico($url_ico = "/favicon.ico") {
    echo ' <link rel="icon" href="'.$url_ico.'" type="image/x-icon">';
}
//chen url javascript, js("http://abc.com/js/index.js")
function js($url_js) {
    echo ' <script async src="'.$url_js.'"></script>';
}
//chen  javascript, js_text("alert("Hello\nHow are you?");")
function js_text($url_txt = "") {
    echo ' <script type="text/javascript">'.$url_txt.'</script>';
}
//chen url css, css("http://abc.com/css/index.css")
function css($url_css) {
    echo ' <link rel="stylesheet" href="'.$url_css.'">';
}
//chen noi dung css, css_text(".background { font-size: 15px; }")
function css_text($url_txts) {
    echo '<style>'.$url_txts.'</style>';
}
//dong head,  end_head()
function end_head() {
    echo '</head>';
}

//////////////////Test 
//lang();
//open_head();
//charset();
//title("Xin chào!");
//meta("tôi xin chào!", "xin, chào, xin chào", "Tohamo");
//ico("https://www.w3schools.com/favicon.ico");
//end_head();
?>


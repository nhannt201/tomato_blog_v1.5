<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
require_once("incfiles/head.php");
#Ngôn Ngữ
require_once("include/lang/vi-VN.php");
echo'<section id="error" class="container">
        <h2>'.$txt_404_page.'</h2>
        <p>'.$txt_404_text.'</p>
        <a class="btn btn-default" href="/"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>'.$txt_return_home.'</a>
    </section>
    <style>
    #error {
    text-align: center;
    margin-top: 150px;
    margin-bottom: 150px;
}</style>';
require_once("incfiles/foot.php");
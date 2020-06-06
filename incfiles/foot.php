  </div>
  <div class="panel panel-default">
  <div class="panel-body">
    <b>Thông tin Blog</b>
  </div>
  <div class="panel-footer"><div class="footer"> <div class="row">
<div class="col-md-4" style="margin-top:10px">
<?php
echo '<b>'.$txt_intros.'</b><p>'.$txt_about_foot.'<br>


</div>
<div class="col-md-4">

<b>'.$txt_info_foot.'</b><br/>
Được cung cấp và phát triển <p>bởi <b>Giant Team</b><br>

</div>
<div class="col-md-4">

<b>Textlink:</b><br/>
<a href="/#" target="_blank" >Link kết 1</a><br>
<a href="/#" target="_blank" >Link kết 2</a><br>
<a href="/#" target="_blank" >Link kết 3</a><br>


</div>
</div></div>'; 
//Kết thúc đọc tệp
        fclose($RDI);
        fclose($RDII);
        fclose($RDIII);
        fclose($RDIV);
        //Đóng đọc tệp
?></div>
</div>
<?php
require_once("include/analytics.php");
?>

 </body></html>
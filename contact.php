<?php
#Bản quyền thuộc về Giant Team 2017. hocvienit.tech
#Vui lòng không xoá dòng này nếu bạn muốn có thêm nhiều sản phẩm miễn phí khác.
require_once("incfiles/head.php");
require_once("incfiles/func.php");
#Ngôn Ngữ
require_once("include/lang/vi-VN.php");
?>
<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="contact.php" method="post">
          <fieldset>
            <legend class="text-center"><?php echo $txt_contact_us; ?></legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name"><?php echo $txt_names; ?></label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="<?php echo $txt_your_name; ?>" class="form-control" required/>
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email"><?php echo $txt_ctc_ml; ?></label>
              <div class="col-md-9">
                <input type="email" id="email" name="email" type="text" placeholder="<?php echo $txt_ctc_pl_ml; ?>" class="form-control" required onclick='Javascript:checkEmail();'/>
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message"><?php echo $txt_ctc_msg; ?></label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="<?php echo $txt_ctc_messger; ?>" rows="5" required></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" name="submit" class="btn btn-primary btn-lg"><?php echo $txt_ctc_send; ?></button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>
<?php
if (isset($_POST['submit'])) {
   if (!isset($_SESSION['oksendmail'])) {
        $_SESSION["oksendmail"] = "true";
    $name = ($_POST['name']);
    $email = ($_POST['email']);
    $message = ($_POST['message']);
    $sql = "INSERT INTO contact (name, email, messger)
VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<center>".$txt_ctc_req."</center>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
} else {
   
            echo "<center>".$txt_ctc_req2."</center>";
}
    } 

?>
<?php require_once("incfiles/foot.php");?>
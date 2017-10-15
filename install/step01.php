<?php
function step_1(){
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agree'])){
    step_2();
    exit;
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['agree'])){
    echo "<script>window.location.href='?eri=30';</script>";
  }
?>
<iframe src="install/gnu_license.html" width="800" height="380"></iframe>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['eri']) && $_GET['eri'] ==30) echo '<div class="alert alert-danger">You must agree to the license</div>';
?>
 <form action="?pg=installer" method="post" id="formul">
 <p>
  I agree to the license
  <input type="checkbox" name="agree" id="agree" required/>
 </p>
 <br>
  <button id="continue" type="submit" class="btn btn-info disabled" disabled="disabled">Continue</button>
 </form>
 <script type="text/javascript">
    $(document).ready(function(){
      $('#agree').click(function() {
        if ($('#agree').is(':checked')) {
          $('#continue').removeAttr('disabled');
          $('#continue').addClass('active').removeClass('disabled');
        }else{
          $('#continue').attr('disabled', 'disabled');
          $('#continue').addClass('disabled').removeClass('active');;
        }
      });
    });
 </script>
<?php
}

<form method="post" action="?pg=admin&tab=2" class="form-group" onsubmit="return confirm('Do you wish to proceed?');" enctype="multipart/form-data" >
    <?php
      include 'includes/form_miscellaneous.php';
    ?>
    <p>
     <input type="submit" class="btn btn-info active" name="update_mis" value="Update Blogsite Information">
    </p>
    <div class="clearfix"></div><br>
    <p>
    <div style="font-size:10px" class="alert alert-info alert-dismissable fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Important info: </strong>  If you modify the Miscellaneous Information, the system will close the active session in order to load the new parameters
    </div>
  </p>
</form>

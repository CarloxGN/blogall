<?php
function step_4(){
  if (isset($_POST['register']) && $_POST['register']=="Register it") {
    include 'bin/valid_miscellanous.php';
  }
  ?>
    <form method="post" action="?pg=installer&step=4" class="form-group" onsubmit="return confirm('Do you wish to proceed?');" enctype="multipart/form-data" >
    <?php
      include 'includes/form_miscellaneous.php';
    ?>
    <p>
      <input type="submit" class="btn btn-info active" name="register" value="Register it">
    </p>
    </form>
  </div>
  </div>
</div>
<?php
}

<form method="post" action="?pg=admin&tab=1" class="form-group" onsubmit="return confirm('Do you wish proceed?');">
  <div align="center">
  <div align="center" style="font-size: 25px; font-style:italic">Config file data</div><p>&nbsp;</p>
  </div>
  <div class="form-group">
  <label for="database_host">Database Host</label>
    <input class="form-control" type="text" name="database_host" value='localhost' maxlength="30" required="required">
  </div>
  <div class="form-group">
    <label for="database_name">Database Name</label>
    <input class="form-control" type="text" name="database_name" maxlength="30" value="<?=DATABASE;?>" required="required">
  </p>
  <div class="form-group">
    <label for="database_username">Database Username</label>
    <input class="form-control" type="text" name="database_username" placeholder="i.e.: root" maxlength="30" value="<?=USER;?>" required="required">
  </div>
  <div class="form-group">
    <label for="database_password">Database Password</label>
    <div style="font-size:10px" class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php
      echo '<span style="color: red; font-style: bold;">DANGER: </span> Your database does not have a defined PASSWORD, this represents a high security risk. Please define one as soon as possible. 
    </div>';
    ?>
  <input class="form-control" type="text" name="database_password" maxlength="15"  placeholder="your DB password" value="<?=PASSWORD;?>" >
  </div>
  <div class="form-group">
  <label for="password">Inactivity time <span style="font-size:9px"> (Idle Session time in minutes)<span></label>
  <input class="form-control" name="idle_time" type="number" maxlength="4" value="<?=IDLETIME/60;?>" required="required">
  </div>
  <div class="form-group">
  <label for="websitepath">Website path <span style="font-size:9px"> (i.e.: http://localhost/my_blog/)<span></label>
  <input class="form-control" name="websitepath" type="text" maxlength="100" value="<?=WEBSITEPATH;?>" required="required">
  </div>
  <div class="form-group">
  <label for="security">Security<span style="font-size:10px"> (<span style="color: red">VERY IMPORTANT:</span> In production stage this option must be in <span style="color: blue">"TRUE" in order to look all DB's movements</span>)<span></label>
  <select name="security" class="form-control input-md col-ms-5 zol-md-8">
    <?php 
    if (SECURE==TRUE){
      echo '<option value="TRUE">TRUE (selected)</option>
            <option value="FALSE">FALSE</option>';
    } else {
      echo '
            <option value="FALSE">FALSE (selected)</option>
            <option value="TRUE">TRUE</option>
            ';
    }
    ?>
  </select>
  </div>
  <div class="clearfix"></div><br>
  <div class="form-group">
  <input type="submit" class="btn btn-info active" name="submit_config" value="Modify Config file">
  </div>
    <div class="clearfix"></div><br>
    <p>
    <div style="font-size:10px" class="alert alert-info alert-dismissable fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span style="color: red; font-style: bold;">Important info: </span>  If you modify the config file, the system will close the active session in order to load the new parameters
    </div>
  </p>
  </form>

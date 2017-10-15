<?php
function step_3(){
  if (isset($_POST['submit']) && $_POST['submit']=="Create Config file") {
   $admin_name        = isset($_POST['admin_name'])         ? filter_input(INPUT_POST, 'admin_name', $filter = FILTER_SANITIZE_STRING)        : "";
   $admin_password    = isset($_POST['admin_password'])     ? filter_input(INPUT_POST, 'admin_password', $filter = FILTER_SANITIZE_STRING)    : "";
   $admin_email       = isset($_POST['admin_email'])        ? filter_input(INPUT_POST, 'admin_email', $filter = FILTER_SANITIZE_EMAIL)       : "";
   $database_host     = isset($_POST['database_host'])      ? filter_input(INPUT_POST, 'database_host', $filter = FILTER_SANITIZE_STRING)     : "";
   $database_username = isset($_POST['database_username'])  ? filter_input(INPUT_POST, 'database_username', $filter = FILTER_SANITIZE_STRING) : "";
   $database_name     = isset($_POST['database_name'])      ? filter_input(INPUT_POST, 'database_name', $filter = FILTER_SANITIZE_STRING)     : "";
   $database_password = isset($_POST['database_password'])  ? filter_input(INPUT_POST, 'database_password', $filter = FILTER_SANITIZE_STRING) : "";
   $idle_time         = isset($_POST['idle_time'])          ? filter_input(INPUT_POST, 'idle_time', $filter = FILTER_SANITIZE_STRING)         : "";
   $websitepath       = isset($_POST['websitepath'])        ? filter_input(INPUT_POST, 'websitepath', $filter = FILTER_SANITIZE_STRING)       : $_SESSION['WEBSITEPATH'];
   if(substr($websitepath, -1) != '/'){
     $websitepath .='/';
   }

   if (empty($admin_name) || empty($admin_password) || empty($admin_email) || empty($database_host) || empty($database_username) || empty($database_name) || empty($idle_time)) {
     echo '<div class="alert alert-danger">All fields are required! Please re-enter</div>';
   }else{
      $_SESSION['admin_name']         = $admin_name;
      $_SESSION['admin_password']     = $admin_password;
      $_SESSION['admin_email']        = $admin_email;
      $_SESSION['database_host']      = $database_host;
      $_SESSION['database_username']  = $database_username;
      $_SESSION['database_name']      = $database_name;
      $_SESSION['database_password']  = $database_password;
      $_SESSION['idle_time']          = $idle_time;
      $_SESSION['websitepath']        = $websitepath;

      include_once 'bin/Config.process.php';
      $create = new controllerCreateConfig();
      $result = $create->newConfig($database_host, $database_username, $database_name, $database_password, $idle_time, $websitepath, 'FALSE');
      if($result==true){
        echo "<script>window.location.href='?pg=installer&step=4'</script>";
      }else{
        echo '<div class="alert alert-danger">ATTENTION: File Config.php has a writing Error. Check your writing privileges</div>';
      }
    }
  }

?>
    <form method="post" action="?pg=installer&step=3" class="form-group" onsubmit="return confirm('Do you wish proceed?');">
      <div align="center">
        <div align="center" style="font-size: 25px; font-style:italic">
          Config file data:
        </div><p>&nbsp;</p>
      </div>
      <p>
      <label for="database_host">Database Host</label>
       <input class="form-control" type="text" name="database_host" value='localhost' maxlength="30" required="required">
     </p>
     <p>
       <label for="database_name">Database Name</label>
       <input class="form-control" type="text" name="database_name" maxlength="30" value="<?php if(isset($database_name)) echo $database_name;?>" required="required">
     </p>
     <p>
       <label for="database_username">Database Username</label>
       <input class="form-control" type="text" name="database_username" placeholder="i.e.: root" maxlength="30" value="<?php if(isset($database_username)) echo $database_username; ?>" required="required">
     </p>
     <p>
       <label for="database_password">Database Password</label>
       <input class="form-control" type="text" name="database_password" maxlength="15" value="<?php if(isset($database_password)) echo $database_password; ?>">
      </p>
      <p>
       <label for="admin_name">Webmaster Username</label>
       <input class="form-control" type="text" name="admin_name" maxlength="40" value="<?php if(isset($admin_name)) echo $admin_name; ?>" required="required">
     </p>
     <p>
      <label for="admin_email">Webmaster Email <span style="font-size:9px"> (This is login`s username)</span></label>
      <input class="form-control" type="email" name="admin_email" maxlength="40" value="<?php if(isset($admin_email)) echo $admin_email; ?>" required="required">
    </p>
     <p>
       <label align="right" for="password">Webmaster Password <span style="font-size:9px"> <span></label>
       <input class="form-control" name="admin_password" type="text" maxlength="15" value="<?php if(isset($admin_password)) echo $admin_password; ?>" required="required">
      </p>
    <p>
      <label for="password">Inactivity time <span style="font-size:9px"> (Idle Session time in minutes)<span></label>
      <input class="form-control" name="idle_time" type="number" maxlength="4" value="<?php if(isset($idle_time)) echo $idle_time; ?>" required="required">
     </p>
     <p>
       <label for="websitepath">Website path <span style="font-size:9px"> (i.e.: http://localhost/my_blog/)<span></label>
       <input class="form-control" name="websitepath" type="text" maxlength="100" value="<?php echo $_SESSION['WEBSITEPATH']; ?>" required="required">
      </p>
     <div class="clearfix"></div><br>
     <p>
     <input type="submit" class="btn btn-info active" name="submit" value="Create Config file">
    </p>
    </form>
  </div>
</div>
  </div>
  <?php
}

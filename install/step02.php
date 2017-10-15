<?php
function step_2(){
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['continue']) && (!isset($_POST['pre_error']))){
   step_3();
   exit;
  }
$pre_error = '';
  if (phpversion() < '5.0') {
   $pre_error .= 'You need to use PHP 5 or above for our site! <br>';
  }
  if (ini_get('session.auto_start')) {
   $pre_error .= 'Our site will not work with session.auto_start enabled!<br>';
  }
  if (!extension_loaded('mysqli')) {
   $pre_error .= 'MySQLi extension needs to be loaded for our site to work!';
  }
  if (!extension_loaded('gd')) {
   $pre_error .= 'GD extension needs to be loaded for our site to work!<br>';
  }
  if (!is_writable('config/Config.php')) {
   $pre_error .= 'Config.php needs to be writable for our site to be installed!, please review you OS writing privileges';
  }
  if (isset($pre_error) && $pre_error != '') echo '<div class="alert alert-danger">'.$pre_error.'</div>';
  ?>
  <div align="center" style="font-size: 25px; font-style:italic">
    Server configuration
  </div><p>&nbsp;</p>
  <table width="90%">
    <tr>
     <td>PHP Version:</td>
     <td><?php echo phpversion(); ?></td>
     <td>5.0+</td>
     <td><?php echo (phpversion() >= '5.0') ? 'Ok' : 'Not Ok'; ?></td>
    </tr>

    <tr>
     <td>Session Auto Start:</td>
     <td><?php echo (ini_get('session_auto_start')) ? 'On' : 'Off'; ?></td>
     <td>Off</td>
     <td><?php echo (!ini_get('session_auto_start')) ? 'Ok' : 'Not Ok'; ?></td>
    </tr>

    <tr>
     <td>MySQLi:</td>
     <td><?php echo extension_loaded('mysqli') ? 'On' : 'Off'; ?></td><td>On</td>

     <td><?php echo extension_loaded('mysqli') ? 'Ok' : 'Not Ok'; ?></td>
    </tr>
    <tr>
     <td>GD:</td>
     <td><?php echo extension_loaded('gd') ? 'On' : 'Off'; ?></td>
     <td>On</td>
     <td><?php echo extension_loaded('gd') ? 'Ok' : 'Not Ok'; ?></td>
    </tr>

    <tr>
     <td>Config.php</td>
     <td><?php echo is_writable('config/Config.php') ? 'Writable' : 'Unwritable'; ?></td>
     <td>Writable</td>
     <td><?php echo is_writable('config/Config.php') ? 'Ok' : 'Not Ok'; ?></td>
    </tr>
  </table>

  <form action="?pg=installer&step=2" method="post">
   <?php
   if(isset($pre_error) && $pre_error != '') echo '<input type="hidden" name="pre_error" id="pre_error" value=""/>';
   ?>
   <p>&nbsp;</p>
   <input type="submit" name="continue" id="button" value="Continue" class="btn btn-info <?php
   if (isset($pre_error) && $pre_error != ''){
     echo ' disabled';
   }else{
     echo ' active';
   }
   ?>">
  </form>
  <p>&nbsp;</p>
<?php
echo '<div class="alert alert-warning">Attention: For security reasons, it is important to change "[path]/your_blog/config/Config.php"`s file access (writing privileges) to "not allowed", after this installation</div>';
}

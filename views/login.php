 <?php
include_once 'bin/register.process.php';
$login = new controllerLogin();
if ($login->loginCheck() == true):
    $logged = 'in';
else:
    $logged = 'out';
endif;
	$title = $_SESSION['name_site'].' | Registration Page';
?>
<!DOCTYPE html>
<html>
<head>
<?php
	include_once('includes/head.php');
?>
</head>
	<!---start-wrap---->
		<!---start-header---->
  	<?php
    include 'includes/header.php';
    ?>
	<!---End-header---->
	<!---start-content---->
	<div>
		<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	</div>
  <div class="content">
    <div class="wrap">
      <div class="contact-info">
    	<div class="account_grid">
    	<div class="welcome_box2">
    		<?php
    		include_once 'includes/inc_login.php'; ?>
    	</div>
    	<br><br>
        <?php
        if(!isset($_SESSION['user_id'])){
            echo '<div class="welcome_box2">';
            include_once 'includes/inc_reg.php';
            echo '</div>';
        }
        ?>

    	<div class="clear"> </div>
    <br><br>
    <div id="formregister" style="display: none;">
    	<div class="welcome_box2">
    		<?php
    		include_once 'includes/formregister.php';?>
    	</div>
    </div>
    <br><br><br><br>
      <?php include_once 'includes/footer.php' ?>
    	<!----//End-footer--->
    	<!---//End-wrap---->
      </div>
    </div>
  </div>
</div>
<script src="<?php echo WEBSITEPATH; ?>js/showhide.js"type="text/javascript"></script>
<script src="<?php echo WEBSITEPATH; ?>js/selectfile.js"type="text/javascript"></script>
<script src="<?php echo WEBSITEPATH; ?>js/chknm.js"type="text/javascript"></script>
	</body>
		</html>
		<!--
		Author: W3layouts
		Author URL: http://w3layouts.com
		License: Creative Commons Attribution 3.0 Unported
		License URL: http://creativecommons.org/licenses/by/3.0/
		-->

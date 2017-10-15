<?php
if (isset($_SESSION['user_id'])):
	if(isset($_POST['singlebutton'])):
		include_once 'bin/update.process.php';
	endif;
	$title = $_SESSION['name_site'].' | Account Page';
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
	<?php include 'includes/header.php'; ?>
	<!---End-header---->
	<!---start-content---->
	<div>
		<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	</div>
	<div class="content">
		<div class="wrap">
			<div class="contact-info">
				<div class="account_grid">
					<br><br>
					<div id="formregister">
						<div class="welcome_box2">
							<?php
							include_once 'includes/account_info.php';?>
						</div>
					</div>
					<br><br><br><br>
						<?php include_once 'includes/footer.php' ?>
						<!---//End-footer--->
						<!---//End-wrap---->
				</div>
			</div>
		</div>
	</div>
<script src="js/showhide.js" type="text/javascript"></script>
<script src="js/selectfile.js" type="text/javascript"></script>

	</body>
</html>
<!--
		Author: W3layouts
		Author URL: http://w3layouts.com
		License: Creative Commons Attribution 3.0 Unported
		License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
else:
	header ('Location: index.php?pg=login&er=4');
endif;
?>

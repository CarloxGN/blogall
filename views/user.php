<?php
if (!isset($_GET['id']) && !is_numeric($_GET['id'])){
	header ('Location: ?pg=index&er=37');
}else{
	$id = filter_input(INPUT_GET, 'id', $filter = FILTER_VALIDATE_INT);
	$user = new controllerUsers();
	$data = $user->listUser($id);
	if($data != true){
		header ('Location: ?pg=index&er=37');
	}else{
		foreach ($data as $row) {
			$title = $_SESSION['name_site'].' | User`s information';
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
							include_once 'includes/user_info.php';?>
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
<?php
		}
	}
}
 ?>
<!--
		Author: W3layouts
		Author URL: http://w3layouts.com
		License: Creative Commons Attribution 3.0 Unported
		License URL: http://creativecommons.org/licenses/by/3.0/
-->

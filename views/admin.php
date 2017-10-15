<?php
if (!isset($_SESSION['id_level'])){
	header ('Location: ?pg=start&er=4');
	exit;
}elseif(!$_SESSION['id_level'] == 0){
		header ('Location: ?pg=start&er=25');
		exit;
}else{
	if(isset($_POST)){
		//Option 1 - Config
		if(isset($_POST['submit_config'])){
			include 'bin/upd_config.php';
		}

		if(isset($_POST['update_mis'])){
			include 'bin/upd_mis.php';
		}

		if(isset($_POST['update_user'])){
			include 'bin/upd_status_user.php';
		}

		if(isset($_POST['update_level_user'])){
			include 'bin/upd_level_user.php';
		}

		//Option 5 - Delete User
		if (isset($_POST['delete_user']) && is_numeric($_GET['id'])){
			include 'bin/del_user.php';
		}

		if(isset($_POST['update_blog']) && is_numeric($_GET['id'])){
			include 'bin/upd_status_blog.php';
		}

		if (isset($_POST['delete_comment']) && is_numeric($_GET['id'])){
			include 'bin/del_comment.php';
		}

		if(isset($_POST['update_comment'])){
			include 'bin/upd_status_comment.php';
		}
	}
	$title = $_SESSION['name_site'].' | Webmaster Section';
?>
<!DOCTYPE html>
<html>
<head>
<?php
include_once('includes/head.php');
?>
<style type="text/css">
#button {
	padding: 0;
}
#button li {
	display: inline;
}
#button li a {
	font-size:11px;
	text-decoration: none;
	float:left;
	padding: 10px;
	background-color: #2175bc;
	color: #fff;
}
#button li a:hover {
	background-color: #2586d7;
	margin-top:-2px;
	padding-bottom:12px;
}
</style>
</head>
		<!---start-wrap---->
			<!---start-header---->
	<?php include 'includes/header.php'; ?>
		<!---End-header---->
		<!---start-content---->
	<div><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p></div>
		<div class="content">
			<div class="wrap">
				<div class="contact-info">
					<div class="account_grid">
						  <ul id="button">
						    <li><a href="?pg=admin&tab=1"><span class="glyphicon glyphicon-cog"></span> &nbsp;Config file</a></li>
						    <li><a href="?pg=admin&tab=2"><span class="glyphicon glyphicon-th-list"></span> &nbsp;Miscellaneous</a></li>
						    <li><a href="?pg=admin&tab=3"><span class="glyphicon glyphicon-user"></span> &nbsp;Users</a></li>
								<li><a href="?pg=admin&tab=4"><span class="glyphicon glyphicon-th"></span> &nbsp;Posts</a></li>
								<li><a href="?pg=admin&tab=5"><span class="glyphicon glyphicon-bullhorn"></span> &nbsp;Comments</a></li>
						  </ul>
						  <?php
							if(isset($_GET['tab'])){
								switch ($_GET['tab']) {
									case 1:
										include_once 'includes/admin_config.php';
										break;
									case 2:
										include_once 'includes/admin_miscellaneous.php';
										break;
									case 3:
										include_once 'includes/admin_users.php';
										break;
									case 4:
										include_once 'includes/admin_posts.php';
										break;
									case 5:
										include_once 'includes/admin_comments.php';
										break;
									default:
										# code...
										include_once 'includes/admin_config.php';
										break;
								}
							}else{
								include_once 'includes/admin_config.php';
							}
							?>
	 			</div>
		</div>
	</div>
</div>
<div class="clearfix"> </div>
	<div class="background:url(images/border.png) repeat-x 0px 0px #FFF"></div>
	<!---//End-content---->
	<!----wookmark-scripts---->
	<script src="js/jquery.imagesloaded.js"></script>
	<script src="js/jquery.wookmark.js"></script>
	<script src="js/blog.scripts.js" type="text/javascript"></script>
	<!----//wookmark-scripts---->
	<!----start-footer--->
	<?php include_once 'includes/footer.php' ?>
	<!----//End-footer--->
	<!---//End-wrap---->
	<script type="text/javascript">
		alert ('Be careful! Any change in this section could damage the blogsite. Please check carefully your options');
		$( function() {
			$( "#tabs" ).tabs();
		} );
	</script>
	</body>
</html>
<?php
	}
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

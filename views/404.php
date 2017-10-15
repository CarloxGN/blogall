<?php
$title = $_SESSION['name_site'].' | Error 505. Internal Server Error';
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
		<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
		<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	</div>
		<div class="container">
			<div class="page-not-found" align="center"><p>
				<h3>Page not found</h3>
				<h1>error 404</h1>
				<h4><a class="btn btn-primary btn-lg" href="?pg=start"><u>Go Home</u></a></h4>
			</p>
			</div>
			<?php include_once 'includes/footer.php' ?>
			<!----//End-footer--->
			<!---//End-wrap---->
		</div>
		</body>
		</html>
		<!--
		Author: W3layouts
		Author URL: http://w3layouts.com
		License: Creative Commons Attribution 3.0 Unported
		License URL: http://creativecommons.org/licenses/by/3.0/
		-->

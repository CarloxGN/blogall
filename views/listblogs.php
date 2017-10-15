<?php
$title = $_SESSION['name_site'].' | Welcome to Our Tematic Blog about '.$_SESSION['about_site'];
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
		<div class="account_grid">
		<div class="container">
				 <div class="clearfix"></div>
				 <div class="col-md-12 login-right form-signin form-login">
					 <div class="" align="right" style="font-size: 9px">
						 * Search in this list
					 </div>
				 <table id="blogtable" class="display" cellspacing="0" width="100%" style="font-size:12px">
				 <thead>
				 <tr>
					 <th style="text-align: center">Title</th>
					 <th style="text-align: center">Author</th>
					 <th style="text-align: center">Date</th>
					 <th style="text-align: center">Topic</th>
				 </tr>
				 </thead><tbody>
					 <?php
				 $blogs = new controllerBlogs();
				 if(isset($_POST['q'])){
					 $q = filter_input(INPUT_POST, 'q', $filter = FILTER_SANITIZE_STRING);
					 $result = $blogs->listBlogsFiltered($q, 10000);
				 }else{
					 $result = $blogs->listBlogs(10000);
				 }
				 foreach ($result as $row){
					 echo '<tr>
							 		<td>
							 			&nbsp;&nbsp;&nbsp;
										<a href="?pg=single&id='.$row['id_blog'].'&title='.$row['title_blog'].'"  title="Post: '.$row['title_blog'].'">'.substr($row['title_blog'], 0, 65).'...</a>
							 		</td>
							 		<td>
								 		<a href="?pg=single&id='.$row['id_blog'].'&title='.$row['title_blog'].'" title="Blog: '.$row['title_blog'].'">'.$row['name_user'].'</a>
									</td>
							 		<td style="text-align: center">
									'.date("d-m-Y H:m:s", strtotime($row['register_blog'])).'
									</td>
							 		<td>
							 			 		&nbsp;&nbsp;'.$row['theme_blog'].'
									</td>
								 </tr>';
				 }
			 	?>
			 	</tbody></table></div>
				<div style="font-size:14px;align:center;">
					<a href="?pg=start">Back to Index</a>
				</div>
			</div>
		<div class="clearfix"> </div>
		</div>
	<div class="background:url(images/border.png) repeat-x 0px 0px #FFF">
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
	</body>
</html>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

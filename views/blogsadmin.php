<?php
if (!isset($_SESSION['id_level'])):
		header ('Location: ?pg=start&er=4');
		die();
elseif($_SESSION['id_level'] > 1):
		header ('Location: ?pg=start&er=25');
		die();
else:
	include 'bin/delblog.process.php';
	$title = $_SESSION['name_site'].' | Written Blogs Administrator';
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
						<div class="container">
			<a href="<?php
			$uri = new controllerLogin();
			echo $uri->esc_url($_SERVER['PHP_SELF']);?>?pg=commentsadmin" class="btn btn-primary btn-md">Admin Comments</a>
			&nbsp;&nbsp;<a href="<?php echo WEBSITEPATH;?>?pg=createblog" class="btn btn-primary btn-md">Create a New Post</a>
			<div class="clearfix"></div><br>
			<div class="info alert-info" style="font-size:10px; width:65%">
				Important: If you have suspended posts, please contact Blogsite`s Administrator to active them again.
			</div>
			<br>&nbsp;</p>
				<div align="center">
					<p style="font-face: italic; font-size: 14px;">
						Written Posts Administrator
					</p>
				</div>

			<p>&nbsp;</p>
				 <div class="clearfix"></div>
				 <div class="col-md-12 login-right form-signin form-login">
				 <table id="blogtable" class="display" cellspacing="0" width="100%" style="font-size:11px">
				 <thead>
				 <tr>
					 <th style="text-align: center">Title</th>
					 <th style="text-align: center">Status</th>
					 <th style="text-align: center">Date</th>
					 <th style="text-align: center">Topic</th>
					 <th style="text-align: center">Action</th>
				 </tr>
				 </thead><tbody>
					 <?php
				 $blogs = new controllerBlogs();
				 $result = $blogs->listBlogsByWriter($_SESSION['user_id']);
				 foreach ($result as $row){
					 echo '<tr>
							 		<td style="font-size:11px;';
									if($row['status_blog'] == 0){
										echo '">&nbsp;&nbsp;&nbsp;'.substr($row['title_blog'], 0, 100);
									}else{
									  echo 'cursor: pointer;" onclick="window.location =\''.WEBSITEPATH.'?pg=single&id='.$row['id_blog'].'&title='.$row['title_blog'].'\'">
							 			&nbsp;&nbsp;&nbsp;
										<a href="?pg=single&id='.$row['id_blog'].'&title='.substr($row['title_blog'], 0,60).'..."  title="Post: '.$row['title_blog'].'">'.substr($row['title_blog'], 0, 100).'</a>';
									}
							 		echo '</td><td style="text-align: center;font-size:10px">';
									if($row['status_blog'] == 0){
										echo '<span style="color: red">Suspended</span>';
									}else{
										echo '<span style="color: green">Active</span>';
									}
							 		echo '<td style="text-align: center;font-size:10px">
									'.date("d-m-Y H:m:s", strtotime($row['register_blog'])).'
									</td>
							 		<td>
							 			 		&nbsp;&nbsp;'.$row['theme_blog'].'
									</td>
										<td>
										<form method="post" action="">
										<input type="hidden" value="'.$row['id_blog'].'" name="id" />
										 <a href="?pg=editblog&id='.$row['id_blog'].'&title='.$row['title_blog'].'" title="Update blog: '.$row['title_blog'].'" >
										 	<img src="'.WEBSITEPATH.'images/update.png"/>
									 	</a>&nbsp;&nbsp;
										<button type="submit" class="no_button" name="delete_button" title="Delete blog: '.$row['title_blog'].'" onclick="return confirm(\'This action will DELETE this blog. Do you proceed?\')">
													 <img src="'.WEBSITEPATH.'images/trash.png"/>
											 </button>
											</form>
										</td>
								 </tr>';
				 }
			 	?>
			 	</tbody></table></div>
				<div style="font-size:14px;align:center;">
					<a href="?pg=start">Back to Index</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"> </div>
</div>
	<div class="background:url(images/border.png) repeat-x 0px 0px #FFF">
	<!---//End-content---->
	<!----wookmark-scripts---->
	<script src="js/jquery.imagesloaded.js"></script>
	<script src="js/jquery.wookmark.js"></script>
	<script src="js/blog.scripts.js"type="text/javascript"></script>
	<!----//wookmark-scripts---->
	<!----start-footer--->
	<?php include_once 'includes/footer.php' ?>
	<!----//End-footer--->
	<!---//End-wrap---->
	</body>
</html>
<?php endif;?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

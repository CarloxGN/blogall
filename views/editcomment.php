<?php
include 'bin/htmlentitiesinvert.php';

if (!isset($_SESSION['id_level'])){
	header ('Location: ?pg=start&er=4');
	exit;
}else{
		if(isset($_POST['delete_button'])){
			include 'bin/delcomment.process.php';
			exit;
		}
		if(isset($_POST['update'])){
			if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['body'])){
				include 'bin/updcomment.process.php';
			}else{
				header ('Location: ?pg=editcomment&er=5');
				exit;
			}
		}

		if (!isset($_REQUEST['title']) || !isset($_REQUEST['id'])){
			header ('Location: ?pg=commentsadmin&er=5');
		}else{
			if(isset($_POST['title']) && isset($_POST['id'])){
				$title = filter_input(INPUT_POST, 'title', $filter = FILTER_SANITIZE_STRING);
				$id_comment = filter_input(INPUT_POST, 'id', $filter = FILTER_SANITIZE_NUMBER_INT);
			}else{
				$title = filter_input(INPUT_GET, 'title', $filter = FILTER_SANITIZE_STRING);
				$id_comment = filter_input(INPUT_GET, 'id', $filter = FILTER_SANITIZE_NUMBER_INT);
			}
			if (!is_numeric($id_comment)){
				unset($_SESSION['active_comment']);
				header('Location: ?pg=commentsadmin&er=5');
				exit;
			}
			$blogger = new controllerComments();
		$query = $blogger->listComment($id_comment, $_SESSION['user_id']);
			if ($query == true){
				$_SESSION['active_comment'] = $id_comment;
				foreach ($query as $val) {
						$title_blog = $val['title_blog'];
						$name_user = $val['name_user'];
						$id_blog = $val['id_blog'];
						$body = $val['body_comment'];
						$register = $val['register_comment'];
						$title_comment = $val['title_comment'];
						$type = $val['tbl_ref'] == 0 ? 'Comment' : 'Reply';
					}
				}else{
					header('Location: ?pg=start&er=25');
					exit;
				}
		}
		$title = $_SESSION['name_site'].' | Comment Editor. Title: '.$title;
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
									<div class="contact-grids">
											 <div class="col_1_of_bottom span_1_of_first1">
												 <h5>Author</h5>
												  <ul class="list3">
													<li>
															<img src="<?php echo WEBSITEPATH;?>images/home.png" alt="">
															<div class="extra-wrap">
															 <p><?php echo $name_user;?></p>
															</div>
														</li>
													</ul>
											  </div>
												<div class="col_1_of_bottom span_1_of_first1">
												 <h5>Creation Date</h5>
													<ul class="list3">
														<li>
														<img src="<?php echo WEBSITEPATH;?>images/calendar-b.png" alt="">
															<div class="extra-wrap">
																<p><span><?php echo date("d-m-Y H:m:s", strtotime($register));?></p>
															</div>
														</li>
													</ul>
												</div>
												<div class="col_1_of_bottom span_1_of_first1">
												 <h5>Type</h5>
													<ul class="list3">
														<li>
														<img src="<?php echo WEBSITEPATH;?>images/calendar-b.png" alt="">
															<div class="extra-wrap">
																<p><span><?php echo $type;?></p>
															</div>
														</li>
													</ul>
												</div>
												<div class="col_1_of_bottom span_1_of_first1">
												 <h5>Blog</h5>
													<ul class="list3">
														<li>
														<img src="<?php echo WEBSITEPATH;?>images/calendar-b.png" alt="">
															<div class="extra-wrap">
																<p><span>
																<?php
																echo '<a href="?pg=single&id='.$id_blog.'&title='.$title_blog.'&tag='.strtotime($register).'" title="Comment:  '.$title_comment.'" target="_blank">'.substr($title_blog, 0, 100).'</a>';
																?>
																</p>
															</div>
														</li>
													</ul>
												</div>
												<div class="clear"></div>
										 </div>
								<form method="post" action="<?php
								$uri = new controllerLogin();
								echo $uri->esc_url($_SERVER['PHP_SELF']);?>?pg=editcomment" method="post">
								<input type="hidden" name="hide_title" value="<?php echo $title_comment;?>">
								<span>Title:</span>
								<div class="clear"></div>
						    <input type="text" name="title" class="form-control input-md col-ms-5 col-md-8" id="inputsm" value="<?php echo $title_comment;?>"  required="required">
								<div class="clear"></div><br>
								Body:
								<div class="clear"></div>
								<textarea name="body" rows="6" id="body_new_comment" class="notinymce" required="required" style=" width: calc(100%);"><?php echo strip_tags($body); ?></textarea>
								<div class="clear"></div>
								<div class="clear"></div><hr><div class="clear"></div>
								<input type="submit" class="btn btn-primary" value="Update" name="update"> &nbsp; &nbsp; <input type="submit" class="btn btn-primary btn-danger" value="Delete" name="delete_button" onclick="return confirm(\'This action will DELETE this comment. Do you proceed?\')">
								<input type="hidden" name="id" value="<?php echo $_SESSION['active_comment']; ?>">
							<div class="clear"></div><hr>
							<div class="clear"></div>
 							<div class="clear"></div>
					</form>
				</div>
			</div>
					</div>
					<!----start-footer--->
					<?php include_once 'includes/footer.php' ?>
					<!----//End-footer--->
					<!---//End-wrap---->
					<div class="clear"></div>
					<div class="clear"></div>
					<div class="clear"></div>
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

<?php
if (!isset($_SESSION['id_level'])):
	header ('Location: ?pg=start&er=4');
	die();
	elseif($_SESSION['id_level'] > 1):
		header ('Location: ?pg=start&er=25');
		die();
	else:
		if(isset($_POST['update'])):
			if(isset($_POST['id_theme']) && isset($_POST['title_blog']) && isset($_POST['subtitle_blog']) && isset($_POST['kind_media_blog']) && isset($_POST['body_blog'])):
				include 'bin/updblog.process.php';
			else:
				header ('Location: ?pg=editblog&er=5');
				die();
			endif;
		endif;
			if (!isset($_GET['title']) || !isset($_GET['id'])):
				header ('Location: ?pg=blogsadmin&er=5');
			else:
				$title = filter_input(INPUT_GET, 'title', $filter = FILTER_SANITIZE_STRING);
				$id_blog = filter_input(INPUT_GET, 'id', $filter = FILTER_SANITIZE_NUMBER_INT);
				if (!is_numeric($id_blog)){
					unset($_SESSION['active_blog']);
					header('Location: ?pg=start&er=5');
					die();
				}
				$_SESSION['active_blog'] = $id_blog;
				$title = $_SESSION['name_site'].' | Blog Editor. Title: '.$title;
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
						<p>&nbsp;</p><p>&nbsp;</p>
					</div>
						<div class="content">
							<div class="wrap">
								<div class="contact-info">
									<?php
										$blogger = new controllerBlogs();
										$data = $blogger->listBlog($id_blog);
										foreach ($data as $row):
									?>
									<div class="contact-grids">
											 <div class="col_1_of_bottom span_1_of_first1">
												    <h5>Author</h5>
												    <ul class="list3">
														<li>
															<img src="<?php echo WEBSITEPATH;?>images/home.png" alt="">
															<div class="extra-wrap">
															 <p><?php echo $row['name_user'];?></p>
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
																<p><span><?php echo date("d-m-Y H:m:s", strtotime($row['register_blog']));?></p>
															</div>
														</li>
													</ul>
												</div>
												<div class="col_1_of_bottom span_1_of_first1">
													 <h5>Views</h5>
												    <ul class="list3">
														<li>
															<img src="<?php echo WEBSITEPATH;?>images/search-icon-b.png" alt="">
															<div class="extra-wrap">
															  <p><span class="mail"><?php echo $row['views_blog'] ?></span></p>
															</div>
														</li>
													</ul>
											  </div>
												<div class="col_1_of_bottom span_1_of_first1">
													 <h5>Likes</h5>
												    <ul class="list3">
														<li>
															<img src="<?php echo WEBSITEPATH;?>images/like.png" alt="">
															<div class="extra-wrap">
															  <p><span class="mail"><?php echo $row['likes_blog'] ?></span></p>
															</div>
														</li>
													</ul>
											  </div>
											<div class="clear"></div>
										 </div>
											 	<form method="post" action="<?php
												$uri = new controllerLogin();
												echo $uri->esc_url($_SERVER['PHP_SELF']);?>?pg=editblog" enctype="multipart/form-data" method="post">
												<input type="hidden" name="hide_title" value="<?php echo $title;?>">
														<span>Title:</span>
														<div class="clear"></div>
									          <input type="text" name="title_blog" class="form-control input-md col-ms-5 col-md-8" id="inputsm" value="<?php echo $row['title_blog'];?>" required="required">
														<div class="clear"></div><br>
														<span>Subtitle:</span>
														<div class="clear"></div>
														<input type="text" name="subtitle_blog" class="form-control input-sm col-ms-5" id="inputsm" value="<?php echo $row['subtitle_blog'];?>" required="required">
														<div class="clear"></div><br>
														Body:
														<div class="clear"></div>
														<textarea class="tinymce" name="body_blog" required="required">
															<?php echo $row['body_blog']; ?>
														</textarea>
										        <div class="clear"></div><br>
														Theme related:
														<div class="clear"></div>
														<select name="id_theme">
															<?php
															echo '<option value="'.$row['id_theme'].'">'.$row['theme_blog'].' (Selected)</option>';
															$theme = new controllerThemes();
															$data = $theme->listThemes();
															foreach ($data as $value) {
																echo '<option value="'.$value['id_theme'].'">'.$value['theme_blog'].'</option>';
															}
															?>
														</select>
														<div class="clear"></div><br>
														Type of media:
														<div class="clear"></div>
														<select name="kind_media_blog" required="required">
															<?php
																echo '<option value="same">'.$row['kind_media_blog'].' (Selected)</option>';
															?>
															<option value="image">Image</option>
															<option value="video">Video</option>
														</select>
														<span style="font-size:9px; color: blue">If you want to change the media, please select a different than current option</span>
														<div class="clear"></div><br>
												      Your Main Image:
												      <div class="input-group">
												        <label class="input-group-btn">
												          <span class="btn btn-primary" style="font-size:14px;">
												            Browse&hellip; <input type="file" style="display: none;" name="image_media_blog">
												          </span>
												        </label>
												        <input type="text" class="form-control" readonly name="media-b" style="font-size:10px;">
												        </div>
																<span style="font-size:9px; color: blue">Just ".jpg" files / Max: 1600x1200 pixels & 2.5MB </span>
																<div class="clear"></div><br>
																Your Main Video:
																<input type="text" name="media_blog" class="form-control input-sm col-ms-5" id="inputsm" placeholder="[write this information]... if you are choosing a video">
																<span style="font-size:9px; color: blue">Just Youtube videos. https://www.youtube.com/embed/[write this information]</span>
																<div align="center">
												        <span class="help-block" style="font-size:10px;">
																	<?php
																	include 'includes/img_or_yt_blog_single.php';
																	?>
												        </span>
																</div>
															<div class="clear"></div>
															<div class="clear"></div><hr>
														 	<div class="clear"></div>

																	<input type="submit" class="btn btn-primary btn-block" value="Update" name="update">

															<div class="clear"></div><hr>
														 <div class="clear"></div>
														 <div class="clear"></div>
										    </form>
											<?php
												endforeach;
											?>
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
	endif;
endif;
		?>
		<!--
		Author: W3layouts
		Author URL: http://w3layouts.com
		License: Creative Commons Attribution 3.0 Unported
		License URL: http://creativecommons.org/licenses/by/3.0/
		-->

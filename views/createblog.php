<?php
if (!isset($_SESSION['id_level'])){
	header ('Location: ?pg=start&er=4');
	exit;
}elseif($_SESSION['id_level'] > 1){
		header ('Location: ?pg=start&er=25');
		exit;
}else{
		if(isset($_POST['create'])){
			include 'bin/createblog.process.php';
		}
			$title = $_SESSION['name_site'].' | Blog Creator';
		?>
		<!DOCTYPE html>
		<html>
		<head>
		<?php
			include_once('includes/head.php');
		?>
		</head>
			<!-- -start-wrap-- -->
			<!-- -start-header-- -->
			<?php include 'includes/header.php'; ?>
			<!-- -End-header-- -->
			<!-- -start-content-- -->
			<div>
				<p>&nbsp;</p><p>&nbsp;</p>
					</div>
						<div class="content">
							<div class="wrap">
								<div class="contact-info">
									<form method="post" action="<?php echo WEBSITEPATH;?>?pg=createblog" enctype="multipart/form-data" method="post" id="formuploadajax" onsubmit="return false;">
										<span>Title:</span>
										<div class="clear"></div>
									  <input type="text" name="title" class="form-control input-md col-ms-5 zol-md-8" id="title" value="<?php if(isset($_SESSION['title_blog_active'])) echo $_SESSION['title_blog_active'];?>" required="required">
										<div class="clear"></div><br>
										<span>Subtitle:</span>
										<div class="clear"></div>
										<input type="text" name="subtitle" class="form-control input-md col-ms-5 zol-md-8" id="subtitle" value="<?php if(isset($_SESSION['subtitle_blog_active'])) echo $_SESSION['subtitle_blog_active'];?>" required="required">
										<div class="clear"></div><br>
										Body:
										<div class="clear"></div>
										<textarea class="tinymce" name="body" id="body" cols="127%" rows="20"><?php if(isset($_SESSION['body_blog_active'])) echo $_SESSION['body_blog_active'] ?></textarea>
										<div class="clear"></div><br>
										Theme related:
										<div class="clear"></div>
										<select name="theme" id="theme" class="form-control input-md col-ms-5 zol-md-8">
										<?php
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
										<select name="type_media_blog" required="required" id="tmb" class="form-control input-md col-ms-5 zol-md-8">
												<option value="image">Image</option>
												<option value="video">Video</option>
										</select>
										<span style="font-size:9px; color: blue">You only need to select the image or video depending on the media option</span>
										<div class="clear"></div><br>
											Your Main Image:
										<div class="input-group">
										<label class="input-group-btn">
										<span class="btn btn-primary" style="font-size:14px;">
								Browse&hellip; <input type="file" style="display: none;" name="image" id="file" class="input-group">
											</span>
											</label>
											<input type="text" class="form-control" readonly name="name_image" style="font-size:10px;" id="media">
											</div>
											<span style="font-size:9px; color: blue">Just "jpg/png/bmp/gif" files / Max: 1600x1200 pixels & 2.5MB </span>
											<div class="clear"></div><br>
											Your Main Video:
											<input type="text" name="video" class="form-control input-sm col-ms-5" id="video" placeholder="[write this information]... if you  are choosing a video">
											<span style="font-size:9px; color: blue">Just Youtube videos. https://www.youtube.com/embed/[write this information]</span>
											<div align="center">
											<span class="help-block" style="font-size:10px;"></span>
											</div><div class="clear"></div>
											<div class="processing"></div>
											<div class="clear"></div><hr>
									 	<div class="clear"></div>
									<button type="submit" class="btn btn-primary btn-block" id="create" name="create">Create</button>
								<div class="clear"></div><hr>
							 <div class="clear"></div>
						 <div class="clear"></div>
					 </form>
					</div>
				</div>
			</div>
		<!-- start-footer -->
		<?php include_once 'includes/footer.php' ?>
		<!-- //End-footer -->
		<!-- //End-wrap -->
			<div class="clear"></div>
			<div class="clear"></div>
			<div class="clear"></div>
		</body>
	</html>
<?php
unset($_SESSION['title_blog_active']);
unset($_SESSION['subtitle_blog_active']);
unset($_SESSION['body_blog_active']);
}
?>
<script src="js/create.post.scripts.js" charset="utf-8"></script>
	<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
	-->

<?php
if (!$_GET['id'] || !$_GET['title'] || !is_numeric($_GET['id'])):
		header('Location:?pg=start&er=5');
else:
	$title = filter_input(INPUT_GET, 'title', $filter = FILTER_SANITIZE_STRING);
	$_SESSION['active_title'] = $title;
	$title = $_SESSION['name_site'].' | Blog of: '.$title;
	$id_blog = filter_input(INPUT_GET, 'id', $filter = FILTER_VALIDATE_INT);
	if(isset($_GET['tag'])) $tag = filter_input(INPUT_GET, 'tag', $filter = FILTER_SANITIZE_STRING);
	$_SESSION['active_blog'] = $id_blog;
?>
<!DOCTYPE html>
<html>
<head>
<?php
include_once 'includes/head.php';
?>
</head>
		<!---start-wrap---->
			<!---start-header---->
		<?php include 'includes/header.php'; ?>
		<!---//End-header---->
		<!---start-content---->
		<div>
			<p>&nbsp;</p><p>&nbsp;</p>
			<p align="center"><a href="?pg=start">GO TO MAIN PAGE</a></p>
		</div>
		<div class="content">
			<div class="wrap">
				<div class="single-page">
					<!-- Start Blog/Article -->
					<?php
					if (isset($id_blog) && is_numeric($id_blog)):
						$blog = new controllerBlogs();
						$blog_single = $blog->listBlog($id_blog);
						if($blog_single == false):
							echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php?pg=start&er=14">';
							exit;
						else:
							$_SESSION['active_blog'] = $id_blog;
							$blog->updateViewsBlog($id_blog);
							foreach($blog_single as $key => $row):
							?>
							<div class="welcome_blog">
								<div style="font-size: 20px" align="center">
									<h2><?php echo $row['title_blog'];?></h2>
								</div>
								<br>
								<div class="slogan" align="right">
									<img src="<?php echo WEBSITEPATH;?>images/avatars/<?php echo $row['avatar_user'];?>" width="80" class="round-avatar" alt="">
									<div class="clear"></div>
									<?php echo 'Posted by: <b>'.$row['name_user']. '<b> || contact: <b>' .$row['email_user'] .'</b> <br> Member since: <b>' .date("l jS \of F Y h:i:s A", strtotime($row['register_user'])).'<br> Level: '.$row['name_level']. '</b>';?>
									<hr>
									<?php echo 'Post Date: '.date("d-m-Y H:m:s", strtotime($row['register_blog']));?>
									<div class="clear"></div>
								</div>
								<div class="slogan" align="right">
									<h4><?php echo 'Topic: <b>'.$row['theme_blog'];?></h4>
									<br>
									<div class="clear"></div><hr>
								</div>

								<div style="font-size: 15px" align="justify">
									<?php echo $row['subtitle_blog'];?>
								</div>
								<br><br>
							</div>
								<div class="single-page-artical">
										<div class="artical-content" align="center">
											<?php
												include 'includes/img_or_yt_blog_single.php';
											?>
										</div><br><br><hr>
											<p align="justify"><?php echo $row['body_blog'];?></p>
											</p>
										    <div class="artical-links">Post Statistic:
				  						 	<ul>
				  						 		<li><a href="?pg=user&id=<?php echo $row['id_user'];?>"><img src="<?php echo WEBSITEPATH;?>images/blog-icon2.png" title="<?php echo $row['name_user'];?>"> <span>  <?php echo $row['name_user'];?> </span></a></li>

				  						 		<li> || <img src="<?php echo WEBSITEPATH;?>images/blog-icon3.png" title="Comments"><span><?php
													$comment = new controllerComments();
													echo $comment->numComments($_SESSION['active_blog']);
													 ?> comments</span></li>
				  						 		<li> || <img src="<?php echo WEBSITEPATH;?>images/blog-icon4.png" title="Lables"><span><?php  echo $row['views_blog'];?> Views</span></li>
				  						 	</ul>
				  						 </div>
				  						 <div class="share-artical">Share this post:
				  						 	<ul>
				  						 		<li><a href="http://www.facebook.com/sharer.php?u=<?php
														$host= $_SERVER["HTTP_HOST"];
														$url= $_SERVER["REQUEST_URI"];
														$uri = $host.$url;
														echo $uri;?>" target="_blank" title="https://www.facebook.com/<?php echo $row['facebook_user'];?>"><img src="<?php echo WEBSITEPATH;?>images/facebooks.png" title="Share this: <?php echo $title;?>"> Facebook </a>
													</li>
				  						 		<li>
													<a href="https://twitter.com/intent/tweet?url=<?php
													$uri_encoded = rawurlencode($uri);
													echo $uri_encoded;
													?>
													 " class="twitter-share-button" data-lang="en" data-text="check out link b" data-url="<?php echo $uri;?>" target="_blank"> <img src="<?php echo WEBSITEPATH;?>images/twiter.png" alt="">Twitter</a>
													</li>
				  						 		<li><a href="https://plus.google.com/share?url=<?php echo $uri;?>" target="_blank" title="https://plus.google.com/share?url=<?php echo $uri;?>"><img src="<?php echo WEBSITEPATH;?>images/google+.png" >Google+</a></li>
				  						 		<li><a href="http://www.linkedin.com/shareArticle?url=<?php echo $uri;?>" target="_blank" title="http://www.linkedin.com/shareArticle?url=<?php echo $uri;?>"><img src="<?php echo WEBSITEPATH;?>images/lnk.png" title="LinkedIn">LinkedIn</a></li>
				  						 	</ul>
				  						 </div>

											 <div class="col_1_of_bottom span_1_of_first1">
													<h5>Likes</h5>
													 <ul class="list3">
													 <li>
														 <div class="extra-wrap">
															 <img src="<?php echo WEBSITEPATH;?>images/like.png" alt="" id="addlike" style="cursor: pointer">
															 <span class="mail" id="showlikes"><?php echo $row['likes_blog'] ?></span>
														 </div>
													 </li>
												 </ul>
											 </div>
				  						 <div class="clear"> </div>
									</div>
									<?php
								endforeach;
							endif;
						endif;
						?>
			<!-- End Blog/Article -->
			<!---start-comments-section--->
			<div class="comment-section">
				<div class="grids_of_2">
					<hr class="hr-blog">
					<label style="font-size: 20px">Comments</label>
					<div class="comments">
						<?php
						$_SESSION['active_blog'] = $id_blog;
							include 'bin/comments.process.php';
						?>
					</div>
							<div class="artical-commentbox">
								<div class="addedcomments"></div>
							<hr class="hr-blog">
								<label style="font-size: 15px">Leave a Comment</label>
								 <div class="clear"> </div><br>

								<?php
									if(isset($_SESSION['username'])):
								?>
							<form action="" method="post" name="post_comment" class="form-group-comment">
								<label>Title <span style="font-size: 9px;font-face: italic;">* min. 10 characters & max. 150 Characters</span></label>
								<input type="text" name="title_comment" id="title_new_comment" class="form-control" id="inputdefault" min="10" maxlength="150" placeholder="Write here your comment's title" required="required"><div class="processing2" style="font-size: 9px;color:blue;"></div>

								<div class="clear"></div><br>
								<div>
								<label>Your Comment <span style="font-size: 9px;font-face: italic;">* min. 15 characters & max. 1500 Characters</span></label>
		 						<div class="clear"> </div>
								<textarea name="body" rows="6" id="body_new_comment" class="notinymce" required="required" style=" width: calc(100%);" maxlength="1500"> </textarea>
								<div class="processing" style="font-size: 9px;color:blue;"></div>
								</div>
								<div id="msg"></div>
								<div class="clear"> </div><br>
								<input type="submit" id="send-btn" value="Submit" class="btn btn-primary" onclick="return false">
								&nbsp;
								<input type="reset" id="reset-btn" value="Cancel" class="btn btn-danger">
								<input type="hidden" name="id_blog-comment" id="id_blog-comment" value="<?php echo $_SESSION['active_blog']; ?>" >
								<input type="hidden" name="ref" id="ref" value="0" >
							</form>
							</div>
								<?php
							else:
								echo '<br><i style="color:red;font-size: 14px"">If you want to comment this post, <a href="?pg=login">please Log first</a></i>';
							endif;
							 ?>
							 <div class="clear"> </div>
				  	</div>

					</div>
				</div>
			<!---//End-comments-section--->
			</div>
		</div>
	</div>
		<!----start-footer--->
		<script src="<?php echo WEBSITEPATH; ?>js/jquery.imagesloaded.js" type="text/javascript"></script>
		<script src="<?php echo WEBSITEPATH; ?>js/jquery.wookmark.js" type="text/javascript"></script>
		<script src="<?php echo WEBSITEPATH; ?>js/blog.scripts.js" type="text/javascript"></script>
		<script src="<?php echo WEBSITEPATH; ?>js/comments.display.js" type="text/javascript"></script>
		<script src="<?php echo WEBSITEPATH; ?>js/comments.scripts.js" charset="utf-8"></script>
		<script src="<?php echo WEBSITEPATH; ?>js/letter.counter.js" charset="utf-8"></script>

	<!----//wookmark-scripts---->
	<!----start-footer--->
	<?php include_once 'includes/footer.php' ?>
	<!----//End-footer--->
	<!---//End-wrap---->
</body>
</html>
<?php
endif;
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
if(isset($_GET['tag'])){
	?>
	<script type="text/javascript">
	$(document).ready(function() {
			$('html,body').animate({
				scrollTop: $("#<?php if(isset($tag)){ echo $tag;}else{echo "header";}?>").offset().top
			}, 2000);
	});
	</script>
<?php
	}
?>

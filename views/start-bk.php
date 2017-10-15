<?php
$title = $_SESSION['name_site'].' | Welcome to Our Tematic Blog about '.$_SESSION['about_site'];
?>
<!DOCTYPE html>
<html>
<head>
<?php
include_once('includes/head.php');
?>
<script src="js/jquery.min.js"></script>
        <!----start-dropdown- -->
         <script type="text/javascript">
			var $ = jQuery.noConflict();
				$(function() {
					$('#activator').click(function(){
						$('#box').animate({'top':'0px'},500);
					});
					$('#boxclose').click(function(){
					$('#box').animate({'top':'-700px'},500);
					});
				});
				$(document).ready(function(){
				//Hide (Collapse) the toggle containers on load
				$(".toggle_container").hide(); 
				//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
				$(".trigger").click(function(){
					$(this).toggleClass("active").next().slideToggle("slow");
						return false; //Prevent the browser jump to the link anchor
				});
									
			});
		</script>
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
					<div class="welcome_box">
						<div align="center" id="w-title">
							<h2><?php echo $_SESSION['name_site'];?></h2>
						</div>
						<br>
						<p class="slogan" align="right">
							<?php echo $_SESSION['slogan_site'];?>
						</p>
						<br>
						<div id="w-subtitle" align="justify">
							<?php echo $_SESSION['welcome_site'];?>
						</div>
					</div>
					<div class="clear"> </div><br>
					<div align="center">						
						<div id="w-subtitle" align="justify" style="width:70%">
							<?php echo $_SESSION['maintext_site'];?>
						</div>
					</div>

			 <div id="main" role="main">
				    <ul id="tiles">
			      <!-- These are our grid blocks -->
						<?php
						$blogs = new controllerBlogs();
						$blog_list = $blogs->listBlogs();
						if (count($blog_list) == 0):
							echo 'None POST published until now. Be the firts in publish one';
							echo '<br><a href="?pg=createblog">CLICK HERE TO START</a> ';
						else:
					foreach($blog_list as $row):
      				?>
								<li onclick="location.href='index.php?pg=single&id=<?php echo $row['id_blog'];?>&title=<?php echo $row['title_blog'];?>'">
									<?php
										include 'includes/img_or_yt_blog.php';
									?>
				        	<div class="post-info">
				        		<div class="post-basic-info">
					        		<h4><a href="index.php?pg=single&id=<?php echo $row['id_blog'];?>&title=<?php echo $row['title_blog'];?>"><?php echo $row['title_blog'];?></a></h4>
					        		<span><a href="index.php?pg=single&id=<?php echo $row['id_blog'];?>&title=<?php echo $row['title_blog'];?>"><label></label> <?php echo $row['theme_blog'];?> </a></span>
											<table>
												<tr>
													<td><a href="index.php?pg=single&id=<?php echo $row['id_blog'];?>&title=<?php echo $row['title_blog'];?>"><img src="<?php echo WEBSITEPATH;?>images/calendar.png" width="15"></td>
													<td><span style="color:#ACAAAA; font-size:0.9em; font-size:12px;"> &nbsp;&nbsp;&nbsp;<?php echo date("d-m-Y H:m:s",  strtotime($row['register_blog']));?></a></span></td>
												</tr>
											</table><br>
					        		<p><?php echo $row['subtitle_blog'];?></p>
				        		</div>
				        		<div class="post-info-rate-share">
				        			<div class="rateit">
				        				<span> </span>
				        			</div>
				        			<div class="post-share">
				        				<span> </span>
				        			</div>
				        			<div class="clear"> </div><br>
				        		</div>
				        	</div>
				        </li>
							<?php
						endforeach;
					endif;
						?>
						<!-- End of grid blocks -->
			     </ul>
			   </div>
			</div>
		</div>
		</div>
	</a></td></tr></table></div></div></li></ul></div></div></div>
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
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

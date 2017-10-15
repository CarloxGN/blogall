<?php
if(isset($_POST['contact'])){
	include 'bin/contact.process.php';
}
$title = $_SESSION['name_site'].' | Contact';
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
					<div class="map">
						<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px"></a></small>
					 </div>
					 <div class="contact-grids">
							 <div class="col_1_of_bottom span_1_of_first1">
								    <h5>Address</h5>
								    <ul class="list3">
										<li>
											<img src="<?=WEBSITEPATH;?>images/home.png" alt="">
											<div class="extra-wrap">
											 <p>NEW YORK - BOGOTÁ - SAN FRANCISCO,<br> follow us in our social networks.</p>
											</div>
										</li>
									</ul>
							    </div>
								<div class="col_1_of_bottom span_1_of_first1">
								    <h5>Phones</h5>
									<ul class="list3">
										<li>
											<img src="<?=WEBSITEPATH;?>images/phone.png" alt="">
											<div class="extra-wrap">
											<p><span>Telephone:</span>+1 800 258 2598</p>
											</div>
												<img src="<?=WEBSITEPATH;?>images/fax.png" alt="">
											<div class="extra-wrap">
												<p><span>FAX:</span>+1 800 589 2587</p>
											</div>
										</li>
									</ul>
								</div>
								<div class="col_1_of_bottom span_1_of_first1">
									 <h5>Email</h5>
								    <ul class="list3">
										<li>
											<img src="<?=WEBSITEPATH;?>images/email.png" alt="">
											<div class="extra-wrap">
											  <p><span class="mail"><a href="mailto:<?=$_SESSION['contact_site']?>">info (at) <?=$_SESSION['contact_site']?></a></span></p>
											</div>
										</li>
									</ul>
							    </div>
								<div class="clear"></div>
							 </div>
							 	<form method="post" action="<?=WEBSITEPATH;?>?pg=contact">
							     <div class="contact-form">
										<div class="contact-to">
					          <input type="text" class="text" placeholder="Name... (max 20 characters)" name="name" required>
										<input type="text" class="text" placeholder="Email... (max 40 characters)" name="email" required>
										<input type="text" class="text" placeholder="Subject... (max 120 characters)" name="subject" required>
										</div>
										<div class="text2">
						        <textarea name="message" placeholder="Message... (max 600 characters)" required></textarea>
						        </div>
						        <span><input type="submit" class="" name="contact" value="Submit"></span>
						      <div class="clear"></div><br>
									<div class="g-recaptcha" data-sitekey="6LfHBikUAAAAAKwHIqZAzSVaWnQ-hSH8ManPQmnx"></div>
						 		</div>
						 	</form>
					</div>
			</div>
		</div>
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

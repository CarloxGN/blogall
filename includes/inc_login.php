<?php
if (isset($_SESSION['username']) && isset($_SESSION['user_id']) && $_SESSION['username'] != '' && $_SESSION['user_id'] != '0' ){
	echo '<div class="session_on"><span class="timer" id="timer"></span>Session started already || You can <a href="'.WEBSITEPATH.'?pg=logout" id="sessionKiller">logout here</a> or go to <a href="'.WEBSITEPATH.'?pg=start" >main page</a></div>';
}else{
	?><form action="<?=WEBSITEPATH;?>?pg=process_login" class="formul" method="post" method="post" name="login_form" accept-charset="utf-8">
		<div id="alertBoxes"></div>
			<label style="font-size: 20px" align="center">Registered user</label><span class="timer" id="timer"></span><br><br>
			<p>If you are registered, please login here:</p>
						<div class="form-group">
								<label for="usr">Email </label><label title="Required">*</label>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="email" name="email" required="required" placeholder="Email *" value="<?php
									if (isset($_GET['email'])):
										$email = filter_input(INPUT_GET, 'email', $filter = FILTER_SANITIZE_STRING);
										echo $email;
								endif;
								?>">
							</div>
								<div class="form-group">
									<label for="pwd">Password <label title="Required">*</label></label>
								</div>
							<div class="form-group">
							<input type="password" class="form-control" id="password" name="password" required="required" placeholder="Password *">
						</div>

			  	<button type="button" class="btn btn-primary btn-block" id="access"><b>Login</b></button>
				  <br>
					<p class="slogan" align="right" style="font-size:9px"><a class="forgot" href="<?=WEBSITEPATH;?>?pg=lostuser" title="Clic here!">Lost your USER or PASSWORD?</a></p>
					<div class="g-recaptcha" data-sitekey="6LfHBikUAAAAAKwHIqZAzSVaWnQ-hSH8ManPQmnx"></div>
		</form>
		<div class="container" id="result"></div>
	</div>
	<?php
}
?>

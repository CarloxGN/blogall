<fieldset>
<?php
if (!isset($_GET['wm'])){
  $uri = new controllerLogin();
  $uri->esc_url($_SERVER['PHP_SELF']);
}
 ?>
<!-- Form Name -->
<legend style="font-size: 20px;">Register New Account</legend>
<br><br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name</label>
  <div class="col-md-5">
  <input id="usr" name="name" placeholder="your name . . ." class="form-control input-md" required="" type="text" style="font-size:10px;" value="<?php
  if(isset($_GET['name'])){
    echo $_GET['name'];
  }else{
    if(isset($_SESSION['admin_name'])) echo $_SESSION['admin_name'];
  } 
  ?>">
  <span class="help-block" style="font-size:10px;">Name and lastname (+4charts)</span>
  </div><span id="result1"></span>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>
  <div class="col-md-5">
  <input id="email_new" name="email_new" placeholder="your email . . ." class="form-control input-md" required="" type="email" style="font-size:10px;" value="<?php if(isset($_GET['email'])) echo $_GET['email']; if(isset($_SESSION['admin_email'])) echo $_SESSION['admin_email'];?>">
  <span class="help-block" style="font-size:10px;">This email will be your user account</span>
</div><span id="result2"></span>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Confirm email</label>
  <div class="col-md-5">
  <input id="textinput" name="confirmemail" placeholder="your email here again" class="form-control input-md" required="required" type="email" style="font-size:10px;" value="<?php if(isset($_GET['confirmemail'])) echo $_GET['confirmemail']; if(isset($_SESSION['admin_email'])) echo $_SESSION['admin_email'];?>">
  <span class="help-block" style="font-size:10px;">Rewrite your email to confirm</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-5">
  <input id="password" name="pass" placeholder="your password . . ." class="form-control input-md" required="" type="password" style="font-size:10px;" value="<?php if(isset($_SESSION['admin_password'])) echo $_SESSION['admin_password']; ?>">
  <span class="help-block" style="font-size:10px;"><ul>
  <li> At least one uppercase letter (A-Z)</li>
  <li> At least one lowercase letter (a-z)</li>
  <li> At least one number (0-9)</li>
  <li> More than 6 numbers or letters with out special characters</li>
  </ul>
  </span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="confirm_password">Confirm password</label>
  <div class="col-md-5">
  <input id="confirm_password" name="confirmpwd" placeholder="Confirm your password" class="form-control input-md" required="required" type="password" style="font-size:10px;" value="<?php if(isset($_SESSION['admin_password'])) echo $_SESSION['admin_password']; ?>">
  <span class="help-block" style="font-size:10px;">Rewrite your password to confirm</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="web">Your Website</label>
  <div class="col-md-6">
  <input id="web" name="web" placeholder="your website . . ." class="form-control input-md" type="text" style="font-size:10px;" value="<?php
  if(isset($_SESSION['web_user'])){
    echo $_SESSION['web_user'];
  }elseif(isset($_SESSION['WEBSITEPATH'])){
    echo $_SESSION['WEBSITEPATH'];
  }else{
    echo WEBSITEPATH;
  }
  ?>">
  <span class="help-block" style="font-size:10px;">http://yourwebsite.com</span>
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Facebook</label>
  <div class="col-md-6">
  <input id="textinput" name="facebook" placeholder="https://www.facebook.com/[user]" class="form-control input-md" type="text" style="font-size:10px;" value="<?php
  if(isset($_GET['facebook'])){
    echo $_GET['facebook'];
  }else{
    if(isset($_SESSION['facebook_user'])){
      echo $_SESSION['facebook_user'];
    }else{
      if(isset($_SESSION['facebook'])) echo $_SESSION['facebook'];
    }
  }
  ?>">
  <span class="help-block" style="font-size:10px;">Just write your personal info in [user]</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="twitter">Twitter</label>
  <div class="col-md-6">
  <input id="twitter" name="twitter" placeholder="https://twitter.com/[user]" class="form-control input-md" type="text" style="font-size:10px;" value="<?php
  if(isset($_GET['twitter'])){
    echo $_GET['twitter'];
  }else{
    if(isset($_SESSION['twitter_user'])){
      echo $_SESSION['twitter_user'];
    }else{
      //we assume same like facebook
       if(isset($_SESSION['facebook'])) echo $_SESSION['facebook'];
    }
  }
  ?>">
  <span class="help-block" style="font-size:10px;">Just write your personal info in [user]</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="google">Google+</label>
  <div class="col-md-6">
  <input id="google" name="google" placeholder="https://plus.google.com/u/0/+[user]" class="form-control input-md" type="text" style="font-size:10px;" value="<?php
  if(isset($_GET['google'])){
    echo $_GET['google'];
  }else{
    if(isset($_SESSION['google_user'])){
      echo $_SESSION['google_user'];
    }else{
      if(isset($_SESSION['google'])) echo $_SESSION['google'];
    }
  }
  ?>">
  <span class="help-block" style="font-size:10px;">Just write your personal info in [user]</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="linkedin">LinkedIn</label>
  <div class="col-md-6">
  <input id="linkedin" name="linkedin" placeholder="https://www.linkedin.com/in/[user]" class="form-control input-md" type="text" style="font-size:10px;" value="<?php
  if(isset($_GET['linkedin'])){
    echo $_GET['linkedin'];
  }else{
    if(isset($_SESSION['linkedin_user'])){
      echo $_SESSION['linkedin_user'];
    }else{
      if(isset($_SESSION['linkedin'])) echo $_SESSION['linkedin'];
    }
  }
  ?>">
  <span class="help-block" style="font-size:10px;">Just write your personal info in [user]</span>
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="sex">Sex</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="sex-0">
      <input name="sex" id="sex-0" value="0" checked="checked" type="radio">
      Male
    </label>
	</div>
  <div class="radio">
    <label for="sex-1">
      <input name="sex" id="sex-1" value="1" type="radio">
      Female
    </label>
	</div>
  </div>
</div>
<!-- File Button -->
<div class="form-group">
    <div class="col-lg-6 col-sm-6 col-12">
      <label class="col-md-4 control-label" for="avatar">Your &nbsp;Avatar</label>
      <div class="input-group">
        <label class="input-group-btn">
          <span class="btn btn-primary" style="font-size:14px;">
            Browse&hellip; <input type="file" style="display: none;" name="avatar">
          </span>
        </label>
        <input type="text" class="form-control" readonly name="avatar-b" style="font-size:10px;">
        </div>
        <span class="help-block" style="font-size:10px;">
            <ul style="align:right">
              <li>Just ".jpg" files / Max: 80x80 pixels.</li>
              <li>If you do not select an Image, the system will assign you an avatar.</li>
            </ul>
        </span>
      </div>
</div>
<div class="clear"></div><br />
<!-- Button -->
<div class="form-group">
  <label class="col-md-5 control-label" for="singlebutton"></label>
  <div class="col-md-5">
    <input type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary" value="Register" />&nbsp; &nbsp; &nbsp;
    <input type="reset" id="singlebutton" name="clean" class="btn btn-primary" value="&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Reset&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" />
  </div>
</div>
</fieldset>

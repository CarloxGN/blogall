<form class="form-horizontal" action="<?php
$uri = new controllerLogin();
echo $uri->esc_url($_SERVER['PHP_SELF']);?>?pg=account" enctype="multipart/form-data" method="post">
<fieldset>

<!-- Form Name -->
<legend style="font-size: 20px;">Account Info</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name</label>
  <div class="col-md-5">
  <input id="textinput" name="name" placeholder="your name..." class="form-control input-md" required="" type="text" style="font-size:10px;" value="<?php echo $_SESSION['username'];?>">
  <span class="help-block" style="font-size:10px;">Name and lastname</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>
  <div class="col-md-5">
  <input id="email" name="email" placeholder="your email..." class="form-control input-md" required="" type="email" style="font-size:10px;" value="<?php echo $_SESSION['email_user'];?>">
  <span class="help-block" style="font-size:10px;">User account</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Confirm email</label>
  <div class="col-md-5">
  <input id="textinput" name="confirmemail" placeholder="your email here again" class="form-control input-md" required="required" type="email" style="font-size:10px;" value="<?php echo $_SESSION['email_user'];?>">
  <span class="help-block" style="font-size:10px;">Rewrite your email to confirm</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-5">
  <input id="password" name="pass" placeholder="your password..." class="form-control input-md"  type="password" style="font-size:10px;" value="">
  <span class="help-block" style="font-size:10px;">More than 6 letters or numbers</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="confirm_password">Confirm password</label>
  <div class="col-md-5">
  <input id="password" name="confirmpwd" placeholder="Confirm your password" class="form-control input-md" type="password" style="font-size:10px;">
  <span class="help-block" style="font-size:10px;">Rewrite your password to confirm</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="web">Your Website</label>
  <div class="col-md-6">
  <input id="web" name="web" placeholder="your website... [user]" class="form-control input-md" type="text" style="font-size:10px;" value="<?php echo $_SESSION['web_user'];?>">
  <span class="help-block" style="font-size:10px;">All your website path</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Facebook</label>
  <div class="col-md-6">
  <input id="textinput" name="facebook" placeholder="https://www.facebook.com/[user]" class="form-control input-md" type="text" style="font-size:10px;" value="<?php echo $_SESSION['facebook_user'];?>">
  <span class="help-block" style="font-size:10px;">Just write your personal info in [user]</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="twitter">Twitter</label>
  <div class="col-md-6">
  <input id="twitter" name="twitter" placeholder="https://twitter.com/[user]" class="form-control input-md" type="text" style="font-size:10px;" value="<?php echo $_SESSION['twitter_user'];?>">
  <span class="help-block" style="font-size:10px;">Just write your personal info in [user]</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="google">Google+</label>
  <div class="col-md-6">
  <input id="google" name="google" placeholder="https://plus.google.com/u/0/+[user]" class="form-control input-md" type="text" style="font-size:10px;" value="<?php echo $_SESSION['google_user'];?>">
  <span class="help-block" style="font-size:10px;">Just write your personal info in [user]</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="linkedin">LinkedIn</label>
  <div class="col-md-6">
  <input id="linkedin" name="linkedin" placeholder="https://www.linkedin.com/in/[user]" class="form-control input-md" type="text" style="font-size:10px;" value="<?php echo $_SESSION['linkedin_user'];?>">
  <span class="help-block" style="font-size:10px;">Just write your personal info in [user]</span>
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="sex">Gender</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="sex-0">
      <input name="sex" id="sex-0" value="0"  type="radio"
       <?php
        if ($_SESSION['sex_user']==0) echo'checked="checked"';
       ?>> Male
    </label>
	</div>
  <div class="radio">
    <label for="sex-1">
      <input name="sex" id="sex-1" value="1" type="radio"
      <?php
      if ($_SESSION['sex_user']==1) echo'checked="checked"';
       ?>>  Female
    </label>
	</div>
  </div>
</div>

<!-- File Button -->

<div class="form-group">
<div class="container" style="margin-top: 20px;" align="center">
  <div class="row">
    <div class="col-lg-6 col-sm-6 col-12">
      <label class="col-md-4 control-label" for="avatar">Your &nbsp;Avatar</label>
      <div class="input-group">
        <label class="input-group-btn">
          <span class="btn btn-primary" style="font-size:14px;">
            Browse&hellip; <input type="file" style="display: none;" name="avatar">
          </span>
        </label>
        <input type="text" class="form-control" name="avatar-b" style="font-size:10px;" readonly>
        </div>
        <span class="help-block" style="font-size:10px;">
          (Just files ".jpg/gif/png or bmp" / Max: 80x80 pixels)<p align="right"> &nbsp;&nbsp;&nbsp;&nbsp; Current image:
              <img src="<?php echo WEBSITEPATH;?>images/avatars/<?php
              if (isset($_SESSION['avatar_user'])):
                echo $_SESSION['avatar_user'];
              else:
                if ($_SESSION['sex_user']==0):
                  echo 'male.png';
                else:
                  echo 'female.png';
                endif;
              endif;
                ?>" alt=""></p>
        </span>
      </div>
    </div>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary" type="submit">Update</button>
    &nbsp; &nbsp; &nbsp;
    <input type="reset" id="singlebutton" name="clean" class="btn btn-primary" value=" &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Reset&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; " />
  </div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div class="form-group">
  <div class="col-md-4">
    <?php
    if($_SESSION['id_level']!=0){
      ?>
      <a id="singlebutton" href="?pg=unsuscribe" name="unsuscribe" class="btn btn-primary" onclick="return confirm('ATTENTION: This action will delete YOUR ACCOUNT from our Database. Do you wish continue?');">Unsuscribe</a>
      <?php
    }
    ?>
  </div>
</div>
</fieldset>



</form>

<fieldset>
<!-- Form Name -->
<legend style="font-size: 20px;">User`s Info</legend>
<div class="clear"></div><br /><div class="clear"></div><br />
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Photo</label>
  <div class="col-md-6">
  <img src="images/avatars/<?=$row['avatar_user'];?>" class="img-rounded" alt="Avatar">
  </div>
</div>
<div class="clear"></div><br />
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name</label>
  <div class="col-md-6">
  <input id="textinput" name="name" placeholder="your name..." class="form-control input-md" required="" type="text" style="font-size:10px;" value="<?php echo $row['name_user'];?>" disabled>
  </div>
</div>
<div class="clear"></div><br />
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>
  <div class="col-md-6">
  <input id="email" name="email" placeholder="your email..." class="form-control input-md" required="" type="email" style="font-size:10px;" value="<?php echo $row['email_user'];?>" disabled>
  </div>
</div>
<div class="clear"></div><br />
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="web">Your Website</label>
  <div class="col-md-6">
  <input id="web" name="web" placeholder="your website... [user]" class="form-control input-md" type="text" style="font-size:10px;" value="<?php echo $row['web_user'];?>" disabled>
  </div>
</div>
<div class="clear"></div><br />
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Facebook</label>
  <div class="col-md-6">
  <input id="textinput" name="facebook" placeholder="https://www.facebook.com/[user]" class="form-control input-md" type="text" style="font-size:10px;" value="<?php echo $row['facebook_user'];?>" disabled>
  </div>
</div>
<div class="clear"></div><br />
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="twitter">Twitter</label>
  <div class="col-md-6">
  <input id="twitter" name="twitter" placeholder="https://twitter.com/[user]" class="form-control input-md" type="text" style="font-size:10px;" value="<?php echo $row['twitter_user'];?>" disabled>
  </div>
</div>
<div class="clear"></div><br />
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="google">Google+</label>
  <div class="col-md-6">
  <input id="google" name="google" placeholder="https://plus.google.com/u/0/+[user]" class="form-control input-md" type="text" style="font-size:10px;" value="<?php echo $row['google_user'];?>" disabled>
  </div>
</div>
<div class="clear"></div><br />
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="linkedin">LinkedIn</label>
  <div class="col-md-6">
    <input id="linkedin" name="linkedin" placeholder="https://www.linkedin.com/in/[user]" class="form-control input-md" type="text" style="font-size:10px;" value="<?php echo $row['linkedin_user'];?>" disabled>
  </div>
</div>
<div class="clear"></div><br />
<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="sex">Gender</label>
  <div class="col-md-6">
    <input id="sex" name="sex" class="form-control input-md" type="text" style="font-size:10px;" value="<?php
    if ($row['sex_user']==0) {
      echo 'Male';
    }else{
      echo 'Female';
    }?>" disabled>
	</div>
</div>
</fieldset>

<div align="center" style="font-size: 25px; font-style:italic">
    Blog site's Information
</div><p>&nbsp;</p>
<p>
<label for="database_host">Blog site name *<span style="font-size:9px"> (max. 100 characters)</span></label>
 <input class="form-control" type="text" name="name" value="<?php if(isset($name)) echo $name; if(isset($_SESSION['name_site'])) echo $_SESSION['name_site'];?>" maxlength="100" required="required">
</p>
<p>
 <label for="database_slogan">Slogan *<span style="font-size:9px"> (max. 150 characters)</span></label>
 <input class="form-control" type="text" name="slogan" maxlength="150" value="<?php if(isset($slogan)) echo $slogan; if(isset($_SESSION['slogan_site'])) echo $_SESSION['slogan_site'];?>" required="required">
</p>
<p>
 <label for="form-control">Welcome Message *<span style="font-size:9px"> (max. 500 characters)</span></label>
<textarea class="form-control" name="welcome" required="required" rows="6" class="notinymce" style=" width: calc(100%);" maxlength="500" placeholder="This is a Welcome Message, please try to be specific about the main idea of your blog"><?php if(isset($welcome)) echo $welcome; if(isset($_SESSION['welcome_site'])) echo $_SESSION['welcome_site'];?></textarea>
</p>
<p>
 <label for="form-control">Maintext Message *<span style="font-size:9px"> (max. 330 characters)</span></label>
  <textarea type="text" name="maintext" required="required" rows="6" class="notinymce" style=" width: calc(100%);" maxlength="330" placeholder="This is a lead text above Published Article`s area, it is used to complement the Welcome Message "><?php if(isset($maintext)) echo $maintext; if(isset($_SESSION['maintext_site'])) echo $_SESSION['maintext_site'];?></textarea>
</p>
<p>
  <label for="database_email">Site`s Email contact *</label>
  <input class="form-control" type="email" name="email" maxlength="50" placeholder="i.e.: contact@myblog.com" value="<?php if(isset($email)) echo $email; if(isset($_SESSION['contact_site'])) echo $_SESSION['contact_site'];?>" required="required">
</p>
<p>
 <label for="database_facebook">Site`s Facebook contact<span style="font-size:9px"> (Only if your site is going to have a facebook account || Write only [info] part)</span></label>
 <input class="form-control" type="text" name="facebook" maxlength="50"  placeholder="https://www.facebook.com/[info]" value="<?php if(isset($facebook)) echo $facebook; if(isset($_SESSION['facebook_site'])) echo $_SESSION['facebook_site'];?>">
</p>
<p>
 <label for="database_google">GooglePlus site`s contact<span style="font-size:9px"> (Only if your site is going to have a GooglePlus account || Write only [info] field)</span></label>
 <input class="form-control" name="google" type="text" maxlength="50"  placeholder="https://plus.google.com/u/0/+[info]" value="<?php if(isset($google)) echo $google;if(isset($_SESSION['google_site'])) echo $_SESSION['google_site'];?>">
</p>
<p>
<label for="database_site_contact">Linkedin site`s contact <span style="font-size:9px"> (Only if your site is going to have a Linkedin account || Write only [info] field)</span></label>
<input class="form-control" name="linkedin" placeholder="https://www.linkedin.com/in/[info]" type="text" size="50" maxlength="50" value="<?php if(isset($linkedin)) echo $linkedin; if(isset($_SESSION['linkedin_site'])) echo $_SESSION['linkedin_site'];?>">
</p>
<p>
 <label for="database_youtube">Youtube site`s contact<span style="font-size:9px"> (Only if your site is going to have a Youtube account || Write only [info] field)</span></label>
 <input class="form-control" name="youtube" placeholder="https://www.youtube.com/user/[info]" type="text" size="50" maxlength="50" value="<?php if(isset($youtube)) echo $youtube; if(isset($_SESSION['youtube_site'])) echo $_SESSION['youtube_site'];?>">
</p>
<p>
  <label for="database_about">A message about your site<span style="font-size:9px"> (a word or a short sentence to describe your site)</span></label>
  <input class="form-control" name="about" placeholder="i.e.: A Technology blog site!!!" type="text" maxlength="40" value="<?php if(isset($about)) echo $about; if(isset($_SESSION['about_site'])) echo $_SESSION['about_site'];?>" required="required">
 </p>
 <p>
   <label for="database_keywords">Keyword of the site<span style="font-size:9px"> (Ideas and topics that define what your content is about, this will help to ranking on search engines to drive organic traffic to your blogsite)</span></label>
   <input class="form-control" name="keywords" placeholder="i.e.: technology, investigation, engineering,... [separate words with comma]" type="text" maxlength="200" value="<?php if(isset($keywords)) echo $keywords; if(isset($_SESSION['keywords_site'])) echo $_SESSION['keywords_site'];?>" required="required">
  </p>
  <p>
    <label for="database_logo">Blog site logo<span style="font-size:9px"> (Your own Blogsite`s logo. Max. size: height: 250px | width: 150px | Max. 256KB</span></label>
    <div class="input-group">
      <label class="input-group-btn">
        <span class="btn btn-primary" style="font-size:14px;">
          Browse&hellip; <input type="file" style="display: none;" name="logo">
        </span>
      </label>
      <input type="text" class="form-control" readonly name="logo-b" style="font-size:10px;" >
    </div>
    <span class="help-block" style="font-size:10px;">
        <ul style="align:right">
          <li>- Only ".png" files</li>
          <li>- If you do not select an Image, the system will keep BlogAll`s logo</li>
        </ul>
    </span>
   </p>
   <p>
     <label for="database_favicon">Favicon image<span style="font-size:9px"> (Your own Blogsite`s favicon image. Max. size: height: 15px | width: 15px | Max. 20KB</span></label>
     <div class="input-group">
       <label class="input-group-btn">
         <span class="btn btn-primary" style="font-size:14px;">
           Browse&hellip; <input type="file" style="display: none;" name="fav-icon">
         </span>
       </label>
       <input type="text" class="form-control" readonly name="favico-b" style="font-size:10px;">
     </div>
     <span class="help-block" style="font-size:10px;">
         <ul style="align:right">
           <li>Only ".png" files</li>
           <li>If you do not select an Image, the system will keep BlogAll`s favicon</li>
         </ul>
     </span>
    </p>
<div class="clearfix"></div><br>

<hr class="hr-blog">
<form action="?pg=addreply.process" method="post" name="post_reply" class="form-group-comment" id="formuploadajax<?php echo strtotime($com['register_comment']);?>">
    <label>Title <span style="font-size: 9px;font-face: italic;">* Min. 5 characters & Max. 150 characters</span>
    </label>
    <input type="text" name="title" id="title_reply<?php echo strtotime($com['register_comment']);?>" class="form-control" id="inputdefault" min="10" maxlength="150" placeholder="Write here your comment`s title">
    <div class="clear"></div><br>
    <label>Your Comment <span style="font-size: 9px;font-face: italic;">* min. 10 characters & max. 1500 characters</span></label>
    <div class="clear"> </div>
    <textarea name="body" rows="2" id="body_reply<?php echo strtotime($com['register_comment']);?>" class="notinymce" required="required" style="width: calc(100%);" maxlength="1500"> </textarea>
    <div id="msg<?php echo strtotime($com['register_comment']);?>"></div>
    <div class="clear"> </div><br>
    <input type="submit" id="send-btn<?php echo strtotime($com['register_comment']);?>" value="Submit" class="btn btn-primary">
    &nbsp;
    <input type="reset" id="reset-btn" value="Cancel" class="btn btn-danger">
    <input type="hidden" name="id_blog" id="id_reply<?php echo strtotime($com['register_comment']);?>" value="<?php echo $_SESSION['active_comment'];?>" >
    <input type="hidden" name="tag" id="tag<?php echo strtotime($com['register_comment']);?>" value="<?php echo strtotime($com['register_comment']);?>" >
</form>

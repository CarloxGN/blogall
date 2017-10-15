<div class="grid1_of_2" id="<?php echo strtotime($com['register_comment']);?>">
    <div class="grid_img">
      <a href="?pg=userpage&id=<?php echo $com['id_user'];?>" target="_blank">
        <img src="<?php echo WEBSITEPATH;?>images/avatars/<?php echo $com['avatar_user'];?>" alt="" width="80" class="round-avatar">
      </a>
    </div>
    <div class="grid_text" >
      <h5 class="style1 list">
        <a href="?pg=userpage&id=<?php echo $com['id_user'];?>" target="_blank">
          <?php echo $com['name_user'];?>
        </a>
      </h5>
      <div class="style1 list" style="font-size:11px">
      Level: <a href="?pg=userpage&id=<?php echo $com['id_user'];?>" target="_blank">
        <?php echo $com['name_level'];?>
      </a> ||
      <span class="style1 list" style="font-size:9px">Member since:
      <a href="?pg=userpage&id=<?php echo $com['id_user'];?>" target="_blank">
        <?php echo date("l jS \of F Y h:i:s A", strtotime($com['register_user']));?>
      </a>
      </span></div>
      <hr>
      <div class="style" align="right" style="font-size:9px;align: right;">Comment Registered on: <?php echo date("l jS \of F Y h:i:s A", strtotime($com['register_comment']));?></div>
      <h5 class="style1 list"><u><?php echo $com['title_comment'];?></u></h5>
      <div class="clear"></div><br>
      <span class="top" style="font-size:14px"><?php echo $com['body_comment'];?></span>
      <div class="clear"></div><br>
      <span id="register<?php echo strtotime($com['register_comment']);?>" style="cursor: pointer;"><img src="<?php echo WEBSITEPATH; ?>images/reply.png"><u>Click to Reply</u></span>
      <div class="clear"></div><br>
      <div id="formregister<?php echo strtotime($com['register_comment']);?>" style="display:none">
        <?php include 'includes/formreply.php';?>
      </div>
        <script type="text/javascript">
        $(document).ready(function(){
          var divdisplay = false;
           $("#register<?php echo strtotime($com['register_comment']);?>").click(function(e){
              if (divdisplay == false){
                 $("#formregister<?php echo strtotime($com['register_comment']);?>").css("display", "block");
                 divdisplay = true;
              }else{
                 $("#formregister<?php echo strtotime($com['register_comment']);?>").css("display", "none");
                 divdisplay = false;
              }
           });

           $("#formuploadajax<?php echo strtotime($com['register_comment']);?>").on("submit", function(e){
             e.preventDefault();
             var f = $(this);
             var formData = new FormData(document.getElementById("formuploadajax<?php echo strtotime($com['register_comment']);?>"));
             formData.append("data", "value");
             //formData.append(f.attr("name"), $(this)[0].files[0]);
             $.ajax({
               url: "index.php?pg=addreply.process",
               type: "post",
               dataType: "html",
               data: formData,
               cache: false,
               contentType: false,
               processData: false,
               success : function(data) {
                  $('.listreplies<?php echo  strtotime($com['register_comment']);?>').fadeIn(1000).html(data);
               }
             })
           });
         });
        </script>
        <div class="listreplies<?php echo strtotime($com['register_comment']);?>">
          <?php
          // end post`s comment
          include 'includes/grid_text_reply.php';
          ?>
        </div>

    </div>
    <div class="clear"></div>
    <div id="reply">
  </div>
</div>

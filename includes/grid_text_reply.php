<?php
$reply = new controllerComments();
$single_reply = $reply->listComments($_SESSION['active_comment'], 1, $_SESSION['active_blog']);
if($single_reply == true){
  foreach($single_reply as $rep){
    ?>
    <div class="grid1_of_2 left" id="<?php echo strtotime($rep['register_comment']);?>">
      <div class="grid_img">
        <a href="?pg=userpage&id=<?php echo $rep['id_user'];?>" target="_blank"><img src="images/avatars/<?php echo $rep['avatar_user'];?>" alt="" class="round-avatar"></a>
      </div>
      <div class="grid_text">
        <h5 class="style1 list"><a href="?pg=userpage&id=<?php echo $rep['id_user'];?>" target="_blank"><?php echo $rep['name_user'];?></a>
        </h5>
        <div class="style1 list"  style="font-size:11px">
          Level: <a href="?pg=userpage&id=<?php echo $rep['id_user'];?>" target="_blank"><?php echo $rep['name_level'];?></a>
        || Member since: <a href="?pg=userpage&id=<?php echo $rep['id_user'];?>" target="_blank"><?php echo date("l jS \of F Y h:i:s A", strtotime($rep['register_user']));?></a></div>
        <hr>
        <div class="style" align="right" style="font-size:9px">Reply registered on: <?php echo date("l jS \of F Y h:i:s A", strtotime($rep['register_comment']));?></div>
        <h5 class="style1 list"><u><?php echo $rep['title_comment'];?></u></h5>
        <br>
        <div class="top" style="font-size:14px"><?php echo $rep['body_comment'];?></div>
        <hr class="hr-blog"><br>
      </div>
    </div>
    <?php
    }
}
// end reply's comments

  <div align="center" style="font-size: 25px; font-style:italic">
      Comments/Replies Information
  </div><p>&nbsp;</p>
   <div class="clearfix"></div>
   <div class="col-md-12 login-right form-signin form-login">
   <table id="blogtable" class="display" cellspacing="0" width="100%" style="font-size:11px">
   <thead>
   <tr>
     <th style="text-align: center">Title</th>
     <th style="text-align: center">Author</th>
     <th style="text-align: center">Date</th>
     <th style="text-align: center">Type</th>
     <th style="text-align: center; width:20%">Status</th>
     <th style="text-align: center; width:3%">Delete</th>
   </tr>
   </thead><tbody>
   <?php
   $comment = new controllerComments();
   $result = $comment->listCommentsAdmin();
   foreach ($result as $row){
     echo '<tr>
            <td style="font-size:11px; cursor: pointer;" onclick="window.location = \''.WEBSITEPATH.'?pg=single&id='.$row['id_blog'].'&title='.$row['title_blog'].'&tag='.strtotime($row['register_comment']).'\'">
              &nbsp;&nbsp;&nbsp;
              <a href="?pg=single&id='.$row['id_blog'].'&title='.$row['title_blog'].'&tag='.strtotime($row['register_comment']).'" title="Comment:  '.$row['title_comment'].'">'.substr($row['title_comment'], 0, 100).'</a>
            </td>
            <td style="font-size:11px; cursor: pointer;" onclick="window.location = \''.WEBSITEPATH.'?pg=single&id='.$row['id_blog'].'&title='.$row['title_blog'].'&tag='.strtotime($row['register_comment']).'\'">
              &nbsp;&nbsp;&nbsp;
              <a href="?pg=user&id='.$row['id_user'].'">'.$row['name_user'].'</a>
            </td>
            <td style="text-align: center;font-size:10px">
            '.date("d-m-Y H:m:s", strtotime($row['register_blog'])).'
            </td>
            <td align="right">';
            if ($row['tbl_ref'] == 0){
              echo 'Comment';
            }
            if ($row['tbl_ref'] == 1){
              echo 'Reply';
            }
            echo '</td>
                <td align="right">
                <form method="post" action="';
                $uri = new controllerLogin();
                echo $uri->esc_url($_SERVER['PHP_SELF']);
                echo '?pg=admin&tab=5">
                <input type="hidden" value="'.$row['id_comment'].'" name="id" />
                <select name="status_comment">';
                if($row['status_comment'] == 1){
                  $st = 'Active (actual)';
                  $nost = 'Suspended';
                  $noval = 0;
                }else{
                  $st = 'Suspended (actual)';
                  $nost = 'Active';
                  $noval = 1;
                }
              echo '<option value="'.$row['status_comment'].'">'.$st.'</option>
              <option value="'.$noval.'">'.$nost.'</option></select>
              <button type="submit" class="no_button" name="update_comment" title="Update Status User"><img src="images/update-ico.png" /></button>
            </form>
            </td>
            <td align="center">
            <form method="post" action="'.WEBSITEPATH.'?pg=admin&tab=5">
            <input type="hidden" name="id_user" value="'.$row['id_user'].'" />
            <input type="hidden" name="id" value="'.$row['id_comment'].'" />
              <button type="submit" class="no_button" name="delete_comment" title="Delete comment: '.$row['title_comment'].'" onclick="return confirm(\'This action will DELETE comment: '.$row['title_comment'].'. Do you proceed?\')">
                <img src="'.WEBSITEPATH.'images/trash.png"/>
              </button>
            </form>
        </td>
      </tr>';
   }

  ?>
  </tbody></table><p>&nbsp;</p><p>&nbsp;</p></div>

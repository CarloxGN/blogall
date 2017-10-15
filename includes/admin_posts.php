<div align="center" style="font-size: 25px; font-style:italic">
      Post's Information
    </div><p>&nbsp;</p>
    <div class="col-md-12 login-right form-signin form-login">
    <table id="blogtable" class="display" cellspacing="0" width="100%" style="font-size:11px">
    <thead>
    <tr>
      <th style="text-align: center">Author</th>
      <th style="text-align: center">Title</th>
      <th style="text-align: center; width:16%">Date</th>
      <th style="text-align: center; width:20%">Status</th>
      <th style="text-align: center; width:3%">Delete</th>
    </tr>
    </thead><tbody>
    <?php
    $blogs = new controllerBlogs();
    $result = $blogs->listBlogsAdmin();
    foreach ($result as $row){
      echo '<tr>
             <td style="font-size:11px; cursor: pointer;" onclick="window.location =\''.WEBSITEPATH.'?pg=user&id='.$row['id_user'].'\'">
                &nbsp;&nbsp;&nbsp;
             <a href="?pg=user&id='.$row['id_user'].'">'.$row['name_user'].'</a>
             </td>
             <td style="font-size:11px; cursor: pointer;" onclick="window.location =\''.WEBSITEPATH.'?pg=single&id='.$row['id_blog'].'&title='.$row['title_blog'].'\'">
               <a href="?pg=single&id='.$row['id_blog'].'&title='.substr($row['title_blog'], 0,60).'..."  title="Post: '.$row['title_blog'].'">'.substr($row['title_blog'], 0, 100).'</a>
             </td>
             <td style="text-align: center;font-size:10px">
             '.date("d-m-Y H:m:s", strtotime($row['register_blog'])).'
             </td>
             <td align="right">
               <form method="post" action="'.WEBSITEPATH.'?pg=admin&tab=4">
               <input type="hidden" name="id" value="'.$row['id_blog'].'" />
               <select class="" name="status_blog">';
               if($row['status_blog'] == 1){
                 $st = 'Active (actual)';
                 $nost = 'Suspended';
                 $noval = 0;
               }else{
                 $st = 'Suspended (actual)';
                 $nost = 'Active';
                 $noval = 1;
               }
               echo '<option value="'.$row['status_blog'].'">'.$st.'</option>
               <option value="'.$noval.'">'.$nost.'</option>
              </select>
                <button type="submit" class="no_button" name="update_blog" title="Update status. Blog: '.$row['title_blog'].'"><img src="images/update-ico.png" /></button>
            </form>
          </td>
          <td align="center">
            <form method="post" action="'.WEBSITEPATH.'?pg=admin&tab=4">
              <input type="hidden" name="id" value="'.$row['id_blog'].'" />
              <button type="submit" class="no_button" name="delete_blog" title="Delete blog: '.$row['title_blog'].'" onclick="return confirm(\'This action will DELETE this blog. Do you proceed?\')">
              <img src="'.WEBSITEPATH.'images/trash.png"/>
              </button>
            </form>
          </td>
        </tr>';
    }
   ?>
   </tbody></table><p>&nbsp;</p><p>&nbsp;</p></div>

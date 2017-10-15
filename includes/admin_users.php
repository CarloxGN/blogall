  <div align="center" style="font-size: 25px; font-style:italic">
      Member`s Information
    </div><p>&nbsp;</p>
     <div class="clearfix"></div>
  <div class="col-md-12 login-right form-signin form-login">
  <table id="blogtable" class="display" cellspacing="0" width="100%" style="font-size:11px">
  <thead>
  <tr>
    <th style="text-align: center">Member</th>
    <th style="text-align: center; width:18%">Level</th>
    <th style="text-align: center">Member since</th>
    <th style="text-align: center; width:22%">Status</th>
    <th style="text-align: center; width:5%">Delete</th>
  </tr>
  </thead><tbody>
  <?php
  $users = new controllerUsers();
  $result = $users->listUsers();
   foreach ($result as $row){
    echo '<tr>
           <td style="font-size:11px; cursor: pointer;" onclick="window.location =\''.WEBSITEPATH.'?pg=user&id='.$row['id_user'].'\'">
              &nbsp;&nbsp;&nbsp;
           <a href="?pg=user&id='.$row['id_user'].'">'.$row['name_user'].'</a>
           </td>
           <td style="text-align:right;font-size:10px">
           <form method="post" action="'.WEBSITEPATH.'?pg=admin&tab=3">
           <input type="hidden" name="id" value="'.$row['id_user'].'" />
           <select id="level" name="level_user">
              <option value='.$row['id_level'].'">'.$row['name_level'].'  (actual)</option>';
              if($row['id_level'] == 1){
                echo '<option value="2">Member</option>';
              }else{
                echo '<option value="1">Admin</option>';
              }
     echo '</select>
     <button type="submit" class="no_button" name="update_level_user" title="Update Level User"><img src="images/update-ico.png" /></button>
     </form>
           </td>
           <td style="text-align: center;font-size:10px">
           '.date("d-m-Y H:m:s", strtotime($row['register_user'])).'
           </td>
           <td style="text-align:right;font-size:10px">
        <form method="post" action="'.WEBSITEPATH.'?pg=admin&tab=3">
        <input type="hidden" name="id" value="'.$row['id_user'].'" />
          <select id="status_user" name="status_user">';
           if($row['status_user'] == 1){
             $st = 'Active (actual)';
             $nost = 'Suspended';
             $noval = 0;
           }else{
             $st = 'Suspended (actual)';
             $nost = 'Active';
             $noval = 1;
           }
           echo '<option value="'.$row['status_user'].'">'.$st.'</option>
           <option value="'.$noval. '">'.$nost. '</option>
          </select>
          <button type="submit" class="no_button" name="update_user" title="Update Status User"><img src="images/update-ico.png" /></button>
        </form>
        </td>
        <td align="center">
        <form method="post"  action="'.WEBSITEPATH.'?pg=admin&tab=3">
        <input type="hidden" name="id" value="'.$row['id_user'].'" />
          <button type="submit" class="no_button" name="delete_user" title="Delete user: '.$row['name_user'].'" onclick="return confirm(\'This action will DELETE user: '.$row['name_user'].'. Do you proceed?\')">
            <img src="'.WEBSITEPATH.'images/trash.png"/>
          </button>
        </form>
      </td>
    </tr>';
  }
  ?>
  </tbody>
</table>
<p>&nbsp;</p><p>&nbsp;</p></div>

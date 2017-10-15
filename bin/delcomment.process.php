<?php
if(isset($_SESSION['user_id']) && isset($_POST['delete_button'])):
    if (isset($_POST['id']) && !filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING)):
        header ('Location: ?pg=commentsadmin&er=28');
        die();
    else:
        $id_comment = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $blogger = new controllerComments();
        $result = $blogger->deleteComment($id_comment, $_SESSION['user_id']);
        echo 'resultado = '.$result;
        if($result == true):
          header ('Location: ?pg=commentsadmin&suc=7');
        else:
          header ('Location: ?pg=commentsadmin&er=28');
        endif;
    endif;
endif;

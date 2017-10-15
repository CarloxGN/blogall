<?php
if(isset($_SESSION['user_id']) && isset($_POST['delete_button'])):
    if (isset($_POST['id']) && !filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING)):
        header ('Location: ?pg=commentsadmin&er=28');
        die();
    else:
        $id_blog = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $blogger = new controllerBlogs();
        $result = $blogger->deleteBlog($id_blog, $_SESSION['user_id']);
        if($result == true):
          header ('Location: ?pg=blogsadmin&suc=5');
        else:
          header ('Location: ?pg=blogsadmin&er=14');
        endif;
    endif;
endif;

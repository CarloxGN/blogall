<?php
$blogger = new controllerBlogs;
$data = $blogger->addLike();
foreach ($data as $row) {
  echo $row['likes_blog'];
}

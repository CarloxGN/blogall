<?php
$blogger = new controllerBlogs;
$data = $blogger->addView();
foreach ($data as $row) {
  echo $row['likes_blog'];
}

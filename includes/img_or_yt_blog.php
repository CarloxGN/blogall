<?php
  switch ($row['kind_media_blog']):
    case 'image':
      echo '
      <img class="img-responsive img-thumbnail" src="'.WEBSITEPATH.'images/blogmedia/'.$row['media_blog'].'" width="282" alt="'.$row['title_blog'].'" title="'.$row['title_blog'].'" />';
      break;

    case 'video':
      echo '<div class="video-container-1">
        <iframe width="278" src="//www.youtube.com/embed/'.$row['media_blog'].'" frameborder="0" allowfullscreen></iframe>
      </div>';
    break;
  endswitch;

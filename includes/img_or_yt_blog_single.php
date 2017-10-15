<?php
  switch ($row['kind_media_blog']):
    case 'image':
      echo '
      <img class="img-responsive img-thumbnail" src="'.WEBSITEPATH.'images/blogmedia/'.$row['media_blog'].'" alt="'.$row['title_blog'].'" title="'.$row['title_blog'].'" />';
      break;

    case 'video':
      echo '<div class="video-container-1">
        <iframe width="720" height="405" src="//www.youtube.com/embed/'.$row['media_blog'].'" frameborder="0" allowfullscreen></iframe>
      </div>';
    break;
  endswitch;

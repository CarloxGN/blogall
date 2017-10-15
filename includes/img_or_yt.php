<?php
  switch ($row['kind_media_blog']):
    case 'image':
      echo '<a href="?pg=single&id='.$row['id_blog'].'"><div id="A3-'.$action->position($long).'-image-'.$wrapper_count.'"><img src="'.WEBSITEPATH.'images/blogmedia/'.$row['media_blog'].'" alt="'.$row['title_blog'].'" title="'.$row['title_blog'].'" class="grow"/></div></a>';
    break;

    case 'video':
      echo '<div class="video-container-'.$wrapper_count.'"><iframe width="560" height="315" src="https://www.youtube.com/embed/'.$row['media_blog'].'" frameborder="0" allowfullscreen></iframe></div>';
    break;
  endswitch;

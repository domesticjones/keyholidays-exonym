<?php
  $heading = get_sub_field('heading');
  $subhead = get_sub_field('subhead');
  $content = get_sub_field('content');
  if(!empty($heading)) { echo '<h2 class="text-heading">' . $heading . '</h2>'; }
  if(!empty($subhead)) { echo '<h3 class="text-subhead">' . $subhead . '</h3>'; }
  if(!empty($content)) { echo '<div class="text-content">' . $content . '</div>'; }
?>

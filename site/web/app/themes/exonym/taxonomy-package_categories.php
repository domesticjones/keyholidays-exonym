<?php
  $termID = get_queried_object()->term_id;
  $term = get_term($termID, 'package_categories');
  $home = get_home_url();
  header('Location: ' . $home . '?s=&package_categories=' . $term->slug);
  die();
?>

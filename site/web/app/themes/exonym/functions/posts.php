<?php
/*
============================================
  [[[ Post Support & Pagination Settings ]]]
============================================
*/

function ex_terms_header($taxonomies = 'category') {
  $terms = get_the_terms(get_the_ID(), $taxonomies);
  $return = '<h1 class="page-header">';
  $return .= '<span class="cat-parent">';
  $return .= $terms[0]->name;
  $return .= '</span>';
  $return .= '<span class="cat-child">';
  $return .= $terms[1]->name;
  $return .= '</span>';
  $return .= '</h1>';
  return $return;
}

// Remove P tags from around images
function filter_ptags_on_images($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

// Change sort order of hotels
function my_change_sort_order($query){
  if(is_post_type_archive('hotel')):
    $query->set('order', 'ASC');
    $query->set('orderby', 'title');
    $query->set('posts_per_page', -1);
  endif;
};
add_action('pre_get_posts', 'my_change_sort_order');

// Page Layout Function
function ex_pagelayout($field = 'page_layout') {
  if(have_rows($field)):
    echo '<div class="page-layout">';
    while(have_rows($field)): the_row();
      echo '<section class="layout-module layout-' . get_row_layout() . '">';
      if(get_row_layout() == 'call_to_action'):
      	get_template_part('views/module', 'cta');
      elseif(get_row_layout() == 'contact_information'):
      	get_template_part('views/module', 'contact');
      elseif(get_row_layout() == 'text'):
      	get_template_part('views/module', 'text');
      elseif(get_row_layout() == 'videos'):
      	get_template_part('views/module', 'videos');
      endif;
      echo '</section>';
    endwhile;
    echo '</div>';
  else:
    echo '<p>Coming Soon</p>';
  endif;
}

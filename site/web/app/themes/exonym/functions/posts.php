<?php
/*
============================================
  [[[ Post Support & Pagination Settings ]]]
============================================
*/

function ex_terms_header($taxonomies = 'category') {
  $args = array(
    'orderby'           => 'name',
    'order'             => 'ASC',
    'hide_empty'        => false,
    'fields'            => 'all',
    'parent'            => 0,
    'hierarchical'      => true,
    'child_of'          => 0,
    'pad_counts'        => false,
    'cache_domain'      => 'core'
  );
  $terms = get_terms($taxonomies, $args);
  $return = '';
  $return .= '<h1 class="page-header">';
    foreach ( $terms as $term ) {
      // Terms Found
      $return .= sprintf(
        '<span id="category-%1$s" class="cat-parent">%2$s</span>',
        $term->term_id,
        $term->name,
        $term->description
      );

      $subterms = get_terms($taxonomies, array(
        'parent'   => $term->term_id,
        'hide_empty' => false
      ));
      foreach ( $subterms as $subterm ) {
        // Terms not Found
        $return .= sprintf(
          '<span id="category-%1$s" class="cat-child">%2$s</span>',
          $subterm->term_id,
          $subterm->name,
          $subterm->description
        );
      }
    }
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
    $query->set( 'order', 'ASC' );
    $query->set( 'orderby', 'title' );
    $query->set( 'posts_per_page', -1 );
  endif;
};
add_action('pre_get_posts', 'my_change_sort_order');

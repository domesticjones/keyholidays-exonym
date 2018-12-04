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

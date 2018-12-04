<?php
/*
===========================
  [[[ Custom Post Types ]]]
===========================
*/

// Clear Rewrite Rules for CPT's
function ex_theme_terlet() {
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'ex_theme_terlet');

add_action( 'init', 'register_cpt_package' );
function register_cpt_package() {
  $labels = array(
    'name' => _x( 'Packages', 'package' ),
    'singular_name' => _x( 'Package', 'package' ),
    'add_new' => _x( 'Add New', 'package' ),
    'add_new_item' => _x( 'Add New Package', 'package' ),
    'edit_item' => _x( 'Edit Package', 'package' ),
    'new_item' => _x( 'New Package', 'package' ),
    'view_item' => _x( 'View Package', 'package' ),
    'search_items' => _x( 'Search Packages', 'package' ),
    'not_found' => _x( 'No packages found', 'package' ),
    'not_found_in_trash' => _x( 'No packages found in Trash', 'package' ),
    'parent_item_colon' => _x( 'Parent Package:', 'package' ),
    'menu_name' => _x( 'Packages', 'package' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,
    'supports' => array( 'title', 'thumbnail' ),
    'taxonomies' => array( 'package_categories' ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-tickets-alt',
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
  );
  register_post_type( 'package', $args );
}

add_action( 'init', 'register_taxonomy_package_categories' );
function register_taxonomy_package_categories() {
  $labels = array(
    'name' => _x( 'Package Categories', 'package_categories' ),
    'singular_name' => _x( 'Package Category', 'package_categories' ),
    'search_items' => _x( 'Search Package Categories', 'package_categories' ),
    'popular_items' => _x( 'Popular Package Categories', 'package_categories' ),
    'all_items' => _x( 'All Package Categories', 'package_categories' ),
    'parent_item' => _x( 'Parent Package Category', 'package_categories' ),
    'parent_item_colon' => _x( 'Parent Package Category:', 'package_categories' ),
    'edit_item' => _x( 'Edit Package Category', 'package_categories' ),
    'update_item' => _x( 'Update Package Category', 'package_categories' ),
    'add_new_item' => _x( 'Add New Package Category', 'package_categories' ),
    'new_item_name' => _x( 'New Package Category', 'package_categories' ),
    'separate_items_with_commas' => _x( 'Separate package categories with commas', 'package_categories' ),
    'add_or_remove_items' => _x( 'Add or remove package categories', 'package_categories' ),
    'choose_from_most_used' => _x( 'Choose from the most used package categories', 'package_categories' ),
    'menu_name' => _x( 'Package Categories', 'package_categories' ),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_in_nav_menus' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'show_admin_column' => false,
    'hierarchical' => true,
    'rewrite' => false,
    'query_var' => true
  );

  register_taxonomy( 'package_categories', array('package'), $args );
}

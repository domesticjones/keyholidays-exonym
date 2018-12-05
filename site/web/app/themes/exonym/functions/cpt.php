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

// Register Custom Post Type
function cpt_hotels() {

	$labels = array(
		'name'                  => _x( 'Hotels', 'Post Type General Name', 'hotels' ),
		'singular_name'         => _x( 'Hotel', 'Post Type Singular Name', 'hotels' ),
		'menu_name'             => __( 'Hotels', 'hotels' ),
		'name_admin_bar'        => __( 'Hotel', 'hotels' ),
		'archives'              => __( 'Hotel Archives', 'hotels' ),
		'attributes'            => __( 'Hotel Attributes', 'hotels' ),
		'parent_item_colon'     => __( 'Parent Hotel:', 'hotels' ),
		'all_items'             => __( 'All Hotels', 'hotels' ),
		'add_new_item'          => __( 'Add New Hotel', 'hotels' ),
		'add_new'               => __( 'Add New', 'hotels' ),
		'new_item'              => __( 'New Hotel', 'hotels' ),
		'edit_item'             => __( 'Edit Hotel', 'hotels' ),
		'update_item'           => __( 'Update Hotel', 'hotels' ),
		'view_item'             => __( 'View Hotel', 'hotels' ),
		'view_items'            => __( 'View Hotels', 'hotels' ),
		'search_items'          => __( 'Search Hotel', 'hotels' ),
		'not_found'             => __( 'Not found', 'hotels' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'hotels' ),
		'featured_image'        => __( 'Featured Image', 'hotels' ),
		'set_featured_image'    => __( 'Set featured image', 'hotels' ),
		'remove_featured_image' => __( 'Remove featured image', 'hotels' ),
		'use_featured_image'    => __( 'Use as featured image', 'hotels' ),
		'insert_into_item'      => __( 'Insert into Hotel', 'hotels' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Hotel', 'hotels' ),
		'items_list'            => __( 'Hotels list', 'hotels' ),
		'items_list_navigation' => __( 'Hotels list navigation', 'hotels' ),
		'filter_items_list'     => __( 'Filter Hotels list', 'hotels' ),
	);
	$args = array(
		'label'                 => __( 'Hotel', 'hotels' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-building',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'hotels',
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'hotel', $args );

}
add_action( 'init', 'cpt_hotels', 0 );

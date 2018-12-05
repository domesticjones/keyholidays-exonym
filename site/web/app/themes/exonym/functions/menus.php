<?php
/*
==============================
  [[[ Define all the Menus ]]]
==============================
*/

// Enable menus in WP
add_theme_support('menus');

// Define the nav bars
register_nav_menus(
  array(
    'sidebar-menu' => __('Sidebar', 'exonym'),
    'info-menu' => __('Information', 'exonym'),
    'contact-menu' => __('Contact', 'exonym'),
    'amtrak-package' => __('Amtrak', 'exonym'),
    'touristrailroad-package' => __('Tourist Railroad', 'exonym'),
    'railsail-package' => __('Rail & Sail', 'exonym'),
    'responsive-menu' => __('Responsinve', 'exonym')
  )
);

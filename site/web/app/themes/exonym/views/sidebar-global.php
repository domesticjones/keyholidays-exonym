<aside id="sidebar">
  <?php get_template_part('views/sidebar', 'menu'); ?>
  <nav class="nav-sidebar" role="navigation">
    <?php wp_nav_menu(array(
      'container' => 'ul',                    // enter '' to remove nav container
      'menu' => __('Information', 'exonym'),	    // nav name
      'theme_location' => 'info-menu',		  // where it's located in the theme
    )); ?>
  </nav>
  <nav class="nav-sidebar" role="navigation">
    <?php wp_nav_menu(array(
      'container' => 'ul',                    // enter '' to remove nav container
      'menu' => __('Contact', 'exonym'),	    // nav name
      'theme_location' => 'contact-menu',		  // where it's located in the theme
    )); ?>
  </nav>
</aside>

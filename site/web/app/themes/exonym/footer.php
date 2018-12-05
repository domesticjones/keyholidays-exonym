<?php
  /* ==============
     DEFAULT FOOTER
     ============== */
?>
    <footer class="footer-sub">
      <div class="wrap">
        <p class="copyright">&copy; <?php echo date('Y') . ' '; ex_brand('legal'); ?></p>
        <?php
          ex_social();
          ex_contact('phone', true, 'global');
        ?>
      </div>
    </footer>
    <footer id="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
      <div class="wrap">
        <nav class="nav-footer-large" role="navigation">
          <?php wp_nav_menu(array(
            'container' => 'ul',                    // enter '' to remove nav container
            'menu' => __('Amtrak', 'exonym'),	    // nav name
            'theme_location' => 'amtrak-package',		  // where it's located in the theme
          )); ?>
        </nav>
        <nav class="nav-footer-medium" role="navigation">
          <?php wp_nav_menu(array(
            'container' => 'ul',                    // enter '' to remove nav container
            'menu' => __('Tourist Railroad', 'exonym'),	    // nav name
            'theme_location' => 'touristrailroad-package',		  // where it's located in the theme
          )); ?>
        </nav>
        <nav class="nav-footer-small" role="navigation">
          <?php wp_nav_menu(array(
            'container' => 'ul',                    // enter '' to remove nav container
            'menu' => __('Rail & Sail', 'exonym'),	    // nav name
            'theme_location' => 'railsail-package',		  // where it's located in the theme
          )); ?>
        </nav>
        <nav class="nav-footer-small" role="navigation">
          <?php wp_nav_menu(array(
            'container' => 'ul',                    // enter '' to remove nav container
            'menu' => __('Information', 'exonym'),	    // nav name
            'theme_location' => 'info-menu',		  // where it's located in the theme
          )); ?>
        </nav>
        <nav class="nav-footer-small" role="navigation">
          <?php wp_nav_menu(array(
            'container' => 'ul',                    // enter '' to remove nav container
            'menu' => __('Contact', 'exonym'),	    // nav name
            'theme_location' => 'contact-menu',		  // where it's located in the theme
          )); ?>
        </nav>
      </div>
    </footer>
  </div>
  <?php wp_footer(); ?>
</body>
</html>

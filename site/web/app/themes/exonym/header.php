<?php
  /* ==============
     DEFAULT HEADER
     ============== */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php wp_title(); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<div id="container">
      <header id="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
        <div class="wrap">
          <a href="<?php echo get_home_url(); ?>" class="logo-header">
						<img src="<?php ex_logo(); ?>" alt="Logo for <?php ex_brand(); ?>" />
					</a>
          <nav class="nav-header menu-dropdown" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <?php wp_nav_menu(array(
              'container' => false,								// remove nav container
              'container_class' => '',						// class of container (should you choose to use it)
              'menu' => __('Header', 'exonym'),	  // nav name
              'menu_class' => '',									// adding custom nav class
              'theme_location' => 'header-menu',	// where it's located in the theme
              'before' => '',											// before the menu
              'after' => '',											// after the menu
              'link_before' => '',								// before each link
              'link_after' => '',									// after each link
              'depth' => 0,												// limit the depth of the nav
              'fallback_cb' => ''									// fallback function (if there is one)
            )); ?>
          </nav>
					<a href="#" id="responsive-nav-toggle">
	          <span class="line"></span>
	          <span class="line"></span>
	          <span class="line"></span>
					</a>
        </div>
      </header>
			<?php get_template_part('views/module', 'slider'); ?>
			<header class="header-sub">
				<div class="wrap">
					<?php if(have_rows('header_links', 'options')): while(have_rows('header_links', 'options')): the_row(); $link = get_sub_field('link'); if($link): ?>
						<nav class="header-sub-link">
							<a href="<?php echo $link['url']; ?>" target="_blank"><span><?php echo $link['title']; ?></span></a>
						</nav>
					<?php endif; endwhile; endif; ?>
					<?php ex_contact('phone', true, 'global'); ?>
				</div>
			</header>

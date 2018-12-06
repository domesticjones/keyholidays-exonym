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
          <nav class="nav-header" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-header-home">
							<img src="<?php echo asset_path('images/icon-house.svg'); ?>" alt="Home Page icon" />
						</a>
						<?php
							wp_nav_menu(array(
					      'container' => 'ul',
					      'menu' => __('Amtrak', 'exonym'),
					      'theme_location' => 'amtrak-package',
								'depth' => 1
					    ));
							wp_nav_menu(array(
					      'container' => 'ul',
					      'menu' => __('Tourist Railroad', 'exonym'),
					      'theme_location' => 'touristrailroad-package',
								'depth' => 1
					    ));
							wp_nav_menu(array(
					      'container' => 'ul',
					      'menu' => __('Rail & Sail', 'exonym'),
					      'theme_location' => 'railsail-package',
								'depth' => 1
					    ));
							wp_nav_menu(array(
					      'container' => 'ul',
					      'menu' => __('Information', 'exonym'),
					      'theme_location' => 'info-menu',
								'depth' => 1
					    ));
							wp_nav_menu(array(
					      'container' => 'ul',
					      'menu' => __('Contact', 'exonym'),
					      'theme_location' => 'contact-menu',
								'depth' => 1
					    ));
						?>
          </nav>
					<?php if(have_rows('header_icons', 'options')): ?>
						<nav class="header-icons">
							<?php while(have_rows('header_icons', 'options')): the_row(); ?>
								<?php
									$icon = get_sub_field('icon');
									$link = get_sub_field('link');
									if(!empty($link)) { echo '<a href="' . $link['url'] . '" target="' . $link['target'] . '">'; }
										if(empty($icon)) {
											echo $link['title'];
										} else {
											echo '<img src="' . $icon['sizes']['small'] . '" alt="' . $icon['alt'] . '" />';
										}
									if(!empty($icon)) { echo '</a>'; }
								?>
							<?php endwhile; ?>
						</nav>
					<?php endif; ?>
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
			<header id="nav-responsive">
				<?php
					wp_nav_menu(array(
						'container' => 'ul',
						'menu' => __('Responsive', 'exonym'),
						'theme_location' => 'responsive-menu',
						'depth' => 1
					));
				?>
			</header>

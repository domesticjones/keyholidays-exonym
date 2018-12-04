<?php
  get_header();
  if(have_posts()): while(have_posts()): the_post();
  get_template_part('views/wrap', 'start');
  echo ex_terms_header('package_categories');
  $images = get_field('images');
  $imageCount = count($images);
  $description = get_field('short_description');
  $details = get_field('details');
  $brochure = get_field('brochure');
  $booking = get_field('booking');
?>
<section class="package-content">
  <div class="package-details">
    <?php $image = $images[0]; if($image): ?>
      <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" class="alignright" />
    <?php endif; ?>
    <h2 class="package-title"><?php the_title(); ?></h2>
    <?php if($description) { echo '<p class="package-description">' . $description . '</p>'; } ?>
  </div>
  <?php if($imageCount > 1 && $images): $skip = true; ?>
    <ul class="package-details package-gallery">
      <?php foreach($images as $image): if($skip) { $skip = false; continue; } ?>
        <li>
          <a href="<?php echo $image['sizes']['large']; ?>">
            <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php
    endif;
    if($details):
  ?>
    <div class="package-details">
      <?php echo $details; ?>
    </div>
  <?php
    endif;
    if($brochure || $booking):
  ?>
    <div class="package-details">
      <?php
        if($booking) { echo '<a href="' . $booking['url'] . '" target="' . $booking['target'] . '" class="button-package button-booking">Book Tour Now</a>'; }
        if($brochure) { echo '<a href="' . $brochure['url'] . '" target="_blank" class="button-package button-brochure">View Brochure</a>'; }
      ?>
    </div>
  <?php endif; ?>
</section>
<aside class="package-sidebar">
  <?php get_template_part('views/sidebar', 'menu'); ?>
  <?php if(have_rows('tiers')): while(have_rows('tiers')): the_row(); $name = get_sub_field('name') ?>
    <?php if(have_rows('pricing')): ?>
      <div class="package-sidebar-widget">
        <h3 class="package-sidebar-title"><?php echo $name['title']; ?></h3>
        <?php while(have_rows('pricing')): the_row(); ?>
          <div class="package-pricing package-pricing-size-<?php echo get_sub_field('type')['size']; ?>">
            <p><span class="package-price-title"><?php echo get_sub_field('type')['name']; ?></span><?php the_sub_field('description'); ?></p>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  <?php
    endwhile; endif;
    if(have_rows('packages_sidebar', 'options')): while(have_rows('packages_sidebar', 'options')): the_row();
  ?>
    <div class="package-sidebar-widget">
      <?php
        if(get_sub_field('heading')) { echo '<h3 class="package-sidebar-title">' . get_sub_field('heading') . '</h3>'; }
        if(get_sub_field('content')) { the_sub_field('content'); }
        if(get_sub_field('disclaimer')) { echo '<div class="package-pricing-size-small">' . get_sub_field('disclaimer') . '</div>'; }
      ?>
    </div>
  <?php
    endwhile; endif;
    if($booking) { echo '<a href="' . $booking['url'] . '" target="' . $booking['target'] . '" class="button-package button-booking">Book Tour Now</a>'; }
    if($brochure) { echo '<a href="' . $brochure['url'] . '" target="_blank" class="button-package button-brochure">View Brochure</a>'; }
  ?>
</aside>
<?php
  get_template_part('views/wrap', 'end');
  endwhile; endif;
  get_footer();
?>

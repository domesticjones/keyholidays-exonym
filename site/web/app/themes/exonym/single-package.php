<?php
  get_header();
  if(have_posts()): while(have_posts()): the_post();
  get_template_part('views/wrap', 'start');
  echo ex_terms_header('package_categories');
  $images = get_field('images');
  $imageCount = 0;
  if($images) {
    $imageCount = count($images);
  }
  $description = get_field('short_description');
  $details = get_field('details');
  $brochure = get_field('brochure');
  $booking = get_field('booking_link');
?>
<section class="package-content">
  <div class="package-details">
    <?php $image = $images[0]; if($image): ?>
      <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" class="package-image" />
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
            <?php if(!empty($image['caption'])) { echo '<span class="package-thumb-caption">' . $image['caption'] . '</span>'; } ?>
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
    if(have_rows('tiers')): while(have_rows('tiers')): the_row(); $name = get_sub_field('name'); if(!empty(get_sub_field('description'))):
  ?>
    <div class="package-details">
      <?php if($name) { echo '<h3 class="package-tier-heading">' . $name['title'] . '</h3>'; } ?>
      <?php the_sub_field('description'); ?>
    </div>
  <?php
    endif; endwhile; endif;
    if($brochure || $booking):
  ?>
    <div class="package-details package-details-booking">
      <?php
        if($booking) {
          echo '<a href="' . $booking['url'] . '" target="' . $booking['target'] . '" class="button-package button-booking">Book Tour Now</a>';
        } else {
          echo '<div class="package-booking-unavailable">';
            echo '<span>Please call for booking ' . get_the_title() . ' - </span>';
            ex_contact('phone', true, 'global');
          echo '</div>';
        }
        if($brochure) { echo '<a href="' . $brochure['url'] . '" target="_blank" class="button-package button-brochure">View Brochure</a>'; }
      ?>
    </div>
  <?php endif; ?>
</section>
<aside class="package-sidebar">
  <?php get_template_part('views/sidebar', 'menu'); ?>
  <?php if(have_rows('tiers')): while(have_rows('tiers')): the_row(); $name = get_sub_field('name'); ?>
    <?php if(have_rows('pricing')): ?>
      <div class="sidebar-widget">
        <h3 class="sidebar-title"><?php echo $name['title']; ?></h3>
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
    if($booking) {
      echo '<a href="' . $booking['url'] . '" target="' . $booking['target'] . '" class="button-package button-booking">Book Tour Now</a>';
    } else {
      echo '<div class="package-booking-unavailable">';
        echo '<span>Call to Book - </span>';
        ex_contact('phone', true, 'global');
      echo '</div>';
    }
    if($brochure) { echo '<a href="' . $brochure['url'] . '" target="_blank" class="button-package button-brochure">View Brochure</a>'; }
  ?>
</aside>
<?php
  get_template_part('views/wrap', 'end');
  endwhile; endif;
  get_footer();
?>

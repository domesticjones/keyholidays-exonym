<?php
  get_header();
  if(have_posts()):
    get_template_part('views/wrap', 'start');
    echo '<h1 class="page-header">Hotel Information</h1>';

?>
<section class="page-content">
  <?php while(have_posts()): the_post(); ?>
    <?php the_title(); ?>
  <?php endwhile; ?>
</section>
<?php
    get_template_part('views/sidebar', 'global');
    get_template_part('views/wrap', 'end');
  endif;
  get_footer();
?>

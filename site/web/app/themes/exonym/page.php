<?php
  get_header();
  if(have_posts()): while(have_posts()): the_post();
  get_template_part('views/wrap', 'start');
?>
<h1 class="page-header"><?php the_title(); ?></h1>
<section class="page-content">
  <?php ex_pagelayout(); ?>
</section>
<?php
  get_template_part('views/sidebar', 'global');
  get_template_part('views/wrap', 'end');
  endwhile; endif;
  get_footer();
?>

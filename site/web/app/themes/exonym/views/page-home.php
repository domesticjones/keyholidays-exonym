<?php
  /* TEMPLATE NAME: Home */
  get_header();
  if(have_posts()): while(have_posts()): the_post();
  get_template_part('views/wrap', 'start');
?>
<section class="home-left">
  <?php ex_pagelayout('left_column_page_layout'); ?>
</section>
<section class="home-right">
  <?php ex_pagelayout('right_column_page_layout'); ?>
</section>
<?php
  get_template_part('views/wrap', 'end');
  endwhile; endif;
  get_footer();
?>

<?php
  get_header();
  get_template_part('views/wrap', 'start');
  get_search_form();
  echo '<section class="search-results-wrap">';
  if(have_posts()): while(have_posts()): the_post();
    $images = get_field('images');
    $image = $images[0];
    $content = get_field('short_description');
?>
<a href="<?php the_permalink(); ?>" class="search-result">
  <h2><?php the_title(); ?></h2>
  <div class="search-result-image" style="background-image: url(<?php echo $image['sizes']['medium']; ?>)"><span><?php echo $image['alt']; ?></span></div>
  <div class="search-result-description"><?php echo wp_trim_words($content, 35, '...'); ?></div>
  <button>More Info</button>
</a>
<?php
  endwhile; endif;
  echo '</section>';
  get_template_part('views/wrap', 'end');
  get_footer();
?>

<?php
  $slider = get_field('slider');
  if(empty($slider)) {
    $slider = get_field('default_slider', 'options');
  }
  if($slider):
?>
  <header class="module-slider">
    <?php foreach($slider as $slide): ?>
      <div class="module-slide">
        <div class="module-slide-inner" style="background-image: url('<?php echo $slide['sizes']['jumbo']; ?>');">
          <span><?php echo $slide['alt']; ?></span>
        </div>
      </div>
    <?php endforeach; ?>
  </header>
<?php endif; ?>

<?php
  $heading = get_sub_field('heading');
  $headingText = $heading['text'];
  $headingColor = $heading['color'];
  $content = get_sub_field('text');
  $link = get_sub_field('link');
  $image = get_sub_field('image');
  $imagePosition = get_sub_field('image_position');

  $contentCheck = true;
  if(empty($content) && empty($headingText)) {
    $headingImageType = 'full';
    $contentCheck = false;
  } else {
    $headingImageType = $imagePosition;
  }
?>
<div class="module-cta">
  <?php if($contentCheck): ?>
    <?php if(!empty($headingText)) { echo '<h1 class="cta-heading cta-color-' . $headingColor . '">' . $headingText . '</h1>'; } ?>
    <?php if(!empty($content)) { echo '<div class="cta-content">' . $content . '</div>'; } ?>
  <?php endif; ?>
  <?php if(!empty($image)): ?>
    <div class="cta-image cta-image-type-<?php echo $headingImageType; ?> cta-image-position-<?php echo $imagePosition; ?>" style="background-image: url(<?php echo $image['sizes']['small']; ?>);">
      <span><?php echo $image['title'] . ' - ' . $image['description']; ?></span>
    </div>
  <?php endif; ?>
  <?php if(!empty($link)): ?>
    <a href="<?php echo $link['url']; ?>" class="cta-button" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
  <?php endif; ?>
</div>

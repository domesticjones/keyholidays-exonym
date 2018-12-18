<?php
  get_header();
  if(have_posts()):
    get_template_part('views/wrap', 'start');
    echo '<h1 class="page-header">Hotel Information</h1>';
    function amenity($name, $val) {
      $amenities = get_field('amenities');
      $amenity = $amenities[$val];
      if(empty($amenity)) {
        $amenity = 'None';
      }
      $return = '<li><span class="name">' . $name . '</span><span class="data">' . $amenity . '</span></li>';
      echo $return;
    }
?>
<section class="page-content">
  <?php while(have_posts()): the_post(); ?>
    <div class="hotel-single">
      <h2 class="hotel-title"><?php the_title(); ?></h2>
      <h3 class="hotel-location"><?php the_field('location'); ?></h3>
      <?php $photos = get_field('photos'); if($photos): ?>
        <ul class="hotel-photos">
          <?php foreach($photos as $photo): ?>
            <li><a href="<?php echo $photo['sizes']['large']; ?>"><img src="<?php echo $photo['sizes']['thumbnail']; ?>" alt="<?php echo $photo['alt']; ?>" /></a></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      <ul class="hotel-amenities">
        <?php
          amenity('Number of Rooms', 'number_of_rooms');
          amenity('Rating', 'rating');
          amenity('Check In', 'check_in');
          amenity('Check Out', 'check_out');
          amenity('Guests Per Room', 'guests_per_room');
          amenity('Room Service', 'room_service');
          amenity('Outdoor Pool', 'outdoor_pool');
          amenity('Indoor Pool', 'indoor_pool');
          amenity('Spa Facilities', 'spa_facilities');
          amenity('Resort Fee', 'resort_fee');
          amenity('Onsite Restaurants', 'onsite_restaurants');
          amenity('In-Room Safe', 'in-room_safe');
          amenity('In-Room Refrigerator', 'in-room_refrigerator');
          amenity('In-Room Coffee', 'in-room_coffee');
          amenity('Onsite Gym', 'onsite_gym');
        ?>
      </ul>
      <?php if(have_rows('extras')): ?>
        <div class="hotel-extras">
          <?php while(have_rows('extras')): the_row(); ?>
            <div class="hotel-extra"><?php the_sub_field('extra'); ?></div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endwhile; ?>
</section>
<?php
    get_template_part('views/sidebar', 'global');
    get_template_part('views/wrap', 'end');
  endif;
  get_footer();
?>

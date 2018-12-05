<?php
  $data = get_sub_field('data_display');
  if(in_array('address', $data)) {
    echo '<h2 class="contact-heading">Address</h2><p class="contact-address">';
    ex_contact('address');
    echo '</p>';
  }
  if(in_array('cards', $data)) {
    $payments = get_field('accepted_payments', 'options');
    if($payments) {
      echo '<h2 class="contact-heading">Accepted Payments</h2>';
      echo '<ul class="contact-payments">';
      foreach($payments as $payment) {
        echo '<li><img src="' . $payment['sizes']['small'] . '" alt="' . $payment['alt'] . '" /></li>';
      }
      echo '</ul>';
    }
  }
  if(in_array('email', $data)) {
    echo '<h2 class="contact-heading">Email</h2>';
    ex_contact('email');
  }
  if(in_array('phone', $data)) {
    echo '<h2 class="contact-heading">Phone</h2>';
    ex_contact('phone');
  }
  if(in_array('form', $data)) {
    echo '<h2 class="contact-heading">Send Message</h2>';
    echo do_shortcode('[contact-form-7 id="652" title="Contact form 1"]');
  }
?>
